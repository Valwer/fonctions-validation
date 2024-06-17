<?php

class MaxRule implements RuleInterface{
    public function __construct(
        private int $limit
    )
    {
        
    }

    public function isValid($data) : bool {
        return strlen($data)<= $this->limit ;

    }
    public function message($property) : string {
        return $property . ' dépasse la taille autorisée de' . $this->limit;
        
    }
}