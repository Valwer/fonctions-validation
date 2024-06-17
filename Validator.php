<?php

class Validator
{
    private static $classContainer = [
        'required' => RequireRule::class,
        'string' => StringRule::class,
        'max' => MaxRule::class,
        'date' => DateRule::class,
    ];
    private static $errors;
    public static function validate($data, $rules): void
    {

        foreach ($rules as $field => $rulesList) {
            $rulesArray = explode('|', $rulesList);
            foreach ($rulesArray as $rule) {
                $ruleOptions = explode(':', $rule, 2);
                $ruleName = $ruleOptions[0];
                $ruleParam = $ruleOptions[1] ?? null;

                $value = $data[$field];
                $ruleInstance = is_null($ruleParam) 
                ? new self::$classContainer[$ruleName]
                : new self::$classContainer[$ruleName]($ruleParam);
                if (!$ruleInstance->isValid($value))
                    self::$errors[$field][] = $ruleInstance->message($field);

                // switch ($ruleName) {
                //     case 'required':
                //         $ruleInstance = new RequireRule;
                //         var_dump($value && !$ruleInstance->isValid($value));
                //         var_dump($value);
                //         if (!$ruleInstance->isValid($value)) {
                //             self::$errors[$field][]= $ruleInstance->message($field);

                //         }
                //         break;
                //     case 'string':
                //         $ruleInstance = new StringRule;

                //         if (!$ruleInstance->isValid($value)) {
                //             self::$errors[$field][]= $ruleInstance->message($field);
                //         }
                //         break;
                //     case 'max':
                //         $ruleInstance = new MaxRule($ruleParam);

                //         if (!$ruleInstance->isValid($value)) {
                //             self::$errors[$field][]= $ruleInstance->message($field);
                //         }
                //         break;
                //     case 'date':
                //         $ruleInstance = new DateRule;

                //         if (!$ruleInstance->isValid($value)) {
                //             self::$errors[$field][]= $ruleInstance->message($field);
                //         break;       
                //         }
                // }
            }
        }
    }
    public static function getErrors()
    {
        return self::$errors;
    }
}
