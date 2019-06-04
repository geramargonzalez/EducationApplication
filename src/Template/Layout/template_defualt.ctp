<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Memoria Escolar</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author"/>
        <link rel="shortcut icon" href="assets/images/favicon.ico">
       
        <?= $this->Html->css('../plugins/summernote/summernote') ?>
        <?= $this->Html->css('../plugins/fullcalendar/css/fullcalendar.min') ?>
        <?= $this->Html->css('../plugins/RWD-Table-Patterns/dist/css/rwd-table.min')?>
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
                        <?= $this->Html->image('../images/logo.png'); ?>
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
           
            <!-- content -->
            <div class="content">
                <div class="topbar">
                    <?php echo $this->element('top-bar'); ?>
                    <!-- LOGO --> 
                 </div>
                  
                 <?= $this->Flash->render() ?>
                  
                 <?= $this->fetch('content') ?>
            </div>

            <!-- content -->

            <!-- footer -->
        <footer class="footer">
                © 2019 Memoria Escolar - All Rights Reserved.
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
    <?= $this->Html->script("password_toggl"); ?>
    <?= $this->Html->script("password_validation"); ?>
    
    

    <!-- Required datatable js -->
    <?= $this->Html->script('../plugins/datatables/jquery.dataTables.min'); ?>
    <?= $this->Html->script('../plugins/datatables/dataTables.bootstrap4.min'); ?>
    <?= $this->Html->script('../plugins/datatables/dataTables.buttons.min'); ?>
    <?= $this->Html->script('../plugins/datatables/buttons.bootstrap4.min'); ?>

    <?= $this->Html->script('../plugins/datatables/jszip.min'); ?>
    <?= $this->Html->script('../plugins/datatables/pdfmake.min'); ?>
    <?= $this->Html->script('../plugins/datatables/vfs_fonts'); ?>
    
    <!-- Buttons examples -->
    <?= $this->Html->script('../plugins/datatables/buttons.html5.min'); ?>
    <?= $this->Html->script('../plugins/datatables/buttons.print.min'); ?>
    <?= $this->Html->script('../plugins/datatables/buttons.colVis.min'); ?>
    <?= $this->Html->script('../plugins/datatables/dataTables.responsive.min'); ?>
    <!-- Responsive examples -->
    <?= $this->Html->script('../plugins/datatables/responsive.bootstrap4.min'); ?>
    <!-- Datatable init js -->
    <?= $this->Html->script('../pages/datatables.init'); ?>
    <?= $this->Html->script('../plugins/tiny-editable/mindmup-editabletable'); ?>
    <?= $this->Html->script('../plugins/tiny-editable/numeric-input-example'); ?>
    <?= $this->Html->script('../plugins/jquery-ui/jquery-ui.min'); ?>
    <?= $this->Html->script('../plugins/moment/moment'); ?>
    <?= $this->Html->script('../plugins/fullcalendar/js/fullcalendar.min'); ?>
    <?= $this->Html->script('../pages/calendar-init'); ?>
    <?= $this->Html->script('../plugins/summernote/summernote.min'); ?>
    <?= $this->Html->script('throttledresize'); ?>


    <!-- App js -->
    <?= $this->Html->script('app'); ?>


   
    <script>
    
        $(window).resize(function(){
        

            <?php 
                  $controller = $this->request->getParam('controller'); 
                  $action = $this->request->getParam('action'); 
            ?>

             <?php if($action == "statsAlumnoObservacion"){ ?>

                    drawChartColumn();
                    drawChartTipos();

              <?php } ?>

             <?php if($action == "statsAlumnos"){ ?>

                drawChartByDay();
                drawChartExpresionOral();
                drawChartConducta();
                drawChartRendimiento();
               

            <?php } ?>

            <?php if($action == "statsAlumnosGenerales"){ ?>

                drawChartExpresionOral();
                drawChartConducta();
                drawChartRendimiento();
                drawChartTipos();

            <?php } ?>


             <?php if($action == "statsAlumnosFaltasMes"){ ?>

                drawChartFaltas();
                drawChartCantHoras();
         
            <?php } ?>
          });

         $(document).ready(function(){
                $('#observaciones').summernote({
                    height: 100,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                 // set focus to editable area after initializing summernote
                });
            });

         $("#password").password('toggle');
         $("#r_password").password('toggle');

         $("#pass").password('toggle');
         $("#pass_confirmation").password('toggle');


       
 
       //});

         $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
       
    </script>

</body>