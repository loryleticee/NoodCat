<?php

include __DIR__ . "/../Heading/head.php";

if (empty($aReloc)) : ?>
    <div>
        Il n'y a aucun transfert
    </div>
<?php
endif;
?>
<div class="d-flex gap-5">
    <div class="d-flex vh-100 align-items-center">
        <div style="max-height: 800px ;overflow: scroll;">
            <table class="table">
                <thead>
                    <tr class="table-dark text-light text-center">
                        <th><i class="fas fa-passport"></i></th>
                        <th><i class="fas fa-truck-moving"></i></th>
                        <th><i class="fas fa-truck-loading"></i></th>
                        <th><i class="fas fa-calendar-alt"></i></th>
                        <?php if ($_SESSION["Type"] === "manager") : ?>
                            <th> Action </th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <?php
                foreach ($aReloc as $reloc) : ?>
                    <tr>
                        <td class="table-dark">
                            <div class="alert alert-primary" role="alert">
                                <?= $reloc->getId() ?>
                            </div>
                        </td>
                        <td class="table-dark">
                            <div class="alert alert-secondary" role="alert">
                                <?= $reloc->getStartBar(); ?>
                            </div>
                        </td>
                        <td class="table-dark">
                            <div class="alert alert-warning" role="alert">
                                <?= $reloc->getEndBar() ?>
                            </div>
                        </td>

                        <td class="table-dark">
                            <div class="alert alert-light" role="alert">
                                <?= $reloc->getTransportDate() ?>
                            </div>
                        </td>

                        <?php if ($_SESSION["Type"] === "manager") : ?>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="btn-group gap-3" role="group" aria-label="First group">
                                            <div class="col btn btn-info edit" data-id="<?= $reloc->getId(); ?>" data-bs-toggle="modal" data-bs-target='<?= "#chat" . $reloc->getId() ?>'>
                                                <i class="far fa-edit"></i>
                                            </div>
                                            <div class="col btn btn-danger delete" data-id="<?= $reloc->getId(); ?>" data-name="<?= $reloc->getName(); ?>">
                                                <i class="far fa-trash-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
</div>
<script>
    $(".delete").on("click", function(e) {
        if (confirm("Êtes vous sur de vouloir supprimer " + $(this).attr("data-name"))) {
            window.location.href = "/removecat/" + $(this).attr("data-id");
        }
    });
</script>

<?php include __DIR__ . "/../Heading/footer.php";
