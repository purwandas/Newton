<?php

namespace App\Traits;
use File;

trait UploadTrait {

    /**
     * Trait for File Upload
     *
     * @param $image, $imageFolder
     * @return string
     */

    public function getUploadPathName($image, $imageFolder, $imageName)
    {
        $image_new = $imageName.'-'.time().'.'.$image->getClientOriginalExtension();

        // Back result url asset + filename (For insert/update data in model)
        return asset('img').'/'.$imageFolder.'/'.$image_new;
    }

    public function upload($image, $imageFolder, $imageName)
    {
        $image->move(public_path('img/'.$imageFolder), $imageName);

        return true;
    }

    public function getPdfPathName($pdf, $pdfFolder, $pdfName)
    {
        $pdf_new = $pdfName.'-'.time().'.pdf';

        // Back result url asset + filename (For insert/update data in model)
        File::makeDirectory('pdf/'.$pdfFolder, $mode = 0777, true, true);
        return $pdfFolder.'/'.$pdf_new;
    }

}