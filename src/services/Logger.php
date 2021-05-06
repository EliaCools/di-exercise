<?php


namespace App\services;


class Logger
{

    public function log($string): void{

       $existingtext = file_get_contents('../info.log');

       $existingtext .= PHP_EOL;
       $existingtext .= $string;
        file_put_contents('../info.log',$existingtext);


    }

}
