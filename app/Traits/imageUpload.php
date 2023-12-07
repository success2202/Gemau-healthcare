<?php 
namespace App\Traits;

use Intervention\Image\Facades\Image;

trait imageUpload{

    
    function UploadImage($request, $path){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $FileName = \pathinfo($name, PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $time = time() . $FileName;
        $fileName = $time . '.' . $ext;
        Image::make($request->file('image'))->resize(440, 440)->save($path.$fileName);
        return $fileName;
    }

    function UploadImages($request, $path){
        $file = $request->file('images');
        foreach ($file as $image) {
            $name = $image->getClientOriginalName();
            $FileName = \pathinfo($name, PATHINFO_FILENAME);
            $ext = $image->getClientOriginalExtension();
            $time = time().$FileName;
            $fileName = $time.'.'.$ext;
            Image::make($image)->resize(400, 400)->save($path.$fileName);
            $images[] = $fileName;
        }
       return $images;
    }
}