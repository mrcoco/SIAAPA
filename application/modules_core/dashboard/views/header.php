<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
    <title>Sistem Informasi PT AA Pialang Asuransi</title>
    <meta name="author" content="Reko Srowako" />
    <meta name="description" content="Sistem Informasi PT AA Pialang Asuransi" />
    <meta name="keywords" content="siaapa,sistem,informasi,asuransi,pialang" />
    <meta name="application-name" content="Sistem Informasi PT AA Pialang Asuransi" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- styles -->
    <link href="<?php echo base_url();?>style/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>style/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>style/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />

    <!-- touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>style/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>style/images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>style/images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>style/images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>style/images/apple-touch-icon-57-precomposed.png" />
    <!-- Menu  -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/menu/menu.js"></script>
    <!--<script type="text/javascript" src="<?php // echo base_url();?>assets/menu/jquery.js"></script>-->
    <link type="text/css" href="<?php echo base_url();?>assets/menu/menu.css" rel="stylesheet" />
    
    
        <!-- Main stylesheets -->
    <link href="<?php echo base_url();?>style/css/main.css" rel="stylesheet" type="text/css" /> 
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <!-- loading animation -->
<!--    <script type="text/javascript">
        //adding load class to body and hide page
        document.documentElement.className += 'loadstate';
    </script>-->
<script>
      var seconds = 600;
      setInterval(
        function(){
          if (seconds <= 1) {
            window.location = '<?php echo base_url();?>logout';
          }
          else {
            document.getElementById('seconds').innerHTML = --seconds;
          }
        },
        1000
      );   
</script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/flexdropdown.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>style/flexdropdown.js"></script>     











    </head>    
    <body>
        
        
        
            <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url();?>style/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/js/jquery.mousewheel.js"></script>
    <!-- THIS IS DOWNLOADED FROM WWW.SXRIPTGATES.COM - SO THIS IS YOUR NEW SITE FOR DOWNLOAD SCRIPT ;) -->
    <!-- Load plugins -->
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/qtip/jquery.qtip.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/flot/jquery.flot.grow.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/flot/jquery.flot.tooltip_0.4.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/flot/jquery.flot.orderBars.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/knob/jquery.knob.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/prettify/prettify.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/watermark/jquery.watermark.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/elastic/jquery.elastic.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/inputlimiter/jquery.inputlimiter.1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/maskedinput/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/stepper/ui.stepper.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/color-picker/colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/timeentry/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/select/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/dualselect/jquery.dualListBox-1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/tiny_mce/jquery.tinymce.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/validate/jquery.validate.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/animated-progress-bar/jquery.progressbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/pnotify/jquery.pnotify.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/lazy-load/jquery.lazyload.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/jpages/jPages.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/pretty-photo/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/smartWizzard/jquery.smartWizard-2.0.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/ios-fix/ios-orientationchange-fix.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/elfinder/elfinder.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/plupload/plupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/plupload/plupload.html4.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>

    <!-- Init plugins -->
    <script type="text/javascript" src="<?php echo base_url();?>style/js/statistic.js"></script><!-- Control graphs ( chart, pies and etc) -->

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/js/main.js"></script>
        
        
        
        
        
<?php echo $this->dx_auth->menu_saya(); ?>      
        
        
        
        
        
        
        
        
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    
    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                  
                <a class="brand" href="<?php echo base_url();?>dashboard"><img src="<?php echo base_url();?>images/logo.png" alt="" height="50" /><span class="slogan"></span></a>
                <div class="nav-no-collapse">
                    <ul class="nav">
                        <li class="active"><a href="#" data-flexmenu="flexmenu1"><span class="icon16 icomoon-icon-screen"></span> Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-cog"></span> Settings
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>                                                    
                                            <a href="#"><span class="icon16 iconic-icon-new-window"></span>Site config</a>
                                        </li>
                                        <li>                                                    
                                            <a href="#"><span class="icon16 icomoon-icon-wrench"></span>Plugins</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-picture-2"></span>Themes</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-mail"></span>Messages <span class="notification">8</span>
                            </a>
<?
            $sql = "SELECT *
                    FROM `aap_message`
                    where aap_message.status = 1
                    and aap_message.from_user_id = ".$this->dx_auth->get_user_id()."
                    ORDER BY `aap_message`.`id` DESC
                    LIMIT 0 , 5";
            $query = $this->db->query($sql);
            $messages          = $query->result();  
?>            
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="messages">    
                                        <li class="header"><strong>Messages</strong> (10) emails and (2) PM</li>
                                        <? if(count($messages) > 0){
                                            foreach($messages as $r){
                                                $kalimat    = $r->note_content;
                                                $from_user  = $r->from_user_id;
                                                $id         = $r->id;
//                                                $time_add   = $r->time_add;
                                                echo $kalimat.$from_user.$id;
                                        ?>
                                        <li>
                                           <span class="icon avatar"><img src="<?php echo base_url();?>uploads/foto/<?php echo $this->dx_auth->get_employee_foto(); ?>" width="20" height="20" /></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong><?$this->aap_lib->get_employee_name($r->$from_user)?></strong></a><span class="time">35 min ago</span></span>
                                            <span class="msg"><? $this->aap_lib->potong_text($kalimat,5) ?></span>
                                        </li>
<!--                                        <li>
                                           <span class="icon avatar"><img src="<?php // echo base_url();?>style/images/avatar.jpg" alt="" /></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>George Michael</strong></a><span class="time">1 hour ago</span></span>
                                            <span class="msg">I need to meet you urgent please call me ...</span>
                                        </li>
                                        <li>
                                            <span class="icon"><span class="icon16 icomoon-icon-mail"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Ivanovich</strong></a><span class="time">1 day ago</span></span>
                                            <span class="msg">I send you my suggestion, please look and ...</span>
                                        </li>-->
                                        <?php 
                                            } 
                                                }
                                        ?>
                                        <li class="view-all"><a href="messages/index/add"><strong>View all messages </strong><span class="icon16  icomoon-icon-arrow-right-7"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                  <!-- THIS IS DOWNLOADED FROM WWW.SXRIPTGATES.COM - SO THIS IS YOUR NEW SITE FOR DOWNLOAD SCRIPT ;) -->
                    <ul class="nav pull-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-bell"></span><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-user-2"></span></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-comments-4"></span></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-new"></span></span>
                                                <span class="event">admin Julia added post</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <span class="icon16  icomoon-icon-arrow-right-7"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-cog"></span>
                                <img src="<?php echo base_url();?>uploads/foto/<?php echo $this->dx_auth->get_employee_foto(); ?>" height="20" alt="" class="image"/> 
                                <span class="txt"><?php echo $this->dx_auth->nama_saya(); ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>
                                            <img style="display: block; margin-left: auto; margin-right: auto;" src="<?php echo base_url();?>uploads/foto/<?php echo $this->dx_auth->get_employee_foto(); ?>" width="100" alt="" />
                                        </li>
                                        <li><a href="<?php echo base_url();?>config/employee/edit/<?php echo $this->dx_auth->get_employee_id(); ?>"><span class="icon16 brocco-icon-user"></span>Edit Profile</a></li>
                                        <li><a href="<?php echo base_url();?>config/user/edit/<?php echo $this->dx_auth->get_user_id(); ?>"><span class="icon16 cut-icon-vcard"></span>My Account</a></li>
                                        <li><a href="<?php echo base_url();?>auth/change_password"><span class="icon16 icomoon-icon-key-2"></span>Change Password</a></li>
                                        <li><a href="<?php echo base_url();?>logout"><span class="icon16 minia-icon-switch"></span>Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url();?>logout"><span class="icon16 icomoon-icon-exit"></span><span id="seconds" title="Times Automatic to Logout">600</span> to Logout </a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->

<div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        
        <!--Sidebar collapse button-->  
        <div class="collapseBtn">
             <a href="#" class="tipR"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>
                    <li><a href="#"  class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                    <li><a href="#"  class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                    <li><a href="#"  class="tip"><span class="icon24 iconic-icon-chart"></span></a></li>
                    <li><a href="#"  class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                </ul>
            </div><!-- End search -->            

            <div class="sidenav">

                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->
            </div><!-- End sidenav -->

            

            <div class="sidebar-widget">
                <h5 class="title">Disk Space Usage</h5>
                <div class="content">
                    <span class="icon16 icomoon-icon-cloud left"></span>
                    <div class="progress progress-mini progress-success left tip" title="16%">
                      <div class="bar" style="width: 16%;"></div>
                    </div>
                    <span class="percent">16%</span>
                    <div class="stat">304.44 / 8000 MB</div>
                </div>

            </div><!-- End .sidenav-widget -->

            <div class="sidebar-widget">
                <h5 class="title">Ad sense stats</h5>
                <div class="content">
                    
                    <div class="stats">
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Advert View</div>
                            </div>
                            <span class="icon16 icomoon-icon-eye left"></span>
                            <div class="number">21,501</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-up green"></span>
                                5%
                            </div>
                            <span id="stat1" class="spark"></span>
                        </div>
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Clicks</div>
                            </div>
                            <span class="icon16 entypo-icon-thumbs-up left"></span>
                            <div class="number">308</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-down red"></span>
                                8%
                            </div>
                            <span id="stat2" class="spark"></span>
                        </div>
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Page CTR</div>
                            </div>
                            <span class="icon16 icomoon-icon-heart left"></span>
                            <div class="number">4%</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-down red"></span>
                                1%
                            </div>
                            <span id="stat3" class="spark"></span>
                        </div>
                        <div class="item">
                            <div class="head clearfix">
                                <div class="txt">Earn money</div>
                            </div>
                            <span class="icon16 icomoon-icon-calculate left"></span>
                            <div class="number">$376</div>
                            <div class="change">
                                <span class="icon24 icomoon-icon-arrow-up green"></span>
                                26%
                            </div>
                            <span id="stat4" class="spark"></span>
                        </div>
                    </div>

                </div>

            </div><!-- End .sidenav-widget -->

            <div class="sidebar-widget">
                <h5 class="title">Right now</h5>
                <div class="content">
                    <div class="rightnow">
                        <ul class="unstyled">
                            <li><span class="number">34</span><span class="icon16 icomoon-icon-new"></span>Posts</li>
                            <li><span class="number">7</span><span class="icon16 icomoon-icon-paper"></span>Pages</li>
                            <li><span class="number">14</span><span class="icon16 brocco-icon-list"></span>Categories</li>
                            <li><span class="number">201</span><span class="icon16 icomoon-icon-tag"></span>Tags</li>
                        </ul>
                    </div>
                </div>

            </div><!-- End .sidenav-widget -->

        </div><!-- End #sidebar -->

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">

                    <h3>You are here: <? echo $this->uri->ruri_string(); ?> <img src="<?php echo base_url();?>style/images/loaders/3d/015.gif"></img></h3>                    

<!--                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 brocco-icon-search"></span></a>
                    </div>

                    <div class="search">

                        <form id="searchform" action="#" />
                            <input type="text" class="top-search" placeholder="Search here ..." />
                            <input type="submit" class="search-btn" value="" />
                        </form>
                
                    </div> End search -->
                    
                    <ul class="breadcrumb">
                        <!--<li>You are here:</li>-->
                        <li><? $timestamp = "1340892242"; $date = date("D, d M Y", $timestamp); echo "<strong>Date: </strong>".$date."<br/ >"; ?>
<!--                            <a href="#" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-screen"></span>
                            </a> -->
<!--                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right"></span>
                            </span>-->
                        </li>
                        <!--<li class="active">UI elements</li>-->
                    </ul>

                </div>
                

                <!-- Build page from here: -->
                <div class="row-fluid">

                    <div class="span12">

                        <div class="box gradient invoice">

                            <div class="title clearfix">

<!--                                <h4 class="left">
                                    <span>Your company logo</span>
                                </h4>
                                <div class="print">
                                    <a href="#" class="tip" title="Print invoice"><span class="icon24 entypo-icon-printer"></span></a>
                                </div>
                                 <div class="invoice-info">
                                    <span class="number">Invoice <strong class="red">#123456</strong></span>
                                    <span class="data gray">August 25, 2012</span>
                                    <div class="clearfix"></div>
                                </div>-->

                            </div>
                            <div class="content">
                                


                                

                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                               
