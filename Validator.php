<?php

class Validator{
    private static $errors;
    public static function validate($data,$rules) : void {
    
        foreach ($rules as $field => $rulesList) {
            $rulesArray = explode('|',$rulesList);
            foreach ($rulesArray as $rule) {
                $ruleOptions = explode(':',$rule,2);
                $ruleName = $ruleOptions[0];
                $ruleParam = $ruleOptions[1] ?? null;
                var_dump($ruleOptions);
                

                switch ($ruleName) {
                    case 'required':
                        $ruleInstance = new RequireRule;
                        $value = $data[$field] ?? null;
                        if ($value && !$ruleInstance->isValid($value)) {
                            self::$errors[$field][]= $ruleInstance->message($field);
                        }
                        break;
                    case 'string':
                        $ruleInstance = new StringRule;
                        $value = $data[$field] ?? null;
                        if ($value && !$ruleInstance->isValid($value)) {
                            self::$errors[$field][]= $ruleInstance->message($field);
                        }
                        break;
                    case 'max':
                        $ruleInstance = new MaxRule;
                        $value = $data[$field] ?? null;
                        if ($value && !$ruleInstance->isValid($value)) {
                            self::$errors[$field][]= $ruleInstance->message($field);
                        }
                    case 'date':
                        $ruleInstance = new DateRule;
                        $value = $data[$field] ?? null;
                        if ($value && !$ruleInstance->isValid($value)) {
                            self::$errors[$field][]= $ruleInstance->message($field);
                        }
                            

                }
            }
        }
    }
    public static function getErrors(){
        return self::$errors;
    }
}