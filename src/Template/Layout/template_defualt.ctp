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
    
        <?= $this->Html->css('../plugins/morris/morris') ?>
        
        <?= $this->Html->css('bootstrap.min') ?>
         <?= $this->Html->css('icons') ?>
         <?= $this->Html->css('style') ?>

    </head>

<body class="fixed-left widescreen">
    <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar start ========== -->
        <div class="left side-menu">
           <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>
              <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo">Admiry</a>-->
                        <a href="index.html" class="logo"> <?= $this->Html->image('../images/logo.png'); ?></a>
                    </div>
                </div>
            <div class="sidebar-inner slimscrollleft">
                <?php echo $this->element('avatar'); ?>
                <!--- Divider -->
                <div id="sidebar-menu">
                     <?php echo $this->element('menu_left'); ?>
                </div>
            </div>
        </div>
        <!-- ========== Left Sidebar end ========== -->

        <!-- ========== main content start ========== -->
        <div class="content-page">
            <?= $this->Flash->render() ?>
            <!-- content -->
            <div class="content">
                <div class="topbar">
                    <?php echo $this->element('top-bar'); ?>
            <!-- LOGO --> 
                 </div>
                 <?= $this->fetch('content') ?>
            </div>

            <!-- content -->

            <!-- footer -->
            <footer class="footer">
                © 2019 Gerardo Gonzalez - All Rights Reserved.
            </footer>
        </div>

        <!-- ========== main content end ========== -->


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