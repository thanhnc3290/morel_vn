<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class PHPMailer_library
{
	public function __construct(){
		//log_messege('Debug','PHPMailer class is loaded.');
	}

	public function load(){
		// Include PHPMailer Library files
		require_once APPPATH.'third_party/PHPMailer/Exception.php';
		require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
		require_once APPPATH.'third_party/PHPMailer/SMTP.php';

		$mail = new PHPMailer;
		return $mail;
	}
}