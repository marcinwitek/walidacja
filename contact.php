<?php
$to = "mendieta358@gmail.com";
$subj = "Nowy kontakt";
$error_start = "<p class='alert alert-error'>";
$error_end = "</p>";
$vallid_form = TRUE;

$redirect = "succes.php";

$form_fields = array('name','phone','email','message');
$required = array('name','phone','email');

foreach($required as $require){
	$error[$require] = ''; 
}
if(isset($_POST['submit'])){
	
	/* pobieranie danych */
	foreach($form_fields as $field){
		$form[$field] = htmlspecialchars($_POST[$field]);
	}
	
	if($form['name'] == ''){
		$error['name']= $error_start . "Wypelnij wymagane pole" . $error_end;
		$vallid_form = FALSE;
	}
	if($form['phone'] == ''){
		$error['phone']= $error_start . "Wypelnij wymagane pole" . $error_end;
		$vallid_form = FALSE;
	}
	if($form['email'] == ''){
		$error['email']= $error_start . "Wypelnij wymagane pole" . $error_end;
		$vallid_form = FALSE;
	}
	
	if($error['email'] == '' && !filter_var($form['email'],FILTER_VALIDATE_EMAIL)){
		$error['email']= $error_start . "Podaj prawidlowy email" . $error_end;
		$vallid_form = FALSE;
	}
	if($error['phone'] == '' && !preg_match('/^[0-9]{9}$/', $form['phone'])){
		$error['phone']= $error_start . "Podaj prawidlowy nr telefonu" . $error_end;
		$vallid_form = FALSE;
	}
	if($vallid_form){
		
		$message = "Imie: ". $form['name']."\n";
		$message .= "Telefon: ". $form['phone']."\n";
		$message .= "Email: ". $form['email']."\n";
		$message .= "Wiadomosc: ". $form['message'];
		
		$headers = "From: www.marcinwitek.com <biuro@marcinwitek.com>\r\n";
		$headers .= "X-Sender: <mendieta358@gmail.com>";	
		
		mail($to,$subj,$message,$headers);
		
		header("Location: ". $redirect);
	}else {
		include('form.php');
	}
}else {
	foreach($form_fields as $field){
		$form[$field] = '';
	}
	include('form.php');
}


?>