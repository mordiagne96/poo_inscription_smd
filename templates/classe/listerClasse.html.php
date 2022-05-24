<?php require_once $base_template."templates/includes/header.html.php";
 ?>


  <div class='container container-fluid'>
      <h1>LISTE DES CLASSES</h1>
      <!-- <button class="btn btn-circle bg-gradient-success pulse" id="new_element" data-name="classe" ><i class="fa fa-plus"></i></button> -->
      
      <div class="alert alert-success slideExpandUp hide" role="alert">
        Classe ajouté avec succés
        <i class="fa fa-close" ></i>
      </div>
      <div class="alert alert-danger slideExpandUp hide"  role="alert">
        Une erreur est survenue lors de l'ajout
        <i class="fa fa-close" ></i>
      </div>
      <div class='container-fluid d-flex justify-content-between bg-gradient-primary' style="padding:1vh;color:white;font-size:2rem;">
        <a href="#" class="">
                <button class="btn btn-circle bg-gradient-success pulse" id="new_element" data-name="classe"><i class="fa fa-plus"></i></button>
        </a>
        <div class="container-fluid d-flex justify-content-end align-items-center" style="gap:1vh">
            <input type="search" class="form-control" name="" id="" style="width:50%;">
            <label for="">Rechercher</label>
        </div>
      </div></br>
      
      <table class="table table-striped table-bordered table-hover" data-name="classe">
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
                  <td class="td-action">
                    <!-- <a href="<?= $url_base."Classe/edit/".$prof["id"] ?>">
                        <button class="btn btn-warning" value="<?= $prof["id"] ?>">Modifier</button>
                    </a> -->
                    <button class="btn btn-warning" value="<?= $prof["id"] ?>">Modifier</button>
                    <button class="btn btn-danger" value="<?= $prof["id"] ?>">Supprimer</button>
                  </td>
                </tr>
            <?php  endforeach;  ?>
      </table>
  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>