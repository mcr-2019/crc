<?php

namespace App\Models;

use Artisan;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use App\Models\Image;

use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

/**
 * App\Car
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $class_id
 * @property int $body_type_id
 * @property int $fuel_type_id
 * @property int $drive_type_id
 * @property boolean $with_driver
 * @property boolean $has_climate_control
 * @property string $name
 * @property string $transmission_name
 * @property int $seat_count
 * @property int $doors_count
 * @property float $avg_fuel_consumption
 * @property int $engine_volume
 * @property int $year
 * @property int $min_cost
 */
class Car extends Model
{
    use CrudTrait, HasImage;
 
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
      'class_id',
      'body_type_id',
      'fuel_type_id',
      'drive_type_id',
      'with_driver',
      'name',
      'seat_count',
      'doors_count',
      'transmission_name',
      'avg_fuel_consumption',
      'engine_volume',
      'year',
      'min_cost',
      'has_climate_control',
      'created_at',
      'updated_at'
    ];
     
    public static function boot()
    {  
      self::saved(function (Car $car) {
          if (request()->has('images')) {
              /// если в админке сохранили фотки к тачке то они приходят сюда
              /// тут я для каждой фотки и её тхумбу ставлю кар_ид которому принадлежат они
              /// и ещё тут ставится порядок сортировки индекс
              collect(json_decode(request()->get('images')))
                  ->each(function ($imageArr, $index) use ($car) {
                      /** @var Image $img */
                      $img = Image::find($imageArr->id);
                      $img->car_id = $car->id;
                      $img->index = $index;
                      $img->save();

                      Artisan::call('make:thumbnails', ['image_id' => $img->id]);

                      $img->thumbnails->each(function (Image $thumbnail) use ($index, $car) {
                          $thumbnail->car_id = $car->id;
                          $thumbnail->index = $index;
                          $thumbnail->save();
                      });

                      Artisan::call('move:car-images', ['car_id' => $car->id, 'image_id' => $img->id]);
                  });

          }
      });

      self::deleting(function (Car $car) {
          $car->images->each(function (Image $image) {
              $image->delete();
          });
      });

      parent::boot();
    }

    public function class(): belongsTo
    {
        return $this->belongsTo(\App\Models\CarClass::class);
    }

    public function fuel_type(): belongsTo
    {
        return $this->belongsTo(\App\Models\FuelType::class);
    }

    public function drive_type(): belongsTo
    {
        return $this->belongsTo(\App\Models\FuelType::class);
    }

    public function images(): hasMany
    {
        return $this->hasMany(\App\Models\Image::class, 'car_id')
            ->whereNull('parent_id')
            ->orderBy('index', 'asc');
    }
}
