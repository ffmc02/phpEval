<?php
$userInterface=true;
$title = 'formulaire de contact';
$formError = array();
if (isset($_POST['valider'])) {
    if (!empty($_POST['surname'])) {
        $surname = htmlspecialchars($_POST['surname']);
    } else {
        $formError['surname'] = 'Votre nom est vide, remplissez le pour être recontacté';
    }
    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        $formError['firstname'] = 'Votre prénom est vide pensez à le remplir avant de valider le formulaire';
    }
    if (!empty($_POST['emailContact'])) {
        if (filter_var($_POST['emailContact'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST['emailContact']);
        } else {
            $formError['email'] = ' Merci de mettre une adresse mail correcte';
        }
    } else {
        $formError['email'] = 'Vous avez oublié de remplir votre mail';
    }
    if (!empty($_POST['subject'])) {
        $subject = htmlspecialchars($_POST['subject']);
    } else {
        $formError['subject'] = 'Vous avez oublié de remplir votre sujet!!!!';
    }
    if (!empty($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    } else {
        $formError['message'] = 'Vous avez oublié de remplr le contenu de votre mail!!!!';
    }
    if (count($formError) == 0) {
        //destinatiare
        $destinataires = 'gaetan.jonard@outlouk.fr';
        //objet
        $objet = $subject;
        //entete
        $entete = 'from:' . $surname . ' ' . $firstname . ' ' . $email;
        // -> message au format Multipart MIME 
        $entete .= 'MIME-Version: 1.0\r\n';
        $entete .= 'Content-Type: multipart/mixed; ';
        $entete .= 'boundary=\'ligne\'\r\n';
        /* (.= : concaténation avec ce qu'il se trouvent dans la variable)
          Message. */
// -> première partie du message (texte) 
//    -> entête de la partie 
        $messages = $message;
        $messages .= '--ligne\r\n';
        $messages .= 'Content-Type: text/plain; ';
        $messages .= 'charset=iso-8859-1\r\n ';
        $messages .= 'Content-Transfer-Encoding: 8bit\r\n';
        $messages .= '\r\n';
        /* ligne vide 
          Envoi. */
        $bEnvoie = mail($destinataires, $objet, $message, $entete);
        $_SESSION['expediteurSurname'] = $surname;
        $_SESSION['expediteurFirstnamme'] = $firstname;
        $_SESSION['destinataire'] = $email;
        $_SESSION['subject'] = $objet;
        $_SESSION['message'] = $message;
    }
    if ($bEnvoie == true) {
        header("Location: messageSent.php");
    }
}
