<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Storage;
use Image as ImageLibrary;

/**
 * @property int id
 * @property int parent_id
 * @property int car_id
 * @property string original_file_name
 * @property string file_name
 * @property string path
 * @property string thumb_name
 * @property int size
 * @property int index
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Image[]|Collection childrens
 * @see Image::childrens()
 *
 * @property Image[]|Collection thumbnails
 * @see Image::thumbnails()
 *
 * @property Image parent
 * @see Image::parent()
 */
class Image extends Model
{

    protected $table = 'images';
    protected $fillable = [
        'parent_id',
        'car_id',
        'original_file_name',
        'file_name',
        'path',
        'thumb_name',
        'size',
        'index',
    ];

    protected $casts = [
        'size' => 'integer',
        'index' => 'integer',
    ];
 
    public function childrens(): HasMany
    {
        return $this->hasMany(Image::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'parent_id');
    }

    public function thumbnails(): HasMany
    {
        return $this->hasMany(Image::class, 'parent_id');
    }

    public static function boot()
    { 
      self::deleting(function (Image $imageRoot) {
          $imageRoot->childrens->each(function (Image $image) {
              $image->deleteFile();
              $image->delete();
          });
          $imageRoot->deleteFile();
      });
      parent::boot();
    }

    public function fit($w, $h)
    {
        $image = \Image::make(\Storage::disk('public')->get($this->path));

        $thumb = new self([
            'parent_id' => $this->getKey(),
            'car_id' => $this->car_id,
            'index' => $this->index,
            'thumb_name' => "fit-$w-$h"
        ]);
        $thumb->save();
        $newName = str_replace('-' . $image->getWidth() . '-' . $this->getKey(), '-' . $w . '-' . $thumb->getKey(), $this->file_name);
        $newPath = public_path("uploads/cars/$newName");
        $image->fit($w, $h)->save($newPath);
        $thumb->fill([
            'original_file_name' => $newName,
            'file_name' => $newName,
            'path' => "uploads/cars/$newName",
            'size' => $image->filesize(),
        ]);
        $thumb->save();
        return $thumb;
    }

    /**
     * @param $width
     * @param $thumb_name
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function createThumbnail($width, $thumb_name)
    {
        $file_name = preg_replace('/(.*)\.([^.]+)$/', '${1}_w'.$width.'.${2}', basename($this->path));
        $file_path = dirname($this->path).'/'.$file_name;

        if (Storage::disk('public')->exists($this->path)) {
            $image = ImageLibrary::make(Storage::disk('public')->get($this->path));

            if ($image->getWidth() > $width) {
                $image->resize($width, round($image->getHeight()*$width/$image->getWidth()));
                $image->encode('jpg', 80);
            }

            $fullPath = public_path($file_path);
            $image->save($fullPath);
            $oldmask = umask(0); 
            chmod($fullPath, 0775);
            umask($oldmask);
      
            $file_size = $image->filesize();
        }
        else {
            $file_size = 0;
        }

        $thumbnail = new static();
        $thumbnail->parent_id = $this->id;
        $thumbnail->car_id = $this->car_id;
        $thumbnail->original_file_name = null;
        $thumbnail->file_name = $file_name;
        $thumbnail->path = $file_path;
        $thumbnail->thumb_name = $thumb_name;
        $thumbnail->size = $file_size;
        $thumbnail->index = $this->index;
        $thumbnail->save();
    }

    public function deleteFile()
    {
        \Storage::disk('public')->delete($this->path);
    }

    public function getUrl()
    {
        return $url = \Storage::disk('public')->url($this->path);
    }
}
