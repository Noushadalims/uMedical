<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="500" >
        <title><?php echo BUSINESS_NAME; ?> | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo SITE_PATH; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo SITE_PATH; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo SITE_PATH; ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo SITE_PATH; ?>css/custom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
         applicationUrl = "<?php echo SITE_PATH.'index.php/'; ?>";
         </script>


        <style type="text/css">
        #login-box .header{
            font-size: 20px;
        }
        </style>



    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div id="login-box-container">
            <div class="header"><b><?php echo BUSINESS_NAME; ?></b> | Sign In</div>
            <form action="login/validateUser/" id="userLoginForm" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username" autocomplete="off" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password"  placeholder="Password"/>
                    </div>          
                    <!-- <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div> -->
                </div>
                <div class="footer">                                                               
                    <button type="button" id="submitLoginButton" class="btn bg-olive btn-block">Sign me in</button>  
                </div>
            </form>
        </div>
        </div>

        <div class="margin text-center">
                <span>&copy uSoftware Inc.</span>
        </div>

        <div class="alert alert-danger alert-dismissable login-error">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> Entered <b>Username or Password</b> is Wrong 
        </div>

        <?php include('template/footer.php'); ?>
        <script type="text/javascript">

        

        $(document).ready(function(){


        var height = $(window).height();
        height=height/2;
        height=height-(($(".form-box").height())/2);
        $(".form-box").css({'margin-top':height});
        $("#username").focus();

       

        });



        </script>
    </body>
</html>