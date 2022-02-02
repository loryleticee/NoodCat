<?php
include __DIR__ . "/../Heading/head.php"; ?>
<div>
    <?php
    if (isset($error)) {
        echo $error;
        unset($error);
    }
    ?>
</div>
<form action='<?= "/cat/$sId" ?>' method="POST" id="form_controller">
    <label for="name">NOM: </label>
    <input type="text" name="name" id="name" value="<?= $cat->getName(); ?>">
    <label for="description">DESCRIPTION: </label>
    <input type="text" name="description" id="description" value="<?= $cat->getDescription(); ?>">
    <label for="chipnumber">NUMERO DE PUCE: </label>
    <input type="number" name="chipnumber" min="10000000000" max="99999999999" id="chipnumber" value="<?= $cat->getChipNumber(); ?>">
    <label for="bar">Bar</label>
    <select name="bar" id="bar">
        <?php foreach ($aBar as $bar) : ?>
            <?php if ($cat->getBar()->getId() === $bar->getId()) : ?>
                <option value="<?= $bar->getId() ?>" selected="selected"><?= $bar->getSign(); ?></option>
            <?php else : ?>
                <option value="<?= $bar->getId() ?>"><?= $bar->getSign(); ?></option>
            <?php endif; ?>

        <?php endforeach; ?>
    </select>
    <input type="submit" value="ENREGISTRER">
</form>
<?php
include __DIR__ . "/../Heading/footer.php";
