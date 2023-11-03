<?php
require_once('../modele/Contact.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des favoris</title>
    <link rel="stylesheet" href="makeup.css">
</head>

<body>
    <section class="list">
        <h1>Liste des contacts favoris</h1> <br>
        <table>
            <tr>
                <td>Id Contact</td>
                <td>Prenom</td>
                <td>Nom</td>
                <td>Telephone</td>
            </tr>
            <?php
            $liste_contacts = Contact::show_all_contact($ladatabase);
            foreach ($liste_contacts as $contact) {
                if ($contact['is_favorite'] == 'oui') {
            ?>
                <tr>
                    <td><?php echo $contact['id_contact']; ?> </td>
                    <td><?php echo $contact['prenom']; ?> </td>
                    <td><?php echo $contact['nom']; ?> </td>
                    <td><?php echo $contact['telephone']; ?> </td>
                    
            <?php
             } 
                } 
            ?>
                    </td>
                </tr>
        </table>
    </section>

    <?php


    ?>
</body>

</html>