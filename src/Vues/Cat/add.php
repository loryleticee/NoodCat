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
    <form action="/cat" method="POST" id="form_controller" style="height: 100vh;">
        <label for="name">NOM: </label>
        <input type="text" name="name" id="name">
        <label for="description">DESCRIPTION: </label>
        <input type="text" name="description" id="description">
        <label for="chipnumber">NUMERO DE PUCE: </label>
        <input type="number" name="chipnumber" min="10000000000" max="99999999999" id="chipnumber">
        <label for="bar">Bar</label>
        <select name="bar" id="bar">
            <?php foreach ($aBar as $bar) :?>
                    <option value="<?=$bar->getId()?>"><?=$bar->getSign()?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="ENREGISTRER">
    </form>

<?php
include __DIR__ . "/../Heading/footer.php"; ?>

<script>
    $(".error").remove().fadeOut(3000)
</script>


