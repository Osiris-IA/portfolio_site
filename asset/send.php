<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les données reçues
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Vérification basique
    if (empty($name) || empty($email) || empty($message)) {
        echo "Merci de remplir tous les champs.";
        exit;
    }

    // Adresse qui recevra le message
    $to = "irishadj6@gmail.com"; // ⚠️ Mets ici ton adresse e-mail réelle
    $subject = "Nouveau message de ton portfolio";
    $body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoi du mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Merci $name ! Votre message a bien été envoyé.";
    } else {
        echo "Désolé, une erreur est survenue. Essayez plus tard.";
    }
} else {
    echo "Accès non autorisé.";
}
