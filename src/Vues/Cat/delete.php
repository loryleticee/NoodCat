<?php include __DIR__ . "/../Heading/head.php"; ?>
<div> <?= $cat->getName() ?> a bien été supprimé </div>
<div>Vous allez être redirigé ...</div>
<script>
    setTimeout(()=> {
        window.location.href = "/cats";
    }, 2000)
</script>
<?php include __DIR__ . "/../Heading/footer.php";
