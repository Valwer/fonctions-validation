<?php

class StringRule{
    public function isValid($data) : bool {
        return is_string($data);

    }
    public function message($property) : string {
        return $property . ' valeure requise';
        
    }
}