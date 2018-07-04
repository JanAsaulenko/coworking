<?php
namespace App\Lib;
use Illuminate\Support\Facades\Storage;

class Gallery
{
    public function getNamePictures($count)
    {
        $path = 'images';
        $files = Storage::files($path);
        $countFiles = count($files);
        $randomArray = $this->getRandomArray($count,$countFiles);
        $namesPictures = [];
        for ($i = 0; $i <$count; $i++) {
            array_push($namesPictures, $files[$randomArray[$i]]);
        }
        return $namesPictures;
    }

    private function getRandomArray($sizeArray,$max)
    {   $min=0;
        $i = 0;
        $array = [];
        while ($i++ < $sizeArray) {
            $rnd = rand($min, $max-1);
            if (!in_array($rnd, $array)) {
                array_push($array, $rnd);
            } else {
                $sizeArray= $sizeArray + 1;
            }
        }
        return $array;
    }
}