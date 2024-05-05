<?php

namespace Models;

class AuthUser extends Database
{
    use SanitizerTrait;
    public function register($csrf_token, $formData)
    {
        $csrf_token = $this->sanitizeInput($csrf_token);
        $formData = $this->sanitizeInput($formData);

        // check email exists
        $check_email = $this->checkEmail($formData['email']);
        if ($check_email) {
            echo "email exists";
            die;
        }
        echo "valid email";
    }

    public function checkEmail($email) 
    {

        $sql = "SELECT email FROM users WHERE email = ?";
        
        $params = [$email];

        $stmt = $this->executeStatement($sql, $params);

        $result = $stmt->get_result();

        $result = $result->fetch_assoc();

        var_dump($result);die;

        if (is_null($result)) {
            return false;
        } else {
            return true;
        }
    }
}
