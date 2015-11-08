<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Report | Test</title>
        <?php include('template/header.php'); ?>
        <link rel="stylesheet" href="<?php echo SITE_PATH; ?>css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    </head>
    <body class="skin-blue">

    <div class="editWapper">
        <div class="Holder">
            
        </div>

    </div>
        <!-- header logo: style can be found in header.less -->
                <?php include('template/persistent_bar.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include("template/aside.php"); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Complete Investigation Records
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Investigation Records</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="investigationTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Investigation</th>
                                                <th>Investigation Fee</th>
                                                <th style="text-align:center;" >Status</th>
                                                <th>Summary</th>
                                                <?php if($sessionData['access_rights']==10){ ?>
                                                <th>Edit</th>
                                                <th>Remove</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = $this->db->get('investigation_information');

                                        foreach ($query->result() as $row)
                                        {

                                            ?>
                                            <tr>
                                                <td><?php echo $investigation_id=$row->investigation_id; ?><input type="hidden" id="investigationId" name="investigationId" value="<?php echo $investigation_id ?>"></td>
                                                <td><?php echo $row->investigation_name; ?></td>
                                                <td><?php echo $row->investigation_fee; ?></td>
                                                <td style="text-align:center;"><?php 

                                                $status=$row->status; 
                                                if($status==1){
                                                    ?>
                                                    <span class="label label-success">Available</span>
                                                    <?php
                                                }elseif($status==0){
                                                    ?>
                                                    <span class="label label-danger">Not Available</span>
                                                    <?php
                                                }
                                                ?></td>
                                                <td><?php echo $row->summary; ?></td>
                                                <?php if($sessionData['access_rights']==10){ ?>
                                                <td><a href="<?php echo SITE_PATH."index.php/alter/investigation/".$investigation_id; ?>" id="editInvestigation" class="btn btn-default btn-flat"><i class="fa fa-edit"></i></a></td>
                                                <td><button id="removeInvestigation" class="btn btn-danger btn-flat"><i class="fa fa-minus-square"></i></button></td>
                                                <?php } ?>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="<?php echo SITE_PATH; ?>js/jquery.min.js"></script>
        <script src="<?php echo SITE_PATH; ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo SITE_PATH; ?>js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo SITE_PATH; ?>js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo SITE_PATH; ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo SITE_PATH; ?>js/AdminLTE/demo.js" type="text/javascript"></script>
        <script src="<?php echo SITE_PATH; ?>js/common.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo SITE_PATH; ?>js/jquery.fancybox.pack.js?v=2.1.5"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });




            $(document).ready(function() {
                $("#editInvestigation").click(function(){
                    $(".various").fancybox({
                        maxWidth    : 800,
                        maxHeight   : 600,
                        fitToView   : false,
                        width       : '70%',
                        height      : '70%',
                        autoSize    : false,
                        closeClick  : false,
                        openEffect  : 'none',
                        closeEffect : 'none'
                    });
                });
                
            });
        </script>

    </body>
</html>
