                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="sidebar-search-wrapper">
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                            </li>
                            <li class="nav-item">
                              <!--  <a href="dashboard.php" class="nav-link nav-toggle"> -->
								<a href="javascript:;" onClick="$('#requestedpage').attr({value:'dashboard'}); $('#page-form').submit();"><i class="fa fa-home">
								</i> فـــواتيـــرالـبيــــع </a>
                                  <!--  <i class="icon-home"></i>  -->
                                  <!--  <span class="title">Dashboard</span>  -->
									
                                </a>
                            </li>

							<li class="nav-item">
                               <!-- <a href="Repairs.php" class="nav-link"> -->
								<a href="javascript:;" onClick="$('#requestedpage').attr({value:'purchases'}); $('#page-form').submit();">
								<i class="icon-briefcase"></i> فـــواتيــــرالــشــراء</a>
                                  <!--  <i class="icon-briefcase"></i> -->
                                   <!-- <span class="title">Data Base</span> -->
                                </a>
                            </li>
							
							
                            <li class="nav-item">
                               <!-- <a href="Repairs.php" class="nav-link"> -->
								<a href="javascript:;" onClick="$('#requestedpage').attr({value:'repairs'}); $('#page-form').submit();"><i class="icon-briefcase">
								</i><b> الأصــنــــــاف </b></a>
                                  <!--  <i class="icon-briefcase"></i> -->
                                   <!-- <span class="title">Data Base</span> -->
                                </a>
                            </li>

							<li class="nav-item">
                               <!-- <a href="Repairs.php" class="nav-link"> -->
								<a href="javascript:;" onClick="$('#requestedpage').attr({value:'inventory'}); $('#page-form').submit();">
								<i class="icon-briefcase"></i>الخزنــــه</a>
                                  <!--  <i class="icon-briefcase"></i> -->
                                   <!-- <span class="title">Data Base</span> -->
                                </a>
                            </li>
							
                            <li class="nav-item active">
                                <a href="?p=" class="nav-link nav-toggle">
                                    <i class="icon-wallet"></i>
                                    <span class="title">الموردين والعملاء</span>
                                    <span class="arrow"></span>
									<span class="selected"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
											<a href="javascript:;" onClick="$('#requestedpage').attr({value:'vendor_client_list'}); $('#page-form').submit();">
                                            <span class="title">قائمه الموردين والعملاء</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
											<a href="javascript:;" onClick="$('#requestedpage').attr({value:'vendor_client_balance'}); $('#page-form').submit();">
                                            <span class="title">أرصده موردين وعملاء</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
											<a href="javascript:;" onClick="$('#requestedpage').attr({value:'vendor_client_payment'}); $('#page-form').submit();">
                                            <span class="title">تسديد موردين وعملاء</span>
											<span class="selected"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Contact US</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->