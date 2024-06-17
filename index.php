<?php
require 'RuleInterface.php';
require 'RequireRule.php';
require 'StringRule.php';
require 'MaxRule.php';
require 'DateRule.php';
require 'Validator.php';
$rules =[ 
        'title' => 'required|string|max:255',
        'created_at' => 'required|date:"Y-m-d H:i"',
        'body' => 'required',
    ];

$post = [
    'title' => 'Mon Blog',
    'body' => '',
    'created_at' => ''
];

Validator::validate($post,$rules);
var_dump(Validator::getErrors());