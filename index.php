
<?php
/*---------------------------------------------------------------*/
//   Titre : Formulaire  d'envoi de mail                                                                            
                                                                                                                          
                                                                
//  - J'ai récupéré ce fihcier du Net                                                                                                 
//    - Je ne sais plus de quel site ?!                                                                                               
//    - Auquel j'ai apporté quelques changements mineurs 
//	-Ce n'est pas pour une utilisation commerciale !                                                                                    
//
//---------------------------------------------------------------*/

	
	if(isset($_POST['mailform'])) {
	   if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message'])) {
	      $header="MIME-Version: 1.0\r\n";
	      $header.='From:"BLAAYADI"<blaayadi@mail.com>'."\n";
	      $header.='Content-Type:text/html; charset="uft-8"'."\n";
          $header.='Content-Transfer-Encoding: 8bit';
          $Destinataire="blaayadi@ogmail.com";

	      $message='
	      <html>
	         <body>
	            <div align="center">
	               <img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x.png"/>
	               <br />
	               <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
	               <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
	               <br />
	               '.nl2br($_POST['message']).'
	               <br />
	               <img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x.png"/>
	            </div>
	         </body>
	      </html>
	      ';
	      mail($Destinataire, "Sujet du message: EN provenance de PHP ", $message, $header);
	      $msg="\n\n\t\t\tEt voila Votre message a bien été envoyé !";
       } else
       {
       
          $msg="\n\n\t\tTous les champs doivent être complétés !";
          echo "\n\n";
	   }
	}
	?>
	<html>
	   <head>
	      <meta charset="utf-8" />
	   </head>
	   <body>
	      <h2>Bienvenue - Formulaire de contact !</h2>
	      <form method="POST" action="">
	         <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
	         <input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
	         <textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
	         <input type="submit" value="Send Message !" name="mailform"/>
	      </form>
		  <?php
		  if(isset($msg)) 
		  {
                 
	         echo $msg;
	      }
	      ?>
	   </body>
	</html>