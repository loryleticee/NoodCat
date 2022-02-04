<?php
include __DIR__ . "/../Heading/head.php"; ?>
<div class="error">
    <?php
    if (isset($error)) {
        echo $error;
        unset($error);
    }
    ?>
</div>
<div class="d-flex">
    <style>
        .centr {
            display: flex;

        }
    </style>

    <form action="/cat" method="POST" id="form_controller" style="height: 100vh;">
        <div class="input-group mb-3">
            <span class="input-group-text bg-info border-info text-light" id="addon-wrapping"><i class="fas fa-cat"></i></span>
            <input type="text" name="name" id="name" class="form-control border-info text-info" placeholder="Nom du chat" aria-label="Nom du chat" aria-describedby="addon-wrapping">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text bg-dark text-light border-light"><i class="far fa-comment"></i></span>
            <textarea class="form-control" name="description" id="description" aria-label="With textarea"></textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text border-warning bg-warning text-light"><i class="fas fa-fingerprint"></i></span>
            <input type="number" name="chipnumber" min="10000000000" max="99999999999" placeholder="10000000000" id="chipnumber" class="form-control border-warning" aria-label="chipnumber" />
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text bg-success border-success text-light"><i class="fas fa-glass-martini-alt"></i></span>
            <select name="bar" id="bar" class="form-select border-success text-success">
                <?php foreach ($aBar as $bar) : ?>
                    <option value="<?= $bar->getId() ?>"><?= $bar->getSign() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <input class="btn btn-primary" type="submit" value="ENREGISTRER">
        </div>
    </form>
</div>

<?php
include __DIR__ . "/../Heading/footer.php"; ?>

<script>
    $(".error").remove().fadeOut(3000)
</script>