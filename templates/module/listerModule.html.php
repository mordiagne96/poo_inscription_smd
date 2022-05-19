<?php require_once $base_template."templates/includes/header.html.php";
 ?>
<!-- <?= var_dump($_SESSION['user']); ?> -->

  <div class='block'>
      <h1>LISTE DES MODULES</h1>
      <table class="show-table">
          <tr style='font-weight: bold; font-size:2vh;'>
                <th>Numero</th>
                <th>Libelle</th>
                <th>Actions</th>
          </tr>
          
            <?php foreach($data as $module): ?>
                <tr>
                    <td><?= $module['id']+1 ?></td>
                    <td><?= $module['libelle'] ?></td>
                    <td><button>Details</button></td>
                </tr>
            <?php  endforeach;  ?>

      </table>
  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>