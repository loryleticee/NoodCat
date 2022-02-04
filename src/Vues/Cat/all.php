<?php

include __DIR__ . "/../Heading/head.php";

if (empty($aCats)) : ?>
    <div>
        Il n'y a aucun chat ici
    </div>
<?php
endif;
?>
<div class="d-flex gap-5">
    <?php
    foreach ($aBar as $bar) : ?>
        <div class="d-flex vh-100 align-items-center">
            <div style="max-height: 800px ;overflow: scroll;">
                <table class="table">
                    <thead>
                        <tr class="bg-success text-light tex-center">
                            <th><i class="fas fa-glass-martini-alt"></i> <?= $bar->getSign(); ?> </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr class="table-dark text-light text-center">
                            <th><i class="fas fa-cat"></i></th>
                            <th>Description:</th>
                            <th><i class="fas fa-fingerprint"></i></th>
                            <?php if ($_SESSION["Type"] === "manager") : ?>
                                <th> Action </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <?php
                    foreach ($aCats[$bar->getId()] as $cat) : ?>
                        <tr>
                            <td class="table-light">
                                <div class="alert alert-primary" role="alert">
                                    <?= $cat->getName() ?>
                                </div>
                            </td>
                            <td class="table-light">
                                <div class="alert alert-secondary" role="alert">

                                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href='<?= "#chatCollapse" . $cat->getId() ?>' role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <?php echo substr($cat->getDescription(), 0, 30) . (strlen($cat->getDescription()) > 30 ? "..." : ""); ?>
                                    </a>

                                    <div class="collapse" id='<?= "chatCollapse" . $cat->getId() ?>'>
                                        <div class="card card-body">
                                            <?= $cat->getDescription(); ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="table-light">
                                <div class="alert alert-warning" role="alert">
                                    <?= $cat->getChipNumber() ?>
                                </div>
                            </td>

                            <?php if ($_SESSION["Type"] === "manager") : ?>
                                <td>
                                    <div class="row">
                                        <div class="btn-group gap-3" role="group" aria-label="First group">
                                            <div class="col btn btn-info edit" data-id="<?= $cat->getId(); ?>" data-bs-toggle="modal" data-bs-target='<?= "#chat" . $cat->getId() ?>'>
                                                <i class="far fa-edit"></i>
                                            </div>
                                            <div class="col btn btn-danger delete" data-id="<?= $cat->getId(); ?>" data-name="<?= $cat->getName(); ?>">
                                                <i class="far fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <?php endif; ?>

                            <?php include __DIR__ . "/Modal/modal-modify.php" ?>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>

    <?php
    endforeach;
    ?>
</div>
<script>
    $(".edit").on("click", function(e) {
        // window.location.href = "/cat/" + $(this).attr("data-id");
    });

    $(".delete").on("click", function(e) {
        if (confirm("Êtes vous sur de vouloir supprimer " + $(this).attr("data-name"))) {
            window.location.href = "/removecat/" + $(this).attr("data-id");
        }
    });
</script>

<?php include __DIR__ . "/../Heading/footer.php";
