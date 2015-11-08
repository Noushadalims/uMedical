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
                        Add User & Assign the Roles
                    </h1>
                </section>
                <div class="col-md-12">
                    <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Add Nessary Information</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="save/user/" method="POST" id="CreateUserForm">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input autocomplete="off"  type="email" class="form-control" id="exampleInputEmail1" disabled placeholder="User ID">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off"  type="text" class="form-control" id="UserName" name="UserName" placeholder="User Name">
                                        </div>

                                        <div class="form-group">
                                              <input autocomplete="off"  type="password" class="form-control" id="UserPassword" name="UserPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                              <input autocomplete="off"  type="password" class="form-control" id="RepeatPassword" name="RepeatPassword" placeholder="Repeat Password">
                                        </div>
                                        <div class="form-group">
                                            <select id="UserPreference" name="UserPreference" class="form-control">
                                                <option value="10">Admin</option>
                                                <option value="9">Doctor</option>
                                                <option value="8">Front Office</option>
                                                <option value="7">Lab Tech</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Summary</label>
                                                <textarea class="form-control" id="UserSummary" name="UserSummary" placeholder="Comments"> </textarea>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="button" id="SubmitCreateUser" class="btn btn-primary">Submit</button>
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
