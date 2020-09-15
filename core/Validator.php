<?php

class Validator
{
    //holds the posted data
    private $postData;
    //holds encountered errors
    private $errors = [];

    //loop through all posted fields and for each loop for all rules
    public function validate($postData, $fields = [])
    {
        $this->postData = $postData;
        $this->fieldos = $fields;
        foreach($fields as $field => $rules) {
            foreach($rules as $rule => $rule_value)
            {
                $value = $postData[$field];

                if ($rule == 'required' && empty($value)) {                     
                    $this->addError($field, "Le champ {$field} ne peut pas être vide !");
                } else if (!empty($value)) {
                    switch($rule) 
                    {
                        case 'min-length':
                            if (strlen($value) < $rule_value) {
                                $this->addError($field, "La champ doit avoir aumoins {$rule_value} caractères !");
                            }
                        break;

                        case 'max-length':
                            if (strlen($value) > $rule_value) {
                                $this->addError($field, "La champ ne doit pas avoir plus de {$rule_value} caractères !");
                            }
                        break;

                        case 'matches':
                            if ($value != $postData[$rule_value]) {
                                $this->addError($field, "{$rule_value} doit correspondrent à {$field} !");
                            }
                        break;

                        case 'email':
                            if (!filter_var($postData[$field], FILTER_VALIDATE_EMAIL)) {
                                $this->addError($field, 'Votre adresse email est invalide !');
                            }
                        break;
                    }
                }
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getData()
    {
        return $this->postData; //renvoie des données non protégé donc pas intéressanta
    }
    
    public function getClean()
    {
        foreach($this->postData as $key => $value)
        {        
            $data = $this->escapingData($value);
            /* $data = trim($valeur);
            $data = stripslashes($valeur);
            $data = htmlspecialchars($valeur); */

            $cleanPost[$key] = $data;
        }
        return $cleanPost;
    }

    public static function escapingData($value)
    {
        $data = trim($value);
        $data = stripslashes($value);
        $data = htmlspecialchars($value);

        return $data;
    }
}