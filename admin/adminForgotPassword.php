<?php
session_start();
include 'dbconnection.php';
require_once('lib/swift_required.php');
$qry="select username,password from admin";
$res=mysql_query($qry);
if($row=mysql_fetch_assoc($res)){
	$un=$row['username'];
	$psw=$row['password'];
$br=<<<BR
  Hi Admin,\r\n
  Your account details are given below\r\n 
  username: $un .\r\n
  password: $psw.\r\n
  
  Thank you.
BR;
$new=$br;
$message=Swift_Message::newInstance() ;
$message->setSubject('Account details');
$message->setFrom(array('info@ourstemcenter.com'=>"STEM"));
$message->setTo(array('stem.teamproject@gmail.com'));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('mail.ourstemcenter.com', 25);
$transport->setUsername('info@ourstemcenter.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);
$_SESSION['forgot']='success';
header("Location:index.php");
}else{
$_SESSION['forgot']='failed';
header("Location:index.php");	
}
?>