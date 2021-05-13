<?php
  
  	session_start();

  	$email_recebe = "gestao.ti@cmgb.com.br";
  	$email_envio  = "gestao.ti@cmgb.com.br";

  	////////////////////////////////////////
  	$nome     = $_POST['name'];	
  	$email    = $_POST['email'];		
  	$assunto  = $_POST['subject'];		
  	$mensagem = $_POST['message'];	
 
  	//$assunto = "FORMULÁRIO DE CONTATO CMGB";
  
  
  	if (preg_match('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
		$emailsender = "gestao.ti@cmgb.com.br"; 
	} else {
		$emailsender = "gestao.ti@cmgb.com.br";
	}
	 
	if(PHP_OS == "Linux") $quebra_linha = "\n"; 
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; 
	else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
			 
			 	
	$mensagemHTML = '
	
	<div style="margin: 10px 200px;">
	
    	<p>Email: '.$email.'</p>
    	<p>Nome: '.$nome.'</p>
    	<p>Assunto: '.$assunto.'</p>
    	<p>Mensagem: '.$mensagem.'</p>
    	
	</div>
	
	';
	

	$headers = "MIME-Version: 1.1".$quebra_linha;
	$headers .= "Content-type: text/html; charset=utf-8".$quebra_linha;	
	$headers .= "From: FORMULARIO DE CONTATO CMGB<gestao.ti@cmgb.com.br>";
	
	if(!mail($email_recebe, $assunto, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
		$headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
		mail($email_recebe, $assunto, $mensagemHTML, $headers );
		
	}
  
  	echo "<script language = 'JavaScript'>";
   		echo "location.href = 'https://cmgb.com.br'";
  	echo "</script>";
	
	////////////////////////////////////////
	
?>



