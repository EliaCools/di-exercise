<?php


namespace App\services;


use App\Interfaces\Transform;

class Capitalizer implements Transform
{

    public function transform($string): string
    {

        $SplitString = str_split($string);
        $uppercasedArray =[];

        foreach ($SplitString as $i => $letter) {

            if($i%2 === 0){
              $letter=  strtoupper($letter);
            }

            $uppercasedArray[] = $letter;

        }


        return implode($uppercasedArray);

    }
}
