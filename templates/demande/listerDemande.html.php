<?php require_once $base_template."templates/includes/header.html.php";
 ?>
<!-- <?= var_dump($_SESSION['user']); ?> -->

  <div class='block'>
      <h1>LISTE DES DEMANDES</h1>
      <table class="show-table">
          <tr style='font-weight: bold; font-size:2vh;'>
                <th>Numero</th>
                <th>Date</th>
                <th>Etat</th>
                <th>Actions</th>
          </tr>
          
            <?php foreach($data as $module): ?>
                <tr>
                    <td><?= $module['numero'] ?></td>
                    <td><?= $module['date'] ?></td>
                    <td><?= $module['etat'] ?></td>
                    <td><button>Details</button></td>
                </tr>
            <?php  endforeach;  ?>

      </table>
  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>