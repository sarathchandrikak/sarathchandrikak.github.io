<?php
 

if($_POST) {
	
	function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
 
    // Enter the email where you want to receive the message
    $emailTo = 'sarath182015@gmail.com';
	
	$name = addslashes(trim($_POST['name']));
    $clientEmail = addslashes(trim($_POST['email']));
    $subject = addslashes(trim($_POST['subject']));
    $message = addslashes(trim($_POST['message']));
    //$antispam = addslashes(trim($_POST['antispam']));
 
    $array = array('name' => '', 'emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');
 
    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    
    if(isEmail($clientEmail) && $subject != '' && $message != '' && $antispam == '12') {
        // Send email
		
        $headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
        mail($emailTo, $subject, $message, $headers);
		echo json_encode($array);
    }
 
    
 
}
 
?>