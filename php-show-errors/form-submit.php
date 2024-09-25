<?php
$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once('db-connect.php');
   
    // Extracting POST Data
    extract($_POST);

    // Validate Name Field
    if(!empty($name)){
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
            $errors['name'] = 'Member Name field only allows letters and spaces.';
        }
    }else{
        $errors['name'] = 'Member Name field is required.';
    }
    // Validate Email Field
    if(!empty($email)){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Invalid Email Address.';
        }
    }else{
        $errors['email'] = 'Member Email field is required.';
    }
    // Validate Contact Number Field
    if(!empty($phone)){
        if(!preg_match('/^[0-9]{11}+$/', $phone)){
            $errors['phone'] = 'Member Contact Number field only 11 digit numbers.';
        }
    }else{
        $errors['phone'] = 'Member Contact Number field is required.';
    }

    if(count($errors) <= 0){
        // If Validations are successful
        // Escape Post Values
        $name = htmlspecialchars($conn->real_escape_string($name));
        $email = htmlspecialchars($conn->real_escape_string($email));
        $phone = htmlspecialchars($conn->real_escape_string($phone));

        // Member's Databa Insertion Statement
        $insert_statment = "INSERT INTO `members` (`name`, `email`, `phone`) VALUES ('{$name}', '{$email}', '{$phone}')";
        try{
            // Execute Inertion Query
            $insert_sql = $conn->query($insert_statment);
        }catch(Exception $e){
            // Return Error message if Insertion Failed
            $errors['error'] = $e->getMessage();
        }
        if(!isset($errors['error'])){
            // store success message using session
            $_SESSION['success_msg'] = "New Member's Data has been registered successfully.";
            // Reload Page
            header('location: ./');
            exit;
        }
    }
    $conn->close();
}