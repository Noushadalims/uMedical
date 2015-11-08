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
                        Change your password
                    </h1>
                </section><br/><br/><br/>
                <div class="change-password">
                    <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Add Nessary Information</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="FromChangePassword" action="login/changePassword/" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input autocomplete="off" type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Old Password">
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                              <input autocomplete="off" type="password" class="form-control" id="repeatNewPassword" name="repeatNewPassword" placeholder="Repeat Password">
                                        </div>
                                        <div class="form-group" style="display:block; text-align:center;" align="center" id="errorMessage" >
                                              
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer" align="center">
                                        <button type="button" id="ChangeUserPassword" class="btn btn-primary">Change Password</button>
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

        <script type="text/javascript">

        $(document).ready(function($){


            var validatePassword = function(flag){
                var oldpass = $("#oldPassword").val(), newPass = $("#newPassword").val(), repPass = $("#repeatNewPassword").val();
                if(oldpass=="" || oldpass==" "){
                    $("#errorMessage").html("<span class='label label-danger'>Please enter old password</span>");
                    return flage = false;
                }else{
                    if(newPass=="" || newPass==" "){
                        $("#errorMessage").html("<span class='label label-danger'>Please enter new password</span>");
                        return flage = false;
                    }else{                       
                        if(repPass=="" || repPass==" "){
                           $("#errorMessage").html("<span class='label label-danger'>Please enter Repeat password</span>");
                           return flage = false;
                        }else{
                             if(newPass!=repPass){
                                $("#errorMessage").html("<span class='label label-danger'>Password do not Match</span>");
                                return flage = false;
                            }else{
                                $("#errorMessage").html(" ");
                                return flage = true;
                            }
                        }
                    }
                }
            }

            
            var successCallbackChangePassword = function(){
                alert("changes successfully");
            }

            var errorCallbacka = function(){

            }


            $("#ChangeUserPassword").click(function(){
                
                if(validatePassword(true)){
                    var FormName = $("#FromChangePassword");
                    postForm(FormName,successCallbackChangePassword,errorCallbacka);
                }
                


                //$("#errorMessage").html("<span class='label label-danger'>Password do not match</span>");
            });
        });

        </script>

    </body>
</html>
