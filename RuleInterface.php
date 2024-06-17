<?php

interface RuleInterface{
    public function isValid($data) : bool;
    public function message($property) : string;
}