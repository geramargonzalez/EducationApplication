<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admiry - Responsive Flat Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!--Morris Chart CSS -->
    
        <?= $this->Html->css('plugins/morris/morris.css') ?>
        
        <?= $this->Html->css('bootstrap.min.css') ?>
         <?= $this->Html->css('icons.css') ?>
         <?= $this->Html->css('style.css') ?>

    </head>

<body class="fixed-left widescreen">

    <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>


        <div class="accountbg"></div>
        <div class="wrapper-page">

            <?= $this->fetch('content') ?>


    </div>
    <!-- scripts -->
   
    <?= $this->Html->script('jquery.min'); ?>
    <?= $this->Html->script('tether.min'); ?>
    <?= $this->Html->script('bootstrap.min'); ?>
    <?= $this->Html->script('modernizr.min'); ?>
    <?= $this->Html->script('detect'); ?>
    <?= $this->Html->script('fastclick'); ?>
    <?= $this->Html->script('jquery.slimscroll'); ?>
    <?= $this->Html->script('jquery.blockUI'); ?>
    <?= $this->Html->script('waves'); ?>
    <?= $this->Html->script('jquery.nicescroll'); ?>
    <?= $this->Html->script('jquery.scrollTo.min'); ?>

    <!--Morris Chart--> 
    <?= $this->Html->script('../plugins/morris/morris.min'); ?>
    <?= $this->Html->script('../plugins/raphael/raphael-min'); ?>
    <?= $this->Html->script('../pages/dashborad'); ?>
 
    <!-- App js -->
    <?= $this->Html->script('app'); ?>

</body>