<?php
require_once 'mandrill/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('9uiuER46FM_acR00H3SQqA');

try {
	$name = 'Filter Reminder 7 days before (ES)';
	$result = $mandrill->templates->info($name);
	//print_r($result);
	$code = $result['publish_code'];

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	$headers .= 'From: <webmaster@example.com>' . "\r\n";

	// send email
	if (mail("raj4rachit@gmail.com", "Test My subject", $code . $headers)) {
		echo $code;
	} else {
		echo "mail not send";
	}

} catch (Mandrill_Error $e) {
	// Mandrill errors are thrown as exceptions
	echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
	// A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
	throw $e;
}
?>
