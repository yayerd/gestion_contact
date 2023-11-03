<?php
require_once('../modele/Contact.php');

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des contacts</title>
    <link rel="stylesheet" href="makeup.css">
</head>

<body>
    <section class="list">
        <h1>Liste des contacts sauvegardés</h1> <br>
        <table>
            <tr>
                <td>Id Contact</td>
                <td>Prenom</td>
                <td>Nom</td>
                <td>Telephone</td>
                <td>Favorite</td>
                <td>Options</td>
            </tr>
            <?php
            $liste_contacts = Contact::show_all_contact($ladatabase);
            foreach ($liste_contacts as $contact) {
            ?>
                <tr>
                    <td><?php echo $contact['id_contact']; ?> </td>
                    <td><?php echo $contact['prenom']; ?> </td>
                    <td><?php echo $contact['nom']; ?> </td>
                    <td><?php echo $contact['telephone']; ?> </td>
                    <td>
                        <input type="hidden" name="id_modifier_favori" value="<?php $contact['id_contact'] ?>">
                    <a href="vue_modifierfavori.php?id=<?php echo $contact['id_contact']; ?> 
                    "onclick="return confirm('Souhaitez vous modifier le statut de <?php echo $contact['prenom']; ?> ?')">
                        <select class="modifier_favori">
                        <option value="oui" <?php if ($contact['is_favorite'] === 'oui') echo 'selected'; ?> >Oui</option>
                        <option value="non"  <?php if ($contact['is_favorite'] === 'non') echo 'selected'; ?>>Non</option> 
                        </select>
                    </td>
                    <td>
                        <input type="hidden" name="id_modifier_contact" value="<?php $contact['id_contact'] ?>">
                    <a href="vue_modifiercontact.php?id=<?php echo $contact['id_contact']; ?>
                    "onclick="return confirm('Souhaitez vous modifier les informations de votre contact <?php echo $contact['prenom']; ?>?')">
                        <button id="id_modifier_contact">Modifier</button>
                    </a>
                        <input type="hidden" name="id_modifier_contact" value="<?php $contact['id_contact'] ?>">
                    <a href="../controller/logique_supprimer.php ?id=<?php echo $contact['id_contact']; ?>
                        "onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre contact <?php echo $contact['prenom']; ?>?')">
                        <button id="id_supprimer_contact">Supprimer</button>
                    </a>
            <?php } ?>
                    </td>
                </tr>
        </table>
        <a href="vue_liste_favori.php?id=<?php echo $contact['id_contact']; ?>">
        <button style="margin: 50px ; padding: 10px 10px;" class="modifier_favori">Liste de mes favoris</button>
        </a>
                        
    </section>

    <?php


    ?>
</body>

</html>