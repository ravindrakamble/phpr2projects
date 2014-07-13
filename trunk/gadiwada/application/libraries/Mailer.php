<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mailer {
    public function send_mail($from,$to,$cc,$subject,$body,$attachment="")
    {
		require_once("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
	    $mail->FromName = "Admizon";
	    $mail->From = $from;
	    $mail->Subject = $subject;
	    $mail->Body=$body;
		$mail->IsHTML(true);                                  // Set email format to HTML
	    $mail->AddAddress($to);
		$mail->AddCC($cc);
		//$mail->AddBCC('vinay@kuvi.in');
		if($attachment)
		$mail->AddAttachment($attachment);         // Add attachments		
	    if ($mail->Send())
	    {
	        return TRUE;
	    }
	    else
	    {
	    	log_message('ERROR',"Mail failed");
	        return FALSE;
	    }

    }
	
	
}

/* End of file Admizon.php */
