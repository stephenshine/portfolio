<?php

    session_start();
    
    require_once 'libs/phpmailer/PHPMailerAutoload.php';
    require('libs/phpmailer/class.phpmailer.php');
    require('libs/phpmailer/class.smtp.php');
    require('libs/phpmailer/class.pop3.php');
    
    $errors = [];
    
    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        $fields = [
            'name' => $_POST['name'], 
            'email' => $_POST['email'],
            'message' => $_POST['message']
            ];
            
        foreach($fields as $field => $data){
            if (empty($data)){
                $errors[] = 'the '. $field . ' field is empty';
            }
        }
        
        if(empty($errors)){
            $m = new PHPMailer;
            
            $m->isSMTP();
            $m->SMTPAuth = true;
            $m->Host = 'smtp.gmail.com';
            $m->Username = 'stephen.shine88@gmail.com';
            $m->Password = 'mashup41';
            $m->SMTPSecure = 'ssl';
            $m->Port = 465;
            
            $m->isHTML(true);
            
            $m->Subject = 'Contact through portfolio';
            $m->Body = 'From: ' . fields['name'] . '(' . fields['email'] . ')<p>' . fields['message'] . '</p>';
                
            $m->FromName = "Portfolio";
            
            $m->AddAddress('stephen.shine88@gmail.com', 'Stephen Shine');
            
            if($m->send()) {
                header('Location: index.php');
            } else {
                $errors[] = 'Sorry. There was an error. Please contact me another way';
            }
            
        }
        
    } else {
        $errors[] = 'Something went wrong';
    }
    
    $_SESSION['errors'] = $errors; 
    $_SESSION['fields'] = $fields;
    header('Location: index.php');
    
?>