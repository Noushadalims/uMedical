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
                        Alter new Visitor
                    </h1>
                </section>
                <div class="create-visitor">

                    <div class="box box-info">

                                <div class="box-header">
                                    <i class="fa fa-edit"></i>
                                    <h3 class="box-title">Alter Registration</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" >New Registration</button>
                                    </div><!-- /. tools -->
                                </div>
                                <div class="box-body registration">
                                <script id="alterVisitor" type="text/x-jquery-tmpl">
                                    <form action="alter/patent_personal_details/" id="alterVisitorPersonalDetails" method="POST">
                                        <input type="hidden" name="patentId" value="${visitorSummary.patentId}">
                                    
                                        <div class="form-group">
                                            Visitor ID <input autocomplete="off" type="text"  class="form-control locked-item" id="visitorId" name="visitorId" disabled="" value="${visitorId} ">
                                            Patent ID <input autocomplete="off" type="text" class="form-control locked-item" id="patentId" name="patentId" disabled="" value="${visitorSummary.patentId}">
                                            
                                        </div>
                                        <div class="form-group">
                                            <select id="patentTitle" name="patentTitle" class="patent-title">
                                                <option value="Mr">Mr</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>

                                            <input autocomplete="off" type="text" id="patentFirstName" class="form-control patent-name" name="patentFirstName" value="${patentSummary.patentFirstName}" placeholder="Patent First Name">
                                            <input autocomplete="off" type="text" id="patentLastName" class="form-control patent-name" name="patentLastName" value="${patentSummary.patentLastName}" placeholder="Patent Last Name">

                                        </div>
                                        <div class="form-group">
                                        {{if patentSummary.patentGender == 'Male' }}
                                             <input autocomplete="off" type="text" class="form-control age-css" id="patentAge" maxlength="3" size="3" value="${patentSummary.patentAge}" name="patentAge" placeholder="Age">
                                            &nbsp;&nbsp;&nbsp;&nbsp;<strong>Gender</strong>
                                            <input type="radio" id="patentGender" name="patentGender" value="M" checked style=" "> Male  <input type="radio" id="patentGender" name="patentGender" value="F" style=" "> Female
                                        {{/if}}

                                        {{if patentSummary.patentGender == 'Female' }}
                                             <input autocomplete="off" type="text" class="form-control age-css" id="patentAge" maxlength="3" size="3" value="${patentSummary.patentAge}" name="patentAge" placeholder="Age">
                                            &nbsp;&nbsp;&nbsp;&nbsp;<strong>Gender</strong>
                                            <input type="radio" id="patentGender" name="patentGender" value="M" style=" "> Male  <input type="radio" id="patentGender" name="patentGender" value="F" checked style=" "> Female
                                        {{/if}}

                                        {{if patentSummary.patentMaritalStatus=='S'}}     
                                             &nbsp;&nbsp;|&nbsp;&nbsp;<strong>Martial Status</strong>
                                            <input type="radio" name="patentMartialStatus" id="patentMartialStatus" checked value="S" style=" "> Single <input type="radio" name="patentMartialStatus" id="patentMartialStatus" value="M" style=" "> Married
                                         {{/if}}   
                                        
                                        {{if patentSummary.patentMaritalStatus=='M'}}     
                                             &nbsp;&nbsp;|&nbsp;&nbsp;<strong>Martial Status</strong>
                                            <input type="radio" name="patentMartialStatus" id="patentMartialStatus" value="S" style=" "> Single <input type="radio" checked name="patentMartialStatus" id="patentMartialStatus" value="M" style=" "> Married
                                        {{/if}}    
                                       
  
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="text" class="form-control" name="patentAddress" id="patentAddress" value="${patentSummary.patentAddress}" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                             <select id="patentCity" name="patentCity" class="patent-title">
                                                <option value="Bangalore">Bangalore</option>
                                                <option value="Jayanagar">Jayanagar</option>
                                                <option value="JP Nagar">JP Nagar</option>
                                            </select>
                                            <select id="patentState" name="patentState" class="patent-title">
                                                <option value="KA">Karnataka</option>
                                                <option value="AP">Andra Pradesh</option>
                                                <option value="TN">Tamil Nadu</option>
                                            </select>

                                            <input autocomplete="off" id="patentPinCode" type="text" class="form-control pincode-css" value="${patentSummary.patentPin}" name="patentPinCode" maxlength="6" size="6" placeholder="Pin Code">

                                             <select id="patentCountry" name="patentCountry" class="patent-title">
                                                <option selected="">India</option>
                                                <option>Cannada</option>
                                                <option>United States</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input id="patentPhoneNo" autocomplete="off" type="text" class="form-control phone-css" value="${patentSummary.patentPhone}" name="patentPhoneNo" placeholder="Phone">
                                            <input id="patentMobileNo" autocomplete="off" type="text" class="form-control mobile-css" value="${patentSummary.patentMobile}" name="patentMobileNo" placeholder="Mobile">
                                        </div>
                                        <div style="text-align:center;">
                                         <button class="btn btn-success btn-sm" type="button" id="UpdateUserDetails">Update User Details <i class="fa fa-check"></i></button>
                                         </div>
                                         </form>
                                        <br>
                                        <br>
                                       <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Referral Doctor </h3>
                                            
                                        </div>
                                        <form action="alter/addReferalDoctor/" id="alterReferalFrom" method="POST">
                                        <div class="box-body investigation-display">
                                                <div class="form-group">
                                                    <input type="hidden" name="visitorId" value="${visitorId}">
                                                    <input autocomplete="off" value="${discountSummary.discountDiscription}" id="ReferenceName" type="text" class="form-control investigation-css" name="ReferenceName" placeholder="Referral Description">
                                                    <input autocomplete="off" value="${discountSummary.discountAmount}" id="ReferenceDiscount" type="text" class="form-control investigation-amount-css" name="ReferenceDiscount" placeholder="Discount">
                                                    <button class="btn btn-default" onclick="return false;">Clear</button>
                                                </div>

                                        </div>
                                                <div style="text-align:center;">
                                                 <button class="btn btn-success btn-sm" type="button" id="upReferalDoc">Update Referal Doctor <i class="fa fa-check"></i></button>
                                                </div>
                                                <br>
                                        </div>
                                        </form>

                                        <form action="alter/addAlterDoctor/" id="alterDocFrom" method="POST">
                                        <input type="hidden" name="visitorId" value="${visitorId}">
                                        <input type="hidden" name="patentId" value="${visitorSummary.patentId}">
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
                                                
                                        <div class="form-group"><input autocomplete="off" type="text" class="form-control investigation-css" id="CounsultDoctorRef" name="CounsultDoctorRef" value="${visitorSummary.doctorName}" placeholder="Type Counsult Doctor Name">                <input autocomplete="off" type="text" class="form-control investigation-amount-css" id="CounsultDoctorRefAmount" disabled="" value="${visitorSummary.consultingCharge}" name="subject" placeholder="Amount"> <button class="btn btn-default fa fa-minus-square remove-doc" onclick="return false;"></button></div></div>
                                        <div style="text-align:center;">
                                                 <button class="btn btn-success btn-sm" type="button" id="upDoctorRecord">Update Counsult Doctor <i class="fa fa-check"></i></button>
                                                </div><br>
                                        </div>
                                        </form>
                                        <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title test">Add Investigation</h3>
                                            <div class="pull-right box-tools">
                                               <button class="btn btn-default" id="add-new-inv" onclick="return false;">
                                                    <i class="fa fa-plus-square"></i>
                                               </button>
                                            </div>
                                            <div class="investigation-suggest" id="investigationSuggest">
                                                
                                            </div>
                                        </div>
                                        <form action="alter/addAlterInvestigation/" id="alterInvFrom" method="POST">
                                        <div class="box-body investigation-display" id="investigation-display">
                                        <input type="hidden" name="visitorId" value="${visitorId}">
                                        <input type="hidden" name="patentId" value="${visitorSummary.patentId}">

                                                {{each investigationSummary}}
                                                <div class="form-group">
                                                <input autocomplete="off" value="${invInfoName} " type="text" class="form-control investigation-css" id="investigationFieldSuggest" name="investigation[]" placeholder="Investigation">
                                                <input autocomplete="off" value="${invInfoAnount}" type="text" class="form-control investigation-amount-css" name="investigation-amount[]" disabled="" placeholder="Amount">
                                                <button class="btn btn-default fa fa-minus-square alter-inv" id="alter-inv" onclick="return false;"></button>
                                                <input type="hidden" name="investigation_id[]" id="invValue" value="${invId}">
                                                </div>
                                                 {{/each}}

                                                 
                                        </div>
                                        <div style="text-align:center;">
                                        <button class="btn btn-success btn-sm" type="button" id="upDateInv">Update <i class="fa fa-check"></i></button>
                                        </div>
                                        </form>
                                        <br>
                                        </div>

                               
                                    
                                    
                                        

                                        
                                    
                                    </script>
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
        <script src="<?php echo SITE_PATH; ?>js/jquery.tmpl.min.js"></script>

  <script type="text/javascript">
var applicationUrl = "<?php echo SITE_PATH.'index.php/'; ?>";
var searchId = "<?php echo $searchId; ?>";
        
     $(document).ready(function(){
        $.ajax({
            url: applicationUrl+"json/visitorRecord/"+searchId,
            type: "POST",
            dataType:'json',
            success: function(data, textStatus, jqXHR) {
            $('#alterVisitor').tmpl(data).appendTo('.registration');
            }
        });


        var errorHandler = function(){
            alert("Some thing gone Wrong");
        }

        $(document).on("click","#upDateInv",function(){
            var FormName = $("#alterInvFrom");
            postForm(FormName, successCallback, errorHandler);
        });

        $(document).on("click","#UpdateUserDetails",function(){
            var FormName = $("#alterVisitorPersonalDetails");
            postForm(FormName, successCallback, errorHandler);
        });

        $(document).on("click","#upDoctorRecord",function(){
            var FormName = $("#alterDocFrom");
            postForm(FormName, successCallback, errorHandler);
        });

        $(document).on("click","#upReferalDoc",function(){
            var FormName = $("#alterReferalFrom");
            postForm(FormName, successCallback, errorHandler);
        });

        

         $(document).on("click","#add-new-inv",function(){
            $("#investigation-display").append("<div class='form-group'><input autocomplete='off' type='text' class='form-control investigation-css' id='investigationFieldSuggest' name='alteredInvestigation[]' placeholder='Investigation'/>                <input autocomplete='off' type='text' class='form-control investigation-amount-css' name='investigation-amount[]' disabled placeholder='Amount'/> <button class='btn btn-default fa fa-minus-square remove-inv' onclick='return false;'></button></div>");
        });

        $(document).on("click",".alter-inv",function(event){
            var visitorId = $.trim($("#visitorId").val());
            var patentId = $.trim($("#patentId").val());
            selectedElement = $(this);
            var invId = $(selectedElement).parent().find("#invValue").val();
            var invId = $.trim(invId);

            $.ajax({
                url:applicationUrl+"remove/removeVisitorInvestigation/"+visitorId+"/"+patentId+"/"+invId,
                type:"POST",
                dataType:'text',
                success:function(data, textStatus, jqXHR){
                    if(data=="Success"){
                        $(selectedElement).parent().remove();
                    }
                },
                error:function(){
                    alert("Some thing is gone wrong Error : RM101");
                }
            });

        });




        $("#print-bill").click(function(){
            window.print();
        });


       
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>
    </body>
</html>

