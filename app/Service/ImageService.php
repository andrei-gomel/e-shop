<?php

namespace App\Service;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function storeImage($imageData)
    {
        //$name = $request->file('photo')->getClientOriginalName();
        //$path = $request->file('photo')->store('/images');
        $path = Storage::putFile('/images', $imageData);

        if ($path === null)
            {
                abort(500);
            }

        return $path;
    }
}
