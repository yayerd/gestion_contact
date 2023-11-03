<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Contact Form</title>
  <link rel="stylesheet" href="makeup.css" />
</head>

<body>
  <section class="wrapper_form">
    <div class="form signup">
      <header>Ajouter nouveau contact</header>
      <form action="../controller/logique_addcontact.php" method="post">
        <!-- <Label class="info_title">Information du contact à ajouter</Label> -->
        <input type="text" placeholder="Prénom du contact" name="prenom" required />
        <input type="text" placeholder="Nom du contact" name="nom" required />
        <input type="number" placeholder="Téléphone" name="telephone" required />
        <div class="checkbox">
          <Label class="info_title" name="is_favorite">Est-ce un contact favori ?</Label>
          <select name="is_favorite" class="modifier_favori">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
          </select>
        </div>
        <input type="submit" value="Ajouter contact" name="ajouter_contact" />
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