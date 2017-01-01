<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->fetch('title') ?> | CakePHP Admin</title>

    <!-- Bootstrap Core CSS -->
    <?= $this->Html->css('/admin/vendor/bootstrap/css/bootstrap.min.css') ?>

    <!-- MetisMenu CSS -->
    <?= $this->Html->css('/admin/vendor/metisMenu/metisMenu.min.css') ?>

    <!-- Custom CSS -->
    <?= $this->Html->css('/admin/dist/css/sb-admin-2.css') ?>

    <!-- Custom Fonts -->
    <?= $this->Html->css('/admin/vendor/font-awesome/css/font-awesome.min.css') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?= $this->element('admin/sidebar') ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if($this->Flash->render()) : ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                <?= h($this->Flash->render()) ?>
                            </div>
                        <?php endif; ?>

                        <h1 class="page-header"><?= $this->fetch('title') ?></h1>
                        
                        <?= $this->fetch('content') ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?= $this->Html->script('/admin/vendor/jquery/jquery.min.js') ?>

    <!-- Bootstrap Core JavaScript -->
    <?= $this->Html->script('/admin/vendor/bootstrap/js/bootstrap.min.js') ?>

    <!-- Metis Menu Plugin JavaScript -->
    <?= $this->Html->script('/admin/vendor/metisMenu/metisMenu.min.js') ?>

    <!-- Custom Theme JavaScript -->
    <?= $this->Html->script('/admin/dist/js/sb-admin-2.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('select.select2').select2();
    </script>

    <!-- CKEditor -->
    <?= $this->Html->script('/js/ckeditor/ckeditor.js') ?>
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace( 'ckeditor' );
        });
    </script>
</body>

</html>
