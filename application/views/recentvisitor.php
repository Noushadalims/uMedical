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
                        Recent Visitor Registration
                    </h1>
                </section>
                

                <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th>Visitor ID</th>
                                            <th>Patent ID</th>
                                            <th>Patent Name</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
                                            <th>Discount</th>
                                            <th>Amount</th>
                                            <th>Registration Dated</th>
                                            <th>Modify</th>
                                             <?php if($sessionData['access_rights']==10){ ?>
                                            <th>Delete</th>
                                            <?php } ?>
                                        </tr>
                                        <?php

                                        $query = $this->db->get('visitor_record');

                                        foreach ($recentVisitorData as $row)
                                        {
                                           ?>
                                       <tr>
                                            <td><a href="<?php echo SITE_PATH; ?>index.php/display/bill/<?php echo $row['visitorId']; ?>" target="_new" ><?php echo $row['visitorId']; ?></a></td>
                                            <td><?php echo $row['patentId']; ?></td>
                                            <td><a href="<?php echo SITE_PATH; ?>index.php/display/bill/<?php echo $row['visitorId']; ?>" target="_new" ><?php echo $row['patentName']; ?></a></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['contactNo']; ?></td>
                                            <td align="right"><?php echo $row['discountAmount']; ?></td>
                                            <td align="right"><?php echo $row['invoiceAmount']; ?></td>
                                            <td><?php echo $row['registrationDate']; ?></td>
                                            <td><a href="<?php echo SITE_PATH; ?>index.php/alter/visitor/<?php echo $row['visitorId']; ?>">Edit</a></td>
                                             <?php if($sessionData['access_rights']==10){ ?>
                                            <td><a class="removeVisitor" href="javascript:void(0)" onclick="deletePatentRecord(<?php echo $row['visitorId']; ?>,this)">Delete</a></td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody></table>
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

                var deleteVisualRecord = function(el){
                        $(el).parents("tr").remove();
                };

                var deletePatentRecord = function(v,el){
                    var confirm1 = confirm("Are you sure you wanted to remove delete this record");
                    if(confirm1){
                        confirm2 = confirm("You cannot roll back the action. Are you sure to remove");
                        if(confirm2){
                            getAjax("../remove/visitor_record/"+v,{},deleteVisualRecord(el),{});
                        }
                    }
                };

        </script>

    </body>
</html>
