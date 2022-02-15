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
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <style>
        .centr {
            display: flex;

        }
    </style>

    <form action="/relocation" method="POST" id="form_controller" class="row g-3">
        <?php
        if (!empty($aCats)) : ?>
            <div class="input-group mb-3">
                <span class="input-group-text bg-info border-info text-light"><i class="fas fa-cat"></i></span>
                <select name="cat" id="cat" class="form-select  form-control border-info text-info">
                    <?php foreach ($aCats as $cat) : ?>
                        <option value="<?= $cat->getId() ?>"><?= $cat->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php
        endif;
        ?>

        <?php
        if (!empty($aBar)) : ?>
            <div class="input-group mb-3">
                <span class="input-group-text bg-success border-success text-light"><i class="fas fa-plane-departure"></i></span>
                <select name="start_bar" id="start_bar" class="form-select border-success text-success">
                    <?php foreach ($aBar as $bar) : ?>
                        <option value="<?= $bar->getId() ?>"><?= $bar->getSign() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text bg-success border-success text-light"><i class="fas fa-plane-arrival"></i></span>
                <select name="end_bar" id="end_bar" class="form-select border-success text-success">
                    <?php foreach ($aBar as $bar) : ?>
                        <option value="<?= $bar->getId() ?>"><?= $bar->getSign() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php
        endif;
        ?>

        <div class="input-group mb-3 gap-2">
            <div class="form-check">
                <input class="form-check-input transport-type" type="radio" data-transport_type="cashier" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                <span class="input-group-text bg-secondary border-light text-light"> <i class="fas fa-users"></i></span>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input transport-type" type="radio" data-transport_type="transportCompany" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                <span class="input-group-text bg-dark border-light text-light"><i class="fas fa-truck-moving"></i></span>
                </label>
            </div>
        </div>

        <?php
        if (!empty($aCashier)) : ?>
            <div class="input-group mb-3 cashier visually-hidden">
                <span class="input-group-text bg-secondary border-secondary text-light">
                    <i class="fas fa-users"></i>
                </span>
                <select name="cashier" id="cashier" class="form-select border-light text-dark">
                    <?php foreach ($aCashier as $cashier) : ?>
                        <option value="<?= $cashier->getId() ?>"><?= $cashier->getFirstname() . " " . $cashier->getLastname() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php
        endif;
        ?>

        <?php
        if (!empty($aTransportCompany)) : ?>
            <div class="input-group mb-3 transportCompany visually-hidden">
                <span class="input-group-text bg-dark border-light text-light"><i class="fas fa-truck-moving"></i></span>
                <select name="transportCompany" id="transportCompany" class="form-select border-light text-dark">
                    <?php foreach ($aTransportCompany as $tc) : ?>
                        <option value="<?= $tc->getId() ?>"><?= $tc->getCompanyName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php
        endif;
        ?>

        <div class="input-group mb-3">
            <span class="input-group-text border-warning bg-warning text-light"><i class="far fa-calendar-alt"></i></span>
            <input type="date" name="datetime" id="datetime" class="form-control border-warning" aria-label="datetime" />
        </div>

        <div class="input-group">
            <input class="btn btn-primary" type="submit" value="Préparer au transfert">
        </div>
    </form>
</div>

<?php
include __DIR__ . "/../Heading/footer.php"; ?>