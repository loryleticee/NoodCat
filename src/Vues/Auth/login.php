<?php
include __DIR__ . "/../Heading/head.php";
?>
<div class="container bg-dark text-light">

    <div class="content vh-100">
        <div>
            <?php
            if (isset($error)) {
                echo $error;
                unset($error);
            }
            ?>
        </div>
        <div>
            <span class="d-flex flex-end flex-column align-items-center mt-5">
                <i class="text-info fas fa-cat fa-4x"></i>
            </span>
        </div>
        <form action="/" method="POST" id="form_controller">
            <div class="input-group mb-3">
                <span class="input-group-text border-info bg-info" id="addon-wrapping"><i class="fas fa-at"></i></span>
                <input type="text" name="login" id="login" class="form-control border-info" placeholder="dupon@mail.fr" aria-label="Email" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text border-info bg-info" id="addon-wrapping"><i class="fas fa-key"></i></span>
                <input type="password" name="password" id="password" class="form-control border-info" placeholder="votre mote de passe ici" aria-label="password" aria-describedby="addon-wrapping">
            </div>

            <input type="submit" class="btn btn-success" value="Se connecter">
        </form>
    </div>
</div>
<?php
include __DIR__ . "/../Heading/footer.php";
