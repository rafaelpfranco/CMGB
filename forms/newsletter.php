<?php
  
	session_start();
	
	$email_recebe = "gestao.ti@cmgb.com.br";
	$email_envio  = "gestao.ti@cmgb.com.br";
	
	////////////////////////////////////////
	
	$email   		= $_POST['inputEmail'];		

 
	$assunto = "Inscricao Newsletter Site";
				
		
	if (preg_match('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
		$emailsender = "gestao.ti@cmgb.com.br"; 
	} else {
		$emailsender = "gestao.ti@cmgb.com.br";
	}
	
	
	/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
	if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
	else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
			 
	/* Montando a mensagem a ser enviada no corpo do e-mail. */
	$mensagemHTML = '
	
		<div style="margin: 10px 200px;">
	    	<p>email: '.$email.'</p>
		</div>
	';
	
	
	$headers = "MIME-Version: 1.1".$quebra_linha;
	$headers .= "Content-type: text/html; charset=utf-8".$quebra_linha;	
	$headers .= "From: Inscricao Newsletter Site<gestao.ti@cmgb.com.br>";
	
	if(!mail('gestao.ti@cmgb.com.br', $assunto, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
		$headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
		mail('gestao.ti@cmgb.com.br', $assunto, $mensagemHTML, $headers );
		
	}
	
	

	echo "<script language = 'JavaScript'>";
   		echo "location.href = 'https://cmgb.com.br'";
  	echo "</script>";

////////////////////////////////////////
?>



