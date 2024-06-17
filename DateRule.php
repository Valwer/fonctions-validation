<?php

class DateRule implements RuleInterface{

    public function isValid($data) : bool {
        return isset($data) && $data!='';

    }
    public function message($property) : string {
        return $property . ' valeure requise';
        
    }
}