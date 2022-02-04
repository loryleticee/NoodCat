<div class="modal fade" id='<?= "chat" . $cat->getId() ?>' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Form start -->
            <form action='<?="/cat/".$cat->getId() ?>' method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modification du chat <?= $cat->getName(); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d">
                        <div class="input-group mb-3">
                            <span class="input-group-text border-info bg-info" id="addon-wrapping"><i class="fas fa-cat"></i></span>
                            <input type="text" name="name" id="name" value="<?= $cat->getName(); ?>" class="form-control border-info" placeholder="Nom du chat" aria-label="Nom du chat" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">DESCRIPTION</span>
                            <textarea class="form-control" name="description" id="description" aria-label="With textarea"> <?= $cat->getDescription(); ?> </textarea>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text border-warning bg-warning"><i class="fas fa-fingerprint"></i></span>
                            <input type="number" name="chipnumber" min="10000000000" max="99999999999" value="<?= $cat->getChipNumber(); ?>" placeholder="10000000000" id="chipnumber" class="form-control  border-warning" aria-label="chipnumber" />
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Bar</span>
                            <select name="bar" id="bar" class="form-select">
                                <?php foreach ($aBar as $bar) : ?>
                                    <?php if ($cat->getBar()->getId() === $bar->getId()) : ?>
                                        <option value="<?= $bar->getId() ?>" selected="selected"><?= $bar->getSign(); ?></option>
                                    <?php else : ?>
                                        <option value="<?= $bar->getId() ?>"><?= $bar->getSign(); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="MODIFIER" class="btn btn-primary">
                </div>
            </form>
             <!-- Form end -->
        </div>
    </div>
</div>