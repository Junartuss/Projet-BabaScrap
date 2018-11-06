<?php
  function setMailDatabase($civiliteContact, $nomContact, $prenomContact, $telContact, $mailContact, $objetContact, $messageContact){
    global $bdd;

    $req = $bdd->prepare("INSERT INTO contact(civiliteContact, nomContact, prenomContact, telContact, mailContact, objetContact, messageContact, dateContact) VALUES('" . $civiliteContact . "', '" . $nomContact . "', '" . $prenomContact . "', '" . $telContact . "', '" . $mailContact . "', '" . $objetContact . "', '" . $messageContact . "', NOW())");
    $req->execute();
  }

?>
