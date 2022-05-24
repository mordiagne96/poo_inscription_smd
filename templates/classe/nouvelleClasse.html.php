<?php require_once $base_template."templates/includes/header.html.php";
 ?>

<div class="container container-fluid flex-column align-align-items-center" style="width:100%;">

<form class="d-flex flex-column" method="post" action="<?= isset($data["id"]) ? $url_base."Classe/edit/".$data["id"] : $url_base."Classe/add" ?>">
    <div class="col">
        <div class="mb-3">
            <label for="" class="form-label">Libelle</label>
            <input type="text" value="<?= isset($data['libelle'])?$data['libelle']:"" ?>" name="libelle" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="" class="form-label">Filiere</label>
            <input type="text" value="<?= isset($data['filiere'])?$data['filiere']:"" ?>" name="filiere" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="" class="form-label">Niveau</label>
            <input type="text" value="<?= isset($data['niveau'])?$data['niveau']:"" ?>" name="niveau" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="" class="form-label"></label>
            <input type="submit" name="<?= isset($data['niveau'])?"modifier":"ajouter" ?>" id="" value="<?= isset($data['niveau'])?"Modifier":"Ajouter" ?>" class="form-control bg-primary text-white" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
        </div>
    </div>
</form>
</div>





















<?php require_once $base_template."templates/includes/footer.html.php"; ?>
