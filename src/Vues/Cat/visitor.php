<?php
include __DIR__ . "/../Heading/head.php";

if (empty($aCats)) : ?>
    <div>
        Il n'y a aucun chat ici
    </div>
<?php
endif;

// foreach ($aCats as $bar) :
?>
<div>
    BAR : <?= $bar2->getSign(); ?>
</div>
<table style="height: 100vh;">
    <th>Nom:</th>
    <th>Description:</th>
    <?php
    foreach ($aCats as $cat) : ?>
        <tr>
            <td> <?= $cat->getName() ?> </td>
            <td> <?= $cat->getDescription() ?> </td>
            <td> <?= $cat->getChipNumber() ?> </td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<?php
// endforeach;

include __DIR__ . "/../Heading/footer.php";
