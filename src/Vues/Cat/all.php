<?php
include __DIR__ . "/../Heading/head.php";

if (empty($aCats)) : ?>
    <div>
        Il n'y a aucun chat ici
    </div>
<?php
endif;
?>
<div class="content">
    <div>
        BAR : <?= $bar1->getSign(); ?>
    </div>
    <table>
        <th>Nom:</th>
        <th>Description:</th>
        <th>N° puce:</th>
        <?php if ($_SESSION["Type"] === "manager") : ?>
            <th> Action </th>
        <?php endif;

        foreach ($aCats as $cat) : ?>
            <tr>
                <td> <?= $cat->getName() ?> </td>
                <td> <?= $cat->getDescription() ?> </td>
                <td> <?= $cat->getChipNumber() ?> </td>
                <?php if ($_SESSION["Type"] === "manager") : ?>
                    <td> <span><i class="far fa-edit" data-id="<?= $cat->getId(); ?>"></i></span> &nbsp; <span><i class="far fa-trash-alt" data-id="<?= $cat->getId(); ?>" data-NAME="<?= $cat->getNAME(); ?>"></i></span></td>
                <?php endif; ?>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</div>
<script>
    $(".fa-edit").on("click", function(e) {
        window.location.href = "/cat/" + $(this).attr("data-id");
    });

    $(".fa-trash-alt").on("click", function(e) {

        if (confirm("Êtes vous sur de vouloir supprimer " + $(this).attr("data-name")) == true) {
            window.location.href = "/removecat/" + $(this).attr("data-id");
        }
    });
</script>

<?php include __DIR__ . "/../Heading/footer.php";
