<?php

require_once('../modele/Contact.php');

// Instanciation pour ajouter contact 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter_contact'])) {
    $f_prenom = $_POST['prenom'];
    $f_nom = $_POST['nom'];
    $f_telephone = $_POST['telephone'];
    $f_is_favorite = $_POST['is_favorite'];

    $c_contact = new Contact($f_prenom, $f_nom, $f_telephone, $f_is_favorite);
    $c_contact->add_contact($ladatabase);

    echo '<script>
           alert(\'Votre contact a été sauvegardé avec succés.\')
                </script>';
            header('Location:../view/vue_liste_contact.php');

}



?>