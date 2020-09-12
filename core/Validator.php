<?php
//class validator
class Validator
{
    //Holds encountered errors
    private $errors = [];
    
    public function validate($key, $data, $type)
    {        
        switch($type) {
            case 'int':
                $this->validateInt($key, $data);
            break;
            
            case 'text':
                $this->validateText($key, $data);
            break;

            case 'textarea':
                $this->validateTextArea($key, $data);
            break;

            case 'email':
                $this->validateEmail($key, $data);
            break;

            case 'password':
                $this->validatePassword($key, $data);
            break;

        }
        return $data;
    }

    public function verifyConfirmation($value1, $value2)
    {
        if ($value1 != $value2) {
            $this->addError('confirm_password', 'Les 2 mots de passe ne sont pas identiques');
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
 
    private function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    private function validateInt($key, $data)
    {
        $cleanData = $this->clean($data);
        if (empty($cleanData) || !ctype_digit($cleanData)) {
            $this->addError($key, 'La valeur renseigné n\'est pas numérique !');
        }
    }

    private function validateText($key, $data)
    {
        $cleanData = $this->clean($data);

        if (empty($cleanData)) {
            $this->addError($key, 'Le champ ne peut pas être vide !');
        } else {
            if (!preg_match('/^([a-zA-Z])*$/', $cleanData)) {
                $this->addError($key, 'Le doit contenir uniquement des caractères alphabétiques !');
            }
        }
    }

    private function validateTextArea($key, $data)
    {
        $cleanData = $this->clean($data);

        if (empty($cleanData)) {
            $this->addError($key, 'Le champ ne peut pas être vide !');
        }
    }

    private function validateEmail($key, $data)
    {
        $cleanData = $this->clean($data);

        if (empty($cleanData)) {
            $this->addError($key, 'Veuiller saisir votre email');
        } else {
            if (!filter_var($cleanData, FILTER_VALIDATE_EMAIL)) {
                $this->addError($key, 'Votre adresse email est invalide !');
            }
        }
    }

    private function validatePassword($key, $data)
    {
        $cleanData = $this->clean($data);

        if (empty($cleanData)) {
            $this->addError($key, 'Veuiller saisir votre mot de passe');
        } else {
            if (!preg_match('/^([a-zA-Z0-9]{3,10})*$/', $cleanData)) {
                $this->addError($key, 'Le mot de passe doit contenir aumoins 6 caractères !');
            } //{3,10} à changer {6,10}
        }
    }
    
    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}