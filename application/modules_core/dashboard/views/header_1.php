<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SIAAPA/<? echo $this->router->class.'/'.$this->router->method; ?> | AA Pialang Asuransi</title>
<link rel="stylesheet" href="<?php echo base_url();?>templates/amanda/css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/custom/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/icare/js/custom/dashboard.js"></script>

 
    <link type="text/css" href="<?php echo base_url();?>assets/menu/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/menu/menu.js"></script>
    
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>templates/amanda/js/plugins/excanvas.min.js"></script>

    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>templates/amanda/css/style.ie9.css"/>

    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>templates/amanda/css/style.ie8.css"/>

	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

</head>

<!--<body class="withvernav">-->
<body>
  
<style type="text/css">
* { margin:0;
    padding:0;
}
/*html { background:#444; }*/
body {
    /*margin:50px auto;*/
/*    width:630px;
    height:466px;*/
/*    background:#222;
    overflow:hidden;*/
}
div#menu {
	top:25px;	  
}
div#copyright { display: none; }
</style>
<!--<div class="bodywrapper">bodywrapper-->
<div>    
    <div class="topheader">
            <?php //echo $this->aap_menu->build_menu($this->dx_auth->groupid_saya());  ?>
        <?php echo $this->dx_auth->menu_saya(); ?>
         
        
    </div>    
    <div class="topheader">
        
        <div class="left">
            <h1 class="logo">SI<span>AAPA</span> </h1>
            
            <span class="slogan"><? echo $this->uri->ruri_string(); ?></span>
            
<script>
      var seconds = 600;
      setInterval(
        function(){
          if (seconds <= 1) {
            window.location = 'http://aapialang.co.id/icare/logout';
          }
          else {
            document.getElementById('seconds').innerHTML = --seconds;
          }
        },
        1000
      );   
</script>
            
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<div class="notification">
                <a class="count" href="<?php echo base_url();?>activity/tampil"><span>9</span></a>
                <!--<a class="count" href="<?php // echo base_url();?>templates/amanda/ajax/notifications.html"><span>9</span></a>-->
        	</div>
            <div class="notification">
                <a class="count" href="#">Time Limit <span id="seconds">600</span></a>
            </div>
            <div class="userinfo">
            	<img src="<?php echo base_url();?>uploads/foto/<?php echo $this->dx_auth->get_employee_foto(); ?>" alt="" class="foto_kecil"/>
                <span><?php echo $this->dx_auth->nama_saya(); ?></span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href="#"><img src="<?php echo base_url();?>uploads/foto/<?php echo $this->dx_auth->get_employee_foto(); ?>" alt="" class="foto_sedang"/></a>
<!--                    <div class="changetheme">
                    	Change theme: <br />
                        <a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>-->
                </div><!--avatar-->
                <div class="userdata">
                	<h4><?php echo $this->dx_auth->nama_saya(); ?></h4>
                    <span class="email"><?php echo $this->dx_auth->email_saya(); ?></span>
                    <ul>
                        <li><a href="<?php echo base_url();?>config/employee/edit/<?php echo $this->dx_auth->get_employee_id(); ?>">Edit Profile</a></li>
                        <li><a href="<?php echo base_url();?>config/user/edit/<?php echo $this->dx_auth->get_user_id(); ?>">My Account</a></li>
                        <li><a href="<?php echo base_url();?>auth/change_password">Change Password</a></li>
                        <li><a href="<?php echo base_url();?>logout">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    <?php //echo $this->aap_menu->build_sidebar($this->dx_auth->groupid_saya());  ?>
<? //echo $this->uri->segment(3).$this->uri->segment(3).$this->uri->segment(3); ?>

      
    
    
                    <!--<div>-->
                    <ul id="flexmenu1" class="flexdropdownmenu">
			<li><a href="http://aapialang.co.id/icare/dashboard" class="parent"><span>DashBoard</span></a>
                            <!--<div>-->
                                <ul>
                                    <li><a href="http://aapialang.co.id/icare/#"><span>Activity Reports</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Daily Projects</span></a>
                                        <!--<div>-->
                                            <ul>
                                                <li><a href="http://aapialang.co.id/icare/#"><span>PT Sang Hyang Seri (SHS)</span></a></li>
						<li><a href="http://aapialang.co.id/icare/#"><span>PT Bahana Artha Ventura (BAV)</span></a></li>
                                            </ul>
                                        <!--</div>-->
                                    </li>
                                </ul>
                            <!--</div>-->
                        </li>
                        <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Options</span></a>
                            <!--<div>-->
                                <ul>
                                    <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Master</span></a>
                                        <!--<div>-->
                                            <ul>
                                                <li><a href="http://aapialang.co.id/icare/master/quotations"><span>Quotations ID</span></a></li>
						<li><a href="http://aapialang.co.id/icare/master/aj_asuransi"><span>Asuransi ID - AJ</span></a></li>
						<li><a href="http://aapialang.co.id/icare/master/client"><span>Client ID - AJ</span></a></li>
						<li><a href="http://aapialang.co.id/icare/master/clauses"><span>Clauses ID</span></a></li>
						<li><a href="http://aapialang.co.id/icare/master/company"><span>Company ID</span></a></li>
                                            </ul>
                                        <!--</div>-->
                                    </li>
                                    <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Tools</span></a>
                                        <!--<div>-->
                                            <ul>
						<li><a href="http://aapialang.co.id/icare/menu"><span>Menus</span></a></li>
						<li><a href="http://aapialang.co.id/icare/config/libraries"><span>Config</span></a></li>
                                            </ul>
                                        <!--</div>-->
                                    </li>
                                    <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Administrator</span></a>
                                        <!--<div>-->
                                            <ul>
						<li><a href="http://aapialang.co.id/icare/config/employee"><span>Employee Profile</span></a></li>
						<li><a href="http://aapialang.co.id/icare/config/user"><span>User Control</span></a></li>
						<li><a href="http://aapialang.co.id/icare/config/groups"><span>Groups Name</span></a></li>
                                            </ul>
                                        <!--</div>-->
                                    </li>
                                </ul>
                            <!--</div>-->
                        </li>
                        <li><a href="http://aapialang.co.id/icare/dashboard" class="parent"><span>Quotations</span></a>
                            <!--<div>-->
                                <ul>
                                    <li><a href="http://aapialang.co.id/icare/quotations/bri"><span>Builder's Risks Insurance</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/pb"><span>Public Liability</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/plc"><span>Product Liability & Completed Operations</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/el"><span>Employers Liability</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/wrk"><span>Workmen Compensation</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/auto"><span>Automobile Liability</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/dol"><span>Directors & Officers Liability Insurance</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/mci"><span>Marine Cargo Insurance</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/qtr"><span>Contractor's ( Erection All Risks Insurance )</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations"><span>General Quotation</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/quotations/bank"><span>Bank Garansi</span></a></li>
                                </ul>
                            <!--</div>-->
                        </li>
                        <li><a href="http://aapialang.co.id/icare/human/human" class="parent"><span>Human Resource</span></a>
                            <!--<div>-->
                                <ul>
                                    <li><a href="http://aapialang.co.id/icare/inventory"><span>Inventory IT</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/human/absensi"><span>Absen</span></a></li>
                                    <li><a href="http://aapialang.co.id/icare/inventory/company"><span>All Inventory </span></a></li>
                                </ul>
                            <!--</div>-->
                        </li>
                        <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Transaksi</span></a>
                            <!--<div>-->
                                <ul>
                                    <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Asuransi Jiwa</span></a>
                                        <!--<div>-->
                                            <ul>
                                                <li><a href="http://aapialang.co.id/icare/asuransi_jiwa/kas"><span>Koperasi Aliansi Sejahtera</span></a></li>
                                            </ul>
                                        <!--</div>-->
                                        <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Bahana Artha Ventura</span></a>
                                            <!--<div>-->
                                                <ul>
                                                    <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Bahana Artha Ventura - Gerai</span></a>
                                                        <!--<div>-->
                                                            <ul>
                                                                <li><a href="http://aapialang.co.id/icare/bav/gerai_tabel"><span>Bahana Artha Ventura - Gerai - Report</span></a></li>
                                                            </ul>
                                                        <!--</div>-->
                                                    </li>
                                                    <li><a href="http://aapialang.co.id/icare/#" class="parent"><span>Bahana Artha Ventura - SuperVisor</span></a></li>
                                                </ul>
                                            <!--</div>-->
                                        </li>
                                </ul>
                            <!--</div>-->
                        </li>
                        <li><a href="http://aapialang.co.id/icare/logout" class="parent"><span>Log-Out</span></a></li>
                    </ul>
                <!--</div>-->