<?php require_once $base_template."templates/includes/header.html.php";
 ?>
<!-- <?= var_dump($_SESSION['user']); ?> -->

  <div class='block'>
      <h1>LISTE DES CLASSES</h1> 
      <table class="show-table">
          <tr style='font-weight: bold; font-size:2vh;'>
                <th>Libelle</th>
                <th>Filiere</th>
                <th>Niveau</th>
                <th>Actions</th>
          </tr>
          
            <?php foreach($data as $prof): ?>
                <tr>
                    <td><?= $prof['libelle'] ?></td>
                    <td><?= $prof['filiere'] ?></td>
                    <td><?= $prof['niveau'] ?></td>
                    <td><button>Details</button></td>
                </tr>
            <?php  endforeach;  ?>

      </table>
  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>