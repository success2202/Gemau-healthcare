<?php 
namespace App\Traits;

trait imageUpload{

    function UploadImage($request, $path, $width = null, $height=null){
        $image_url = cloudinary()->upload($request->file('image')->getRealPath(), [
            'folder' => $path,
            'transformation' => [
                'width' => $width,
                'height'=> $height
            ]
        ])->getSecurePath();
        return  $image_url;
    }

    function UploadImages($request, $path, $width = null, $height=null){
        $file = $request->file('images');
        foreach ($file as $image) {
            $image_url = cloudinary()->upload($image->getRealPath(), [
                'folder' => $path,
                'transformation' => [
                    'width' => $width,
                    'height'=> $height
                ]
            ])->getSecurePath();
            $images[] = $image_url;
        }
       return $images;
    }
}