<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Models\Image;
use DB;
use File;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Log;

class MoveCarsImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'move:car-images {car_id?} {image_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Moves Cars images to their personal directory after save';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $car_id = $this->argument('car_id');
        $image_id = $this->argument('image_id');

        /** @var Image[]|Collection $images */
        $images = Image::query()
            ->with(['thumbnails'])
            ->whereNull('parent_id')
            ->where(function ($query) use ($image_id, $car_id) {
                // Указано конкретное изображение
                if ( ! empty($image_id)) {
                    $query->where('id', $image_id);
                }
                // Указано конкретное авто
                elseif ( ! empty($car_id)) {
                    $query->where('model_id', $car_id);
                }
            })
            ->get();

        $images->each(function (Image $image) {
            DB::transaction(function () use ($image) { 
                if (!is_null($image->car_id)) {
                  /** @var Car $car */
                  $car = Car::find($image->car_id);
                  
                  // Бывает что авто уже удалено. В этой команде удалять фото нельзя, просто пропускаем
                  if (is_null($car) ) {
                      return true;
                  }
                  
                  $image->thumbnails->each(function (Image $thumbnail) use ($car) {
                      $this->moveImage($thumbnail, "uploads/cars/{$car->id}/".basename($thumbnail->path));
                  });
                  $this->moveImage($image, "uploads/cars/{$car->id}/".basename($image->path));
                }
            });
        });
    }

    protected function moveImage(Image $image, $new_path)
    {
        if ($image->path != $new_path) {
            if ( ! File::exists(public_path($image->path))) {
                Log::error('File does not exist and can not be moved (image #'.$image->id.')');
                return;
            }

            $target_directory = public_path(dirname($new_path));
            if ( ! File::exists($target_directory)) {
              $oldmask = umask(0); 
              File::makeDirectory($target_directory, 0775, true);
              umask($oldmask);
            }

            File::move(public_path($image->path), public_path($new_path));
            $image->path = $new_path;
            $image->save();
        }
    }
}
