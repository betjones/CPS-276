<?php

class Validation{
	/* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
	private $error = false;

	/* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
	public function checkFormat($value, $regex)
	{
		switch($regex){
			case 'id': return $this->validateId($value);
            case 'name': return $this->validateName($value);
            case 'address': return $this->validateAddress($value);
            case 'city': return $this->validateCity($value);
            case 'state': return $this->validateState($value);
            case 'phone': return $this->validatePhone($value);
            case 'email': return $this->validateEmail($value);
            case 'dob': return $this->validateDob($value);
            case 'contacts': return $this->validateContacts($value);
            case 'age': return $this->validateAge($value);
            default:
                $this->errors[$type] = "Validation type not supported.";
                return false;
			
		}
	}


		
	/* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
	private function id($value) {
        if (preg_match('/^\d+$/', $value)) {
            return true;
        } else {
            $this->errors['id'] = "Invalid ID format.";
            return false;
        }
    }
	private function name($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}
	private function address($value) {
        if (preg_match('/^[a-zA-Z0-9,.\- ]{1,100}$/i', $value)) {
            return true;
        } else {
            $this->errors['address'] = "Invalid address format.";
            return false;
        }
    }
	private function city($value) {
        if (preg_match('/^[a-zA-Z- ]{1,50}$/i', $value)) {
            return true;
        } else {
            $this->errors['city'] = "Invalid city format.";
            return false;
        }
    }
	private function state($value) {
        if (preg_match('/^[A-Z]{2}$/i', $value)) {
            return true;
        } else {
            $this->errors['state'] = "Invalid state format. Use two-letter state code.";
            return false;
        }
    }

	private function phone($value){
		$match = preg_match('/\d{3}\.\d{3}.\d{4}/', $value);
		return $this->setError($match);
	}

    private function email($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->errors['email'] = "Invalid email format.";
            return false;
        }
    }
	private function dob($value) {
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) { // YYYY-MM-DD
            return true;
        } else {
            $this->errors['dob'] = "Invalid date of birth format. Expected format: YYYY-MM-DD.";
            return false;
        }
    }

    private function contacts($value) {
        if (is_array($value)) {
            return true;
        } else {
            $this->errors['contacts'] = "Invalid contacts format. Expected an array.";
            return false;
        }
    }

    private function age($value) {
        if (preg_match('/^\d+$/', $value) && $value >= 0 && $value <= 120) {
            return true;
        } else {
            $this->errors['age'] = "Invalid age. Age must be between 0 and 120.";
           
	
	private function setError($match){
		if(!$match){
			$this->error = true;
			return "error";
		}
		else {
			return "";
		}
	}


	/* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
	public function checkErrors(){
		return $this->error;
	}
	
}

    

    

   

  



   