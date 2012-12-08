<?php  if ( ! defined('ANTIHACK')) exit('No direct script access allowed');
/**
 * Email Helper v1.0
 *
 * Aplicatie dezvoltata pentru PHP 5.1.6 sau mai nou
 *
 * @package		AFramework
 * @subpackage	Libraries
 * @author		Adry
 * @link		
 * @since		Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Required ./system/libraries/Phpmailer.php
 */


// trimite email prin smtp (comenzii minimale)
function quick_mail($email, $subject, $content)
{
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host		= SMTP_HOST;
	$mail->SMTPAuth = SMTP_AUTH;
	$mail->Username = SMTP_USER;
	$mail->Password = SMTP_PASS;
	$mail->Port     = SMTP_PORT;
	$mail->SMTPDebug  = 0;
	$mail->From		= SMTP_USER;
	$mail->FromName = PROIECT;
	$mail->AddAddress($email);
	$mail->AddReplyTo(SMTP_USER, PROIECT);
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $content;
	$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	
	return (bool)$mail->Send();
}

// trimite email prin smtp
function send_mail($from, $to, $subject, $content)
{
	if(is_array($from))
	{
		$from_email = (isset($from[0])) ? $from[0] : NULL;
		$from_name = (isset($from[1])) ? $from[1] : NULL;
	}
	else
	{
		$from_email = $from;
		$from_name = NULL;
	}
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host		= SMTP_HOST;
	$mail->SMTPAuth = SMTP_AUTH;
	$mail->Username = SMTP_USER;
	$mail->Password = SMTP_PASS;
	$mail->Port     = SMTP_PORT;
	$mail->SMTPDebug  = 0;
	$mail->From		= SMTP_USER;
	$mail->FromName = PROIECT;
	$mail->AddAddress($to);
	$mail->AddReplyTo($from_email, $from_name);
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $content;
	$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	
	return (bool)$mail->Send();
}

// END url helper

/* End of file email.php */
/* Location: ./system/helpers/email.php */