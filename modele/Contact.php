<?php

require_once('database.php');
require_once('../controller/logique_validation.php');


class Contact
{
    private $id_contact;
    private $prenom;
    private $nom;
    private $telephone;
    private $is_favorite;

    public function __construct($c_prenom,  $c_nom,  $c_telephone, $c_is_favorite)
    {
        $this->prenom = $c_prenom;
        $this->nom = $c_nom;
        $this->telephone = $c_telephone;
        $this->is_favorite = $c_is_favorite;
    }
    public function getPrenom()
    { return $this->prenom; }
    public function getNom()
    { return $this->nom; }
    public function getTelephone()
    { return $this->telephone; }
    public function getFavori()
    { return $this->is_favorite; }
    public function getId_contact($qultruc)
    { return $this->id_contact = $qultruc; }

        
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


    public function add_contact(PDO $ladatabase)
    {
        if (!empty($this->prenom) && !empty($this->nom) && !empty($this->telephone) && !empty($this->is_favorite)) {
            $sql_add = 'INSERT INTO contact_list (prenom, nom, telephone, is_favorite) 
                        VALUES (:prenom, :nom, :telephone, :is_favorite)';

            $requete_add = $ladatabase->prepare($sql_add);
            $requete_add->execute([
                ":prenom" => $this->prenom,
                ":nom" => $this->nom,
                ":telephone" => $this->telephone,
                ":is_favorite" => $this->is_favorite,
            ]);
            // echo "Contact sauvegardé avec succès.";
            header('Location:../view/vue_liste_contact.php');
        } else {
            echo "Contact non sauvegardé, <a href='view/vue_addcontact.php'>réessayer</a>";
        }
    }

    public static function show_all_contact(PDO $ladatabase)
    {
        $sql = "SELECT * FROM contact_list";
        $requete = $ladatabase->query($sql);
        $contacts = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }

    public static function getContactById(PDO $ladatabase, $id_du_contact)
    {
        $sql_getcontact = 'SELECT * FROM contact_list WHERE id_contact = :id_contact';
        $requete_getcontact = $ladatabase->prepare($sql_getcontact);
        $requete_getcontact->execute([
            ':id_contact' => $id_du_contact
        ]);

        if ($requete_getcontact->rowCount() == 1) {
            $row = $requete_getcontact->fetch(PDO::FETCH_ASSOC);
            // var_dump($row);
            // die();
            $c_contact = new Contact($row['prenom'], $row['nom'], $row['telephone'], $row['is_favorite']);
            $c_contact->getId_contact($row['id_contact']);

            return $c_contact;
        } else {
            return null;
        }
    }

    public function update_contact(PDO $ladatabase, $id_du_contact)
    {
        if (!empty($this->prenom) && !empty($this->nom) && !empty($this->telephone) && isset($this->is_favorite)) {
            $sql_update = 'UPDATE contact_list
                      SET prenom = :new_prenom, nom = :new_nom, telephone = :new_telephone, is_favorite = :new_is_favorite
                      WHERE id_contact = :id_contact_a_modifier';

            $requete_update = $ladatabase->prepare($sql_update);
            $requete_update->execute([
                ":new_prenom" => $this->prenom,
                ":new_nom" => $this->nom,
                ":new_telephone" => $this->telephone,
                ":new_is_favorite" => $this->is_favorite,
                ":id_contact_a_modifier" => $id_du_contact
            ]);
            // header('Location: ../view/vue_modifiercontact.php');
    echo '<script>alert("Votre contact a été modifié avec succès.");</script>';

            
        } else {
            echo "Contact non modifié, <a href='view/vue_addcontact.php'>réessayer</a>";
        }
    }


    public static function delete_contact(PDO $ladatabase, $id_du_contact)
    {
        if (!empty($id_du_contact)) {
            $sql_delete = 'DELETE FROM contact_list WHERE id_contact = :id_contact';

            $requete_delete = $ladatabase->prepare($sql_delete);
            $requete_delete->execute([":id_contact" => $id_du_contact]);
          
        // header('Location: ../view/vue_liste_contact.php');
        // header('Location: ../view/vue_liste_contact.php?message=Votre+contact+a+été+supprimé');
   
        } else {
            echo "Contact non supprimé";
        }
    }


    public static function favori_mark(PDO $ladatabase, $id_du_contact)
{
    if (!empty($id_du_contact)) {
        $sql_favorite = 'UPDATE contact_list SET is_favorite = :is_favorite WHERE id_contact = :id_contact';

        $requete_favorite = $ladatabase->prepare($sql_favorite);
        $requete_favorite->execute([
            ":is_favorite" => "oui" || "non",
            ":id_contact" => $id_du_contact
        ]);

        header('Location: ../view/vue_liste_contact.php');
        // echo "Votre contact est en favori.";
    } else {
        echo "Contact non marqué comme favori.";
    }
}

public function favorite_contact(PDO $ladatabase, $id_du_contact)
{
    if (!empty($this->prenom) && !empty($this->nom) && !empty($this->telephone) && isset($this->is_favorite)) {
        $sql_update = 'UPDATE contact_list
                  SET is_favorite = :new_is_favorite
                  WHERE id_contact = :id_contact_a_modifier';

        $requete_update = $ladatabase->prepare($sql_update);
        $requete_update->execute([
            ":new_is_favorite" => $this->is_favorite,
            ":id_contact_a_modifier" => $id_du_contact
        ]);
        // header('Location: ../view/vue_modifiercontact.php');
        echo '<script>alert("Le statut de votre contact a été modifié avec succès.");</script>';

    } else {
        echo "Statut non modifié, <a href='view/vue_addcontact.php'>réessayer</a>";
    }
}
}
