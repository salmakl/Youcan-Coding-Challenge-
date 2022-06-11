<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * store file in storage
     *
     * @param File $image
     * @return void
     */
    public function store($image)
    {
        $path = Storage::disk('public')->put('images', $image);
        
        return $path;
    }
}
