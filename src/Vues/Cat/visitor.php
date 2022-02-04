<?php

include __DIR__ . "/../Heading/head.php";

if (empty($aCats)) : ?>
    <div>
        Il n'y a aucun chat ici
    </div>
<?php
endif;
?>
<div class="container-sm">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="table-dark text-light">
                    <th>Nom:</th>
                    <th>Description:</th>
                </tr>
            </thead>
            <?php
            foreach ($aCats as $cat) : ?>
                <tr>
                    <td class="table-light">
                        <div class="alert alert-primary" role="alert">
                            <?= $cat->getName() ?>
                        </div>
                    </td>
                    <td class="table-light">
                        <div class="alert alert-secondary" role="alert">

                            <a class="btn btn-primary" data-bs-toggle="collapse" href='<?= "#chatCollapse" . $cat->getId() ?>' role="button" aria-expanded="false" aria-controls="collapseExample">
                                <?php echo substr($cat->getDescription(), 0, 30) . (strlen($cat->getDescription()) > 30 ? "..." : ""); ?>
                            </a>

                            <div class="collapse" id='<?= "chatCollapse" . $cat->getId() ?>'>
                                <div class="card card-body">
                                    <?= $cat->getDescription(); ?>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>

</div>
<?php include __DIR__ . "/../Heading/footer.php";
