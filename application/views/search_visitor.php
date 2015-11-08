<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo BUSINESS_NAME; ?> | Dashboard</title>
        <?php include('template/header.php'); ?>
    </head>
    <body class="skin-blue">
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
                        Search Patent Information
                    </h1>
                </section>
                

                <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Please type patent name</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" id="searchVisitorKeyword" class="form-control input-sm pull-right" style="width: 400px; " placeholder="Search : Patent Id, Name, Contact No">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="searchVisitorTable">
                                        </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>



                <!-- Main content -->
                <section class="content">


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <?php include('template/footer.php'); ?>
        <script type="text/javascript">
        $("#searchVisitorKeyword").keyup(function(){
            var val = $("#searchVisitorKeyword").val();
           $.get( applicationUrl+"ajax/searchPatent/"+val, function( data ) {
              $( "#searchVisitorTable" ).html( data );
            });
        });


        </script>

    </body>
</html>
