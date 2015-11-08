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
                        Add new Visitor
                    </h1>
                </section>
                <div class="create-visitor">

                    <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Quick Registration</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" >New Registration</button>
                                    </div><!-- /. tools -->
                                </div>
                                <div class="box-body registration">
                                    <form action="save/visitor_record/" id="createVisitor" method="POST">
                                        <div class="form-group">
                                            <input autocomplete="off" type="email"  class="form-control locked-item" id="visitorId" name="visitorId" disabled="" value="Visitor ID <?php echo $this->input->cookie('cookieVisitorId', TRUE); ?> ">
                                            <input autocomplete="off" type="email" class="form-control locked-item" id="patentId" name="patentId" disabled="" value="Patent ID ">
                                            <input autocomplete="off" type="email" style="width:250px;" id="searchPatentId" class="form-control pull-right" name="searchPatentId" placeholder="Search Patent ID">
                                        </div>
                                        <div class="form-group">
                                            <select id="patentTitle" name="patentTitle" class="patent-title">
                                                <option value="Mr">Mr</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>

                                            <input autocomplete="off" type="text" id="patentFirstName" class="form-control patent-name" name="patentFirstName" placeholder="Patent First Name">
                                            <input autocomplete="off" type="text" id="patentLastName" class="form-control patent-name" name="patentLastName" placeholder="Patent Last Name">

                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control age-css" id="patentAge" maxlength="3" size="3" name="patentAge" placeholder="Age">
                                            &nbsp;&nbsp;&nbsp;&nbsp;<strong>Gender</strong>
                                            <input type="radio" id="patentGender" name="patentGender" value="M" style="position: absolute; opacity: 0;"> Male  <input type="radio" id="patentGender" name="patentGender" value="F" style="position: absolute; opacity: 0;"> Female 
                                            &nbsp;&nbsp;|&nbsp;&nbsp;<strong>Martial Status</strong>
                                            <input type="radio" name="patentMartialStatus" id="patentMartialStatus" value="S" style="position: absolute; opacity: 0;"> Single <input type="radio" name="patentMartialStatus" id="patentMartialStatus" value="M" style="position: absolute; opacity: 0;"> Married 
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" name="patentAddress" id="patentAddress" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                             <select id="patentCity" name="patentCity" class="patent-title">
                                                <option value="Bangalore">Bangalore</option>
                                                <!--<option value="Jayanagar">Jayanagar</option>
                                                <option value="JP Nagar">JP Nagar</option>-->
                                            </select>
                                            <select id="patentState" name="patentState" class="patent-title">
                                                <option value="KA">Karnataka</option>
                                                <option value="AP">Andra Pradesh</option>
                                                <option value="TN">Tamil Nadu</option>
                                            </select>

                                            <input autocomplete="off" id="patentPinCode" type="text" class="form-control pincode-css" name="patentPinCode" maxlength="6" size="6" placeholder="Pin Code">

                                             <select id="patentCountry" name="patentCountry" class="patent-title">
                                                <option selected="">India</option>
                                                <option>Cannada</option>
                                                <option>United States</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input id="patentPhoneNo" maxlength="12" autocomplete="off" type="text" class="form-control phone-css" name="patentPhoneNo" placeholder="Phone">
                                            <input id="patentMobileNo"  maxlength="10" autocomplete="off" type="text" class="form-control mobile-css" name="patentMobileNo" placeholder="Mobile">
                                        </div>
                                        <br>
                                       <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Referral Description </h3>
                                            
                                        </div>
                                        <div class="box-body investigation-display">
                                                <div class="form-group">
                                                    <input autocomplete="off" id="ReferenceName" type="text" class="form-control investigation-css" name="ReferenceName" placeholder="Referral Description">
                                                    <input autocomplete="off" id="ReferenceDiscount" type="text" class="form-control investigation-amount-css" name="ReferenceDiscount" placeholder="Discount">
                                                    <button class="btn btn-default" onclick="return false;">Clear</button>
                                                </div>
                                        </div>
                                        </div>


                                        <div class="box box-success ">
                                        <div class="box-header">
                                            <h3 class="box-title">Counsult Doctor</h3>
                                            <div class="pull-right box-tools ">
                                               <button class="btn btn-default add-doc" onclick="return false;">
                                                    <i class="fa fa-plus-square"></i>
                                               </button>
                                            </div>
                                            <div class="investigation-suggest" id="doctorSuggest">
                                                
                                            </div>
                                        </div>
                                        <div class="box-body display-doc investigation-display">
                                                
                                        </div>
                                        </div>

                                        <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title test">Add Investigation</h3>
                                            <div class="pull-right box-tools">
                                               <button class="btn btn-default" id="myinv" onclick="return false;">
                                                    <i class="fa fa-plus-square"></i>
                                               </button>
                                            </div>
                                            <div class="investigation-suggest" id="investigationSuggest">
                                                
                                            </div>
                                        </div>
                                        <div class="box-body investigation-display" id="investigation-display">
                                                

                                        </div>
                                        </div>

                               
                                    <div class="box-footer clearfix">
                                    <button class="btn btn-success btn-lg" type="button" id="SubmitCreateVisitor">Register <i class="fa fa-check"></i></button>
                                    <button type="reset" class="btn btn-danger btn-lg pull-right">Clear <i class="fa fa-times"></i></button>
                                </div>    

                                        
                                    </form>
                                </div>
                                
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

