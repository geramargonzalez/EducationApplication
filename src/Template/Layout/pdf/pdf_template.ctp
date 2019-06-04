<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <!--Morris Chart CSS -->
        <?= $this->Html->css('../plugins/summernote/summernote',['fullBase' => true]) ?>
        <?= $this->Html->css('../plugins/fullcalendar/css/fullcalendar.min',['fullBase' => true]) ?>
        <?= $this->Html->css('../plugins/RWD-Table-Patterns/dist/css/rwd-table.min',['fullBase' => true])?>
        <?= $this->Html->css('bootstrap.min',['fullBase' => true]) ?>
        <?= $this->Html->css('icons',['fullBase' => true]) ?>
        <?= $this->Html->css('style',['fullBase' => true]) ?>


    </head>

<body class="fixed-left widescreen">
    <!-- Loader -->
    <!-- Begin page -->
    <div id="wrapper">
            <!-- content -->
            <div class="content">
                 <?= $this->fetch('content') ?>
            </div>

            <!-- content -->

            <!-- footer -->
        <footer class="footer">
                © 2019 - Memoria Escolar - All Rights Reserved.
        </footer>
        
    </div>
    <!-- scripts -->
    

    <!-- App js -->
    <?= $this->Html->script('app'); ?>


</body>