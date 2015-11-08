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
                        Add Doctor
                    </h1>
                </section>
                <div class="col-md-12">
                    <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Add Nessary Information</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="FormCreateDoctor" action="save/doctor/" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input autocomplete="off" type="email" class="form-control" id="exampleInputEmail1" name="Doctor" disabled placeholder="Doctor ID">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorFirstName" name="DoctorFirstName" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                              <input autocomplete="off" type="text" class="form-control" id="DoctorLastName" name="DoctorLastName" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorMobileNo" name="DoctorMobileNo" placeholder="Mobile No">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorPhoneNo" name="DoctorPhoneNo" placeholder="Phone No">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorAddress" name="DoctorAddress" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorCity" name="DoctorCity" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorPinCode" name="DoctorPinCode" placeholder="Pin Code">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorState" name="DoctorState" placeholder="State">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorSpecialist" name="DoctorSpecialist"  placeholder="Specialist">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" id="DoctorFees" name="DoctorFees"  placeholder="Consultation charges">
                                        </div>
                                        <div class="form-group">
                                            <label>Comments</label>
                                                <textarea class="form-control" id="DoctorComments" name="DoctorComments" placeholder="Comments"> </textarea>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="button" id="SubmitCreateDoctor" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                        </div>

                </div>
                <!-- Main content -->
                <section class="content">


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
 <div class="alert alert-success alert-dismissable" id="SuccessMsg">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Your Data has been saved successfully
                                    </div>

        <?php include('template/footer.php'); ?>

    </body>
</html>
