<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $teaser
 * @property string $image
 * @property bool $is_enabled
 * @property string $slug
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property \Carbon\Carbon $created_at
 */
class News extends Model
{
    use Sluggable, CrudTrait, HasImage;
    use SluggableScopeHelpers;

    protected $perPage = 6;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'teaser',
        'teaser2',
        'card_image',
        'is_enabled',
        'slug',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'is_enabled' => 'boolean'
    ];

    protected static function boot()
    {
      parent::boot();

      static::deleting(function (Location $location) {
        Storage::disk('uploads')->delete($location->card_image);
        Storage::disk('uploads')->delete($location->page_image);
      });
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
 
    public function getUrl()
    {
      $news = News::find($this->id);
      return route('news.item', [$news->slug]);
    }

    public function setCardImageAttribute($value)
    {
        $this->saveImage('card_image', $value, 'news');
    }
}
