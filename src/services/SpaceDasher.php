<?php


namespace App\services;


use App\Interfaces\Transform;

class SpaceDasher implements Transform
{
    public function transform($string): string
    {

        return str_replace(' ','-',$string);

    }

}
