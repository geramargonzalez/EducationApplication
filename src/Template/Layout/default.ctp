<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Memoria Escolar</title>

  
  <?= $this->Html->css('../plugins/vendor/bootstrap/css/bootstrap.min') ?>
  

  <?= $this->Html->css('../plugins/vendor/fontawesome-free/css/all.min') ?>

  <!-- Custom fonts for this template -->
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
   <?= $this->Html->css('agency') ?>
   <?= $this->Html->css('icons') ?>

</head>
 

    <?= $this->fetch('content') ?>
    
 
    <?= $this->Html->script('jquery.min'); ?>
    <?= $this->Html->script('../plugins/vendor/bootstrap/js/bootstrap.bundle.min'); ?>
    <?= $this->Html->script('../plugins/vendor/jquery-easing/jquery.easing.min'); ?>
    <?= $this->Html->script('tether.min'); ?>
    <?= $this->Html->script('jqBootstrapValidation'); ?>
    <?= $this->Html->script('modernizr.min'); ?>
    <?= $this->Html->script('jquery.slimscroll'); ?>
    <?= $this->Html->script('contact_me'); ?>
    <?= $this->Html->script('agency'); ?>

</body>

</html>
