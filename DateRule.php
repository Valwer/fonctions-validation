<?php

class DateRule implements RuleInterface{
    private string $format;
    public function __construct(
        $format = 'Y-m-d'
    )
    {
        $this->format = $format;
    }

    public function isValid($data) : bool {
        $d = \DateTime::createFromFormat($this->format,$data);
        return $d && $d->format($this->format) == $data;

    }
    public function message($property) : string {
        return $property . ' n\'est pas une date valide';
        
    }
}