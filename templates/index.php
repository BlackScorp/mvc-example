<?php require_once __DIR__.'/partials/header.php';?>

<?php if($isLoggedIn):?>

Hallo <?= $username ?>
<?php endif;?>

<?php if(false === $isLoggedIn):?>
Bitte einen User in DB eintragen
<?php endif;?>
<?php require_once __DIR__.'/partials/footer.php';?>