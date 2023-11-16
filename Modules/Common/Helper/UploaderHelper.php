<?php


namespace Modules\Common\Helper;


use Intervention\Image\Facades\Image;

trait UploaderHelper
{

    public function upload($imageFromRequest, $imageFolder, $resize = false)
    {
        $fileName = time() . $imageFromRequest->getClientOriginalName();
        $location = public_path('uploads/' . $imageFolder . '/' . $fileName);

        $image = Image::make($imageFromRequest);
        $image->resize(500,500);
        $image->save($location, 50);

        # Optional Resize.
        if ($resize == true) {
            $image->resize(100, 70);
            $newlocation = public_path('uploads/' . $imageFolder . '/thumb' . '/' . $fileName);
            $image->save($newlocation, 40);
        }


        return $fileName;
    }

    public function uploadFile($fileFromRequest,$fileFolder){

//        $fileName = time().'.'.$fileFromRequest->getClientOriginalExtension();
        $fileName = time().'.'.$fileFromRequest->getClientOriginalName();
        $location = public_path('uploads/'. $fileFolder . '/');
        $fileFromRequest->move($location, $fileName);

        return $fileName;

    }

    public function getImageName($folderName,$imagePath)
    {
        $needle = $folderName.'/';
        return substr($imagePath, strpos($imagePath, $needle) + strlen($needle));
    }

}
