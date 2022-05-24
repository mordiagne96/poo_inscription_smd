<?php require_once $base_template."templates/includes/header.html.php";
 ?>
<!-- <?= var_dump($_SESSION['user']); ?> -->

  <div class='container container-fluid'>
      <h1>LISTE DES DEMANDES</h1>
      <div class="alert alert-success slideExpandUp hide" role="alert">
        Professeur ajouté avec succés
        <i class="fa fa-close" ></i>
      </div>
      <div class="alert alert-danger slideExpandUp hide"  role="alert">
        Une erreur est survenue lors de l'ajout
        <i class="fa fa-close" ></i>
      </div>
      
      <div class='container-fluid d-flex justify-content-between bg-gradient-primary' style="padding:1vh;color:white;font-size:2rem;">
        <a href="#" class="">
                <button class="btn btn-circle bg-gradient-success pulse" id="new_element" data-name="demande" ><i class="fa fa-plus"></i></button>
        </a>
        <div class="container-fluid d-flex justify-content-end align-items-center" style="gap:1vh">
            <input type="search" class="form-control" name="" id="" style="width:50%;">
            <label for="">Rechercher</label>
        </div>
      </div></br>

      <table class="table table-striped table-bordered" data-name="demande">
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
                    <td><button class="btn btn-primary">Details</button></td>
                </tr>
            <?php  endforeach;  ?>

      </table>
                
      
  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>