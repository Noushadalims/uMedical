<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="seach" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->

                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo SITE_PATH; ?>index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Visitor Records</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo SITE_PATH; ?>index.php/create/visitor"><i class="fa fa-angle-double-right"></i> Add Visitor</a></li>
                                <li><a href="<?php echo SITE_PATH; ?>index.php/search/visitor"><i class="fa fa-angle-double-right"></i> Search Visitor</a></li>
                               
                                <!--<li><a href="#"><i class="fa fa-angle-double-right"></i> Modify Visitor Data</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Generate Bill</a></li>-->
                            </ul>
                        </li>
                        <!--<li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>-->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo SITE_PATH; ?>index.php/reports/todaysVisitorReport"><i class="fa fa-angle-double-right"></i> Today's Report</a></li>
                                <?php if($sessionData['access_rights']==10){ ?>
                                <!--<li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Monthly Report</a></li>-->
                                <li><a href="<?php echo SITE_PATH; ?>index.php/reports/customReport"><i class="fa fa-angle-double-right"></i> Custom Report</a></li>
                                <!--<li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Investigation Report</a></li>-->
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>View</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <!--<li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i> Lab Technicians List</a></li>-->
                                 <li><a href="<?php echo SITE_PATH; ?>index.php/display/recentvisitor"><i class="fa fa-angle-double-right"></i> Recent Visitor</a></li>
                                <!--<li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> Doctors List</a></li>-->
                                <li><a href="<?php echo SITE_PATH; ?>index.php/reports/investigation"><i class="fa fa-angle-double-right"></i> Investigation List</a></li>
                            </ul>
                        </li>
                        <?php if($sessionData['access_rights']==10){ ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Invoice Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Logo Settings</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Address</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Message</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Print Setup</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                         <?php if($sessionData['access_rights']==10){ ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i> <span>Adminstration</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo SITE_PATH; ?>index.php/create/user"><i class="fa fa-angle-double-right"></i> Add User</a></li>
                                <li><a href="<?php echo SITE_PATH; ?>index.php/create/doctor"><i class="fa fa-angle-double-right"></i> Add Doctors</a></li>
                                <li><a href="<?php echo SITE_PATH; ?>index.php/create/investigation"><i class="fa fa-angle-double-right"></i> Add Investigation</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> BackUp Settings</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Application Status</a></li>
                            </ul>
                        </li>
                         <?php } ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i> <span>Help</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>