<?php

namespace App\Models;

use Image;
use Storage;

trait HasImage
{
    protected function saveImage($attribute_name, $value, $directory = '')
    {
        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            Storage::disk('uploads')->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = Image::make($value);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            Storage::disk('uploads')->put($directory.($directory ? '/' : '').$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $directory.($directory ? '/' : '').$filename;
        }
    }
}
