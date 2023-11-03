<?php
require_once('../modele/Contact.php');

class ContactSetter extends Contact {
    private $prenom;
    private $nom;
    private $telephone; 
    private $is_favorite; 
    
public function setPrenom($prenom) {
    if (strlen($prenom) >= 3 && strlen($prenom) <= 50) {
        $this->prenom = $prenom;
    } else {
        echo "Le prénom doit contenir entre 2 et 50 caractères.";
    }
}

public function setNom($nom) {
    if (strlen($nom) >= 2 && strlen($nom) <= 50) {
        $this->nom = $nom;
    } else {
        echo "Le nom doit contenir entre 2 et 50 caractères.";
    }
}

public function setTelephone($telephone) {
    if (preg_match("/^[70][75][76][77][78][0-9]{7}$/", $telephone)) {
        $this->telephone = $telephone;
    } else {
        echo "Le numéro de téléphone doit comporter 10 chiffres.";
    }
}

public function setFavori($is_favorite) {
    if ($is_favorite === "oui" || $is_favorite === "non") {
        $this->is_favorite = $is_favorite;
    } else {
        echo "La valeur de favori doit être un booléen (true ou false).";
    }
}

}



?>