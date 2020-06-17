<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Image;
use Illuminate\Console\Command;

class MakeThumbnails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:thumbnails {image_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Builds thumbnails for uploaded images';

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
        $image_id = $this->argument('image_id');

        /** @var Image $images */
        $images = Image::query()
            ->with(['thumbnails'])
            ->whereNull('parent_id')// миниатюры для миниатюр делать не нужно
            ->where(function ($query) use ($image_id) {
                if ( ! empty($image_id)) {
                    $query->where('id', $image_id);
                }
            })
            ->get();

        $images->each(function (Image $image) {
            $thumbnails_widths = [800, 400, 200];

            foreach ($thumbnails_widths as $thumbnail_width) {
                if ($image->thumbnails->where('thumb_name', 'image'.$thumbnail_width)->isEmpty()) {
                    $image->createThumbnail($thumbnail_width, 'image'.$thumbnail_width);
                }
            }
        });
    }
}
