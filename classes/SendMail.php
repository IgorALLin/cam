<?php

class SendMail {

	use GetHash;
	
	private $to;
	private $headers;
	private $subject;
	private $message;
	private $uname;
	public static $from = 'camagruadm@gmail.com'; 

	function __construct($umail, $uname) {
		$this->to = $umail;
		$this->uname = $uname;
	    $this->headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
		$this->headers .= "From: ".self::$from."\r\n"; 
		$this->headers .= "Reply-To: reply-to@example.com\r\n"; 
	}

	public function verification () {
		$this->message = '<html><body>';
		$this->message .= 'Hello <b>'.$this->uname.'</b><br>';
		$this->message .= 'Welcome to Camgru'.'<br>';
		$this->message .= 'Please click on the link below to finish youre registration:'.'<br>';
		$this->message .= '<a href="http://localhost:8080/camagru/functions/verification.php?login='.$this->uname.'&hash='.$this->hashFunc($this->uname).'">Click here to confirm your email</a>';
		$this->message .= "</body></html>";
		$this->subject = 'Registration on camgru';
		$this->send();
	}

	public function passwordRecovery($randomPass) {
		$this->message = 'Hello '.$this->uname.'<br>';
		$this->message .= 'Youre new password is '.$randomPass.'<br>';
		$this->subject = 'Password recovery on camgru';
		$this->send();
	}

	public function commet_message () {
		$this->message = 'Hi '.$this->uname.'</b><br>';
		$this->message .= 'You have new comment under youre photo';
		$this->subject = 'Comment under youre pfoto';
		$this->send();
	}

	private function send() {
		mail($this->to, $this->subject, $this->message, $this->headers);
	}
}

?>