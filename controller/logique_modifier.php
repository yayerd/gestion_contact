<?php

// require_once('../modele/Contact.php');

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier_contact'])) {
//     $f_prenom = $_POST['prenom'];
//     $f_nom = $_POST['nom'];
//     $f_telephone = $_POST['telephone'];
//     $f_is_favorite = $_POST['is_favorite'];

//     if (isset($_POST['id_contact'])) {
//         $id_du_contact = $_POST['id_contact'] ;

//     $c_contact = new Contact($f_prenom, $f_nom, $f_telephone, $f_is_favorite);

//     if ($c_contact) {
//         $c_contact->$this->prenom;
//         $c_contact->$this->nom;
//         $c_contact->$this->telephone;
//         $c_contact->$this->is_favorite;

//         $c_contact->update_contact($ladatabase, $id_du_contact);
//         header('Location:../view/vue_modifiercontact.php');

//         echo " Contact modifié";

//     } else {
//         echo "Contact perdu en route";
//     } 
// } else {
//         echo "Id non récupéré ";
//     }

    

//     $m_contact = new Contact($modifier['prenom'], $modifier['nom'], $modifier['telephone'], $modifier['is_favorite']);
//     $m_contact->getId_contact($modifier['id_contact']);
    
// }


require_once('../modele/Contact.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier_contact'])) {
    $id_du_contact = $_POST['id_contact'];
    $f_prenom = $_POST['prenom'];
    $f_nom = $_POST['nom'];
    $f_telephone = $_POST['telephone'];
    $f_is_favorite = $_POST['is_favorite'];

    $c_contact = new Contact($f_prenom, $f_nom, $f_telephone, $f_is_favorite);

    $c_contact->update_contact($ladatabase, $id_du_contact);
    // echo '<script>alert("Votre contact a été modifié avec succès.");</script>';
     // header('Location: ../view/vue_modifiercontact.php');


    header('Location: ../view/vue_liste_contact.php'); 
}
