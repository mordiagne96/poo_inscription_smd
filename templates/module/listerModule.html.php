<?php require_once $base_template."templates/includes/header.html.php";
 ?>
<!-- <?= var_dump($_SESSION['user']); ?> -->

  <div class='container container-fluid'>
      <h1>LISTE DES MODULES</h1>
      <!-- <button class="btn btn-circle bg-gradient-success pulse" id="new_element" data-name="module" ><i class="fa fa-plus"></i></button> -->

      <div class="alert alert-success slideExpandUp hide" role="alert">
        Module ajouté avec succés
        <i class="fa fa-close" ></i>
      </div>

      <div class="alert alert-danger slideExpandUp hide"  role="alert">
        Une erreur est survenue lors de l'ajout
        <i class="fa fa-close" ></i>
      </div>

      <div class='container-fluid d-flex justify-content-between bg-gradient-primary' style="padding:1vh;color:white;font-size:2rem;">
        <a href="#" class="">
                <button class="btn btn-circle bg-gradient-success pulse" id="new_element" data-name="module"><i class="fa fa-plus"></i></button>
        </a>
        <div class="container-fluid d-flex justify-content-end align-items-center" style="gap:1vh">
            <input type="search" class="form-control" name="" id="" style="width:50%;">
            <label for="">Rechercher</label>
        </div>
      </div></br>
      
      <table class="table table-striped table-bordered" data-name="module">
          <tr style='font-weight: bold; font-size:2vh;'>
                <!-- <th>Numero</th> -->
                <th>Libelle</th>
                <th>Actions</th>
          </tr>
          
            <?php foreach($data as $module): ?>
                <tr>
                    <!-- <td><?= $module['id']+1 ?></td> -->
                    <td><?= $module['libelle'] ?></td>
                    <td class="td-action">
                        <button class="btn btn-warning">Modifier</button>
                        <button class="btn btn-danger" value="<?= $module["id"] ?>">Supprimer</button>
                    </td>
                </tr>
            <?php  endforeach;  ?>

      </table>
  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>