<?php


namespace App\services;


use App\Interfaces\Transform;

class InputProcessor
{

    private $input;
    private $logger;
    private $transformer;

    public function __construct( $input,Transform $tranformer, Logger $logger)
    {

        $this->input = $input;
        $this->transformer = $tranformer;
        $this->logger = $logger;

    }


    public function getInput(): string
    {

        $this->logger->log($this->input);

        return $this->transformer->transform($this->input);


    }


}
