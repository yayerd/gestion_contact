<?php
require_once('../modele/Contact.php');

if (isset($_GET['id'])) {
  $connect = new Databaseconnexion(); 
$ladatabase = $connect->mydatabase;
  $id_du_contact = $_GET['id'];

  $c_contact = Contact::getContactById($ladatabase, $id_du_contact);
  
}

?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modifier Contact Favorite Form</title>
  <link rel="stylesheet" href="makeup.css" />
</head>

<body>
  <section class="wrapper_form">
    <div class="form signup">
      <header>Modifier favori</header>
      <form action="../controller/logique_favorite.php" method="post">
        <input type="hidden" name="id_contact"  value="<?php echo $c_contact->getId_contact($id_du_contact); ?>" required />
        <input type="text" name="prenom"  value="<?php echo $c_contact->getPrenom(); ?>" required /> 
        <input type="text" name="nom" value="<?php echo $c_contact->getNom(); ?>" required />
        <input type="number" name="telephone" value="<?php echo $c_contact->getTelephone(); ?>" required />
        <div class="checkbox">
          <Label class="info_title" name="is_favorite">Est-ce un contact favori ?</Label>
          <select name="is_favorite" class="modifier_favori">
            <option value="oui" <?php if ($c_contact->getFavori() == 'oui'); ?>>Oui</option>
            <option value="non" <?php if ($c_contact->getFavori() == 'non'); ?>>Non</option>
          </select>
        </div>
        <input type="submit" value="Modifier Favori" name="modifier_favori" />
      </form>
    </div>

    <script>
      const wrapper = document.querySelector(".wrapper"),
        signupHeader = document.querySelector(".signup header"),
        loginHeader = document.querySelector(".login header");

      loginHeader.addEventListener("click", () => {
        wrapper.classList.add("active");
      });
      signupHeader.addEventListener("click", () => {
        wrapper.classList.remove("active");
      });
    </script>
  </section>



</body>


</html>