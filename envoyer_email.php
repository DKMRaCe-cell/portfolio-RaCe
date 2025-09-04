<?php
if (isset($_POST['envoyer'])) {
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    if (!empty($nom) && !empty($email) && !empty($message)) {
        $destinataire = 'mathiasdagbedji1@gmail.com';
        $sujet = 'Message de ' . $nom;
        $corps = $message;
        $headers = 'From: ' . $email . "\r\n";
        $headers .= 'Reply-To: ' . $email . "\r\n";
        
        if (mail($destinataire, $sujet, $corps, $headers)) {
            echo 'Message envoyé avec succès !';
        } else {
            echo 'Erreur lors de l\'envoi du message.';
        }
    } else {
        echo 'Veuillez remplir tous les champs obligatoires.';
    }
}
?>
