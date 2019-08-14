<!DOCTYPE html>
<html>
    <head>
		<?php
			error_reporting(0);
			ini_set(“display_errors”, 0 );
		?>
        <title>Thanks!</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../_css/email.min.css"/>
		<meta name="robots" content="noindex, nofollow"/>
		<meta name="googlebot" content="noindex, nofollow"/>
		<script>
			var viewport = document.createElement("meta");
			viewport.setAttribute("name", "viewport");
			if (screen.width < 450) {
				viewport.setAttribute("content", "width=650");
			} else {
				viewport.setAttribute("content", "width=device-width, initial-scale=1");
			}
			document.head.appendChild(viewport);
		</script>
        <?php
			require_once('_phpmailer/class.phpmailer.php');	
		
			$name = $_POST['name'];
			$nationality = $_POST['nationality'];
			$email = $_POST['email'];
			$translation = $_POST['translation'];
		
            if ((strlen($name)>30 || $name==null) || (strlen($nationality)>20 || $nationality==null) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$message = "<h1>Algo de errado aconteceu :(<br/>Tente novamente...</h1>";
				
            } else {
				$mail = new PHPMailer();
				
				$mail->IsSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->SMTPAuth = true; 
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;
				$mail->Username = 'yourusername@gmail.com'; 
				$mail->Password = 'yourpassword';
				$mail->From = "yourusername@gmail.com";
				$mail->FromName = "Fake Login";
				$mail->AddAddress('yourusername@gmail.com', 'Fake Login');
				$mail->IsHTML(true);
				
				$mail->Subject = "Help translate";
				$mail->Body = 'From: '.utf8_decode($name);
				$mail->Body .= '<br/> Email: '.utf8_decode($email);
				$mail->Body .= '<br/> Nacionalidade: '.utf8_decode($nationality);
				$mail->Body .= '<br/><br/> Translation: <br/>'.utf8_decode(nl2br($translation));
					
				$enviado = $mail->Send();

				if($enviado){
					$message = '<h1>Thank you for help, '.$name.'!</h1>
					<h2>As soon as possible, we will implement your contribution in the code. Thank you!</h2>';
				} else {
					$message = "<h1>Algo de errado aconteceu :(<br/>Tente novamente...</h1>";
					$message .= '<br/><h2>'.$mail->ErrorInfo.'</h2>';
				}   
			}
        ?>
		
		<link rel="shortcut icon" type="image/png" href="../_img/_shortcut/shortcut.png"/>
    </head>
    <body>
        <a href="../index.html" id="back">
            <img id="back-img" src="../_img/_icons/_others/back.png"/>
        </a>
        <div id="body-content">
            <div id="message">
                <div id="message-content">
                    <?php
                        echo $message;
                    ?>
                </div>
            </div>  
            <div id="button">
                <a id="button-content" href="../index.html">
                    <h3>Finish</h3>
                </a>
            </div>
        </div>
    </body>
</html>