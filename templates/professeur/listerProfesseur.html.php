    <?php require_once $base_template."templates/includes/header.html.php";
 ?>
<!-- <?= var_dump($_SESSION['user']); ?> -->

  <div class='container container-fluid'>
      <h1 class='titre'>LISTE DES PROFESSEURS</h1>
      
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
                <button class="btn btn-circle bg-gradient-success pulse" id="new_element" data-name="professeur" ><i class="fa fa-plus"></i></button>
        </a>
        <div class="container-fluid d-flex justify-content-end align-items-center" style="gap:1vh">
            <input type="search" class="form-control" name="" id="" style="width:50%;">
            <label for="">Rechercher</label>
        </div>
      </div></br>
      <table class="table table-striped table-bordered" data-name="professeur">
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
                    <td class="td-action">
                        <button class="btn btn-warning" value="<?= $prof['id'] ?>">Modifier</button>
                        <button class="btn btn-danger" value="<?= $prof['id'] ?>">Supprimer</button>
                    </td>
                </tr>
            <?php  endforeach;  ?>

      </table>
            <!-- formulaire d'inscription charger en js -->
        
            <div class="hide form-prof slideExpandUp" >
                <form id="form-inscription-prof"style="display: flex; gap:4vh; padding:3vh;" class="bg-gray-200 position-relative" method="post" enctype="multipart/form-data" action="<?= $url_base ?>Professeur/add">
                    <input type="hidden" name="add-professeur-fetch">
                    <div style="width:40%;">
                        <label><h3>Information Professeur</h3></label>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Nom Complet</label>
                            <div class="col-sm-1-12">
                                <input type="text" class="form-control" name="nom_complet" id="inputName" placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Adresse</label>
                            <div class="col-sm-1-12">
                                <input type="text" class="form-control" name="adresse" id="inputName" placeholder="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Grade</label>
                            <div class="col-sm-1-12">
                                <input type="text" class="form-control" name="grade" id="inputName" placeholder="">
                            </div>
                        </div>
                        <div class="form-check form-check-inline" style="display:flex; gap:6rem;">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexe" id="" value="M"> Masculin
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexe" id="" value="F">Feminin
                            </label>
                        </div>

                    </div>
                    <!-- module -->
                    <div class="info-module d-flex flex-column mb-3" style="width:30%;">
                        <label for="" class="form-label"><h3>Module</h3></label>
                    </div>
                    <!-- classe -->
                    <div class="d-flex flex-column mb-3 info-classe" style="width:30%;">
                        <label for="" class="form-label"><h3>Classe</h3></label></br>
                    </div>

                    <div class="position-absolute bottom-0 start-50 translate-middle-x d-flex justify-content-evenly" style="gap:2vh;">
                        <button type="submit" name="ajout-professeur" value="ajouter" class="btn btn-primary">Ajouter</button>
                        <button type="reset" class="btn btn-warning">Annuler</button>
                    </div>
                    
                </form>
            </div>

  </div>



<?php require_once $base_template."templates/includes/footer.html.php"; ?>