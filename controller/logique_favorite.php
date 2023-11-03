<?php 

require_once('../modele/Contact.php');

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier_favori']) && isset($_POST['is_favorite'])) {
//     $id_du_contact = $_POST['id_contact'];
    
//     $c_contact = Contact::getContactById($ladatabase, $id_du_contact);
    
//     if ($c_contact) {
//         if ($c_contact->getFavori() === 'oui') {

//             $c_contact->setFavori('non');
//             // $c_contact->favori_mark($ladatabase, $id_du_contact);
//             echo '<script>alert("Votre contact n\'est plus en favori.");</script>';

//         } else {

//             $c_contact->setFavori('oui');
//             // $c_contact->favori_mark($ladatabase, $id_du_contact);
//             echo '<script>alert("Votre contact est en favori.");</script>';

//         }
//     } else {
//         echo "ID de contact non valide.";
//     }
// } else {
//     echo "Requête invalide.";
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier_favori'])) {
    $id_du_contact = $_POST['id_contact'];
    $f_prenom = $_POST['prenom'];
    $f_nom = $_POST['nom'];
    $f_telephone = $_POST['telephone'];
    $f_is_favorite = $_POST['is_favorite'];

    $c_contact = new Contact($f_prenom, $f_nom, $f_telephone, $f_is_favorite);

    $c_contact->favorite_contact($ladatabase, $id_du_contact);
    // echo '<script>alert("Votre contact a été modifié avec succès.");</script>';
     // header('Location: ../view/vue_modifiercontact.php');


    header('Location: ../view/vue_liste_contact.php'); 
}

?>