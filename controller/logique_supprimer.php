<?php

require_once('../modele/Contact.php');


if (isset($_GET['id'])) {
    $id_du_contact = $_GET['id'];

    $c_contact = Contact::getContactById($ladatabase, $id_du_contact);

    if ($c_contact) {
        
        $c_contact->delete_contact($ladatabase, $id_du_contact);
    // header('Location: ../view/vue_liste_contact.php'); 
    echo '<script>
           alert(\'Votre contact a été supprimé.\')
                </script>';

    } else {
        echo "Contact introuvable.";
    }
} else {
    echo "ID de contact non valide.";
}