			<div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
					
					<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PROFILE SIDEBAR -->
                                <div class="profile-sidebar">
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light profile-sidebar-portlet ">
                                        <!-- SIDEBAR USERPIC -->
                                        <div class="profile-userpic">
                                            <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                                        <!-- END SIDEBAR USERPIC -->
                                        <!-- SIDEBAR USER TITLE -->
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"> Marcus Doe </div>
                                            <div class="profile-usertitle-job"> Developer </div>
                                        </div>
                                        <!-- END SIDEBAR USER TITLE -->
                                        <!-- SIDEBAR BUTTONS -->
                                        <div class="profile-userbuttons">
                                            <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                            <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                        </div>
                                        <!-- END SIDEBAR BUTTONS -->
                                        <!-- SIDEBAR MENU -->
                                        <div class="profile-usermenu">
                                            <ul class="nav">
                                                <li>
                                                    <a href="#tab_1_10">
                                                        <i class="icon-home"></i> Overview </a>
                                                </li>
                                                <li class="active">
                                                    <a href="#tab_1_11">
                                                        <i class="icon-settings"></i> Account Settings </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- END MENU -->
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                </div>
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN PROFILE CONTENT -->
                                <div class="profile-content" id="_1_10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title tabbable-line">
                                                    <div class="caption caption-md">
                                                        <i class="icon-globe theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                                                            <form role="form" action="#">
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label>
                                                                    <input type="text" placeholder="<?php echo $_SESSION['user']; ?>" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">User ID</label>
                                                                    <input type="text" placeholder="<?php echo $_SESSION['userid']; ?>" class="form-control" /> </div>
																<div class="form-group">
                                                                    <label class="control-label">User Rank</label>
                                                                    <input type="text" placeholder="<?php echo $_SESSION['rank']; ?>" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Status</label>
                                                                    <input type="text" placeholder="<?php echo $_SESSION['confirmed']; ?>" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Mobile Number</label>
                                                                    <input type="text" placeholder="<?php echo $_SESSION['mobile']; ?>" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Address</label>
                                                                    <input type="text" placeholder="<?php echo $_SESSION['address']; ?>" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">E-mail</label>
                                                                    <input type="text" class="form-control" placeholder="<?php echo $_SESSION['email']; ?>"/>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END PERSONAL INFO TAB -->
                                                        <!-- CHANGE AVATAR TAB -->
                                                        <div class="tab-pane" id="tab_1_2">
                                                            <form action="#" role="form">
                                                                <div class="form-group">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                        <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="..."> </span>
                                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix margin-top-10">
                                                                        <span class="label label-danger">NOTE! </span>
                                                                        <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                                    </div>
                                                                </div>
                                                                <div class="margin-top-10">
                                                                    <a href="javascript:;" class="btn green"> Submit </a>
                                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END CHANGE AVATAR TAB -->
                                                        <!-- CHANGE PASSWORD TAB -->
                                                        <div class="tab-pane" id="tab_1_3">
                                                            <form action="#">
                                                                <div class="form-group">
                                                                    <label class="control-label">Current Password</label>
                                                                    <input type="password" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">New Password</label>
                                                                    <input type="password" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Re-type New Password</label>
                                                                    <input type="password" class="form-control" /> </div>
                                                                <div class="margin-top-10">
                                                                    <a href="javascript:;" class="btn green"> Change Password </a>
                                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END CHANGE PASSWORD TAB -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PROFILE CONTENT -->
                            </div>
                        </div>
                        <!-- BEGIN PAGE HEADER-->

                       <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Users Profile
                            <small>BLUE SYSTEMS</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row" id="tab_1_11">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                 
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
												
                                                    <div class="btn-group" style = <?php if( $_SESSION['rank']!=="1" ){echo "\"display : none;\"";} else {echo "";} ?> >
                                                        <button id="sample_editable_1_new" class="btn green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
								<?php		
                                    
                                    $query="SELECT * FROM users";
                                    
                                    if ($result = $conn->query($query))
                                    {
                                ?>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                            <tr>
                                                <th>رقم المستخدم</th>
                                                <th>E-mail</th>
                                                <th>الحاله</th>
                                                <th>الاسم</th>
												<th>الرتيه</th>
                                                <th>العنوان</th>
                                                <th>رقم الموبايل</th>
												<?php if( $_SESSION['rank']==='1' ){echo "<th>Edit</th>";} ?>
												<?php if( $_SESSION['rank']==='1' ){echo "<th>Delete</th>";} ?>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                <?php
                                        while ( $row = $result->fetch_array(MYSQLI_ASSOC))
                                        {
                                            //echo $row['ID']."-".$row['Owner']."<br>";
                                            ?>
                                            <tr>
                                                <td><?php echo $row['ID']; ?></td>
                                                <td><?php echo $row['Barcode']; ?></td>
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><?php echo $row['Quantity']; ?></td>
												<td><?php echo $row['new_price']; ?></td>
                                                <td><?php echo $row['Price']; ?></td>
                                                <td><?php echo $row['Description']; ?></td>
												<?php if( $_SESSION['rank']==="1" ){echo "<td><a class=\"edit\" href=\"javascript:;\"> Edit </a></td>";}?>
                                                <?php if( $_SESSION['rank']==="1" ){echo "<td><a class=\"delete\" href=\"javascript:;\"> Delete </a></td>";} ?>   
                                                <!-- <td><a class="delete" href="javascript:;"> Delete </a></td> -->
                                                </tr>
												<?php
                                        }
                                        ?>
                                            </tbody>
											<?php
                                    }
                                    else
                                    {
                                        $errorMsg = "DB Error: ".$conn->error;
                                    }
                                    
                                    if ($errorMsg)
                                    {
                                        echo $errorMsg;
                                    }
                                    
                                    $conn->close();
                                ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
								<div id="response">
								</div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
				
