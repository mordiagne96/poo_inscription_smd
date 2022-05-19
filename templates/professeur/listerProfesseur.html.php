    <?php require_once $base_template."templates/includes/header.html.php";
 ?>
<!-- <?= var_dump($_SESSION['user']); ?> -->

  <div class='block'>
      <h1>LISTE DES PROFESSEURS</h1>
      <table class="show-table">
          <tr style='font-weight: bold; font-size:2vh;'>
                <th>Nom Complet</th>
                <th>Adresse</th>
                <th>Grade</th>
                <th>Actions</th>
          </tr>

            <?php foreach($data as $prof): ?>
                <tr>
                    <td><?= $prof['nom_complet'] ?></td>
                    <td><?= $prof['adresse'] ?></td>
                    <td><?= $prof['grade'] ?></td>
                    <td><button>Details</button></td>
                </tr>
            <?php  endforeach;  ?>

      </table>
  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>