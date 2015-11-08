<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo BUSINESS_NAME; ?> | Investigation </title>
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
                        Add Investigation Details 
                    </h1>
                </section>
                <div class="col-md-12">
                    <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Add Nessary Information</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="save/investigation/" method="POST" id="FormCreateInvestigation">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input autocomplete="off"  type="text" class="form-control" name="InvestigationId" value="12" id="InvestigationId" readonly placeholder="Investigation ID">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off"  type="text" class="form-control" id="InvestigationName" name="InvestigationName" placeholder="Investigation Name">
                                        </div>
                                        <div class="form-group">
                                              <input autocomplete="off"  type="text" class="form-control" id="InvestigationFee" name="InvestigationFee" placeholder="Fee">
                                        </div>
                                        <div class="form-group">
                                            <select id="InvestigationAvailability" name="InvestigationAvailability" class="form-control">
                                                <option value="1">Available</option>
                                                <option value="0">Not Available</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Summary</label>
                                                <textarea class="form-control" id="exampleInputPassword1" id="InvestigationSummary" name="InvestigationSummary" placeholder="Comments"> </textarea>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="button" name="Submit" id="SubmitCreateInvestigation" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                        </div>

                </div>
                <!-- Main content -->
                <section class="content">
                                    <div class="alert alert-success alert-dismissable" id="SuccessMsg">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Your Data has been saved successfully
                                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <?php include('template/footer.php'); ?>
        <script type="text/javascript">


        


            /*var JsonData = "";
            JsonDatas=jQuery.parseJSON(JsonData);
            console.log(JsonDatas);*/
        </script>
    </body>
</html>
