<html xmlns="http://www.w3.org/1999/xhtml">
<head>    
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Sistem Informasi PT AA Pialang Asuransi</title>
<!--    <link rel="stylesheet" type="text/css" href="<?php// echo base_url();?>style/header.css" />-->
    <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>style/ie.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>style/layout.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard/hideshow.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard/jquery.equalHeight.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard/jquery.tablesorter.min.js"></script>
    <link type="text/css" href="<?php echo base_url();?>assets/menu/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/menu/menu.js"></script>
    <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>assets/chat/css/chat.css" />
    <script type="text/javascript" src="<?=base_url()?>assets/chat/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/chat/js/chat.js"></script>
    
//<?php
//session_start();
//$saya = $this->dx_auth->get_username();
//$targetnya = 'admin';
//$_SESSION['username'] = $saya; // Must be already set
//?>

    
    <body>
        <article class="module width_full">
            <fieldset style="width:130px; float:left; margin: 0px;">
                 <img src="<?php echo base_url();?>images/logo.png">
            </fieldset>  
                <div class="module_content">
                <h2>OLEOS 1 Building, 6th floor Suite 622 Jl. Mampang Prapatan Raya No.139B Kalibata - Jakarta Selatan 12740</h2>
                <h3>Phone : +62 21 7997 044 (hunting)</h3>
                <h3>Fax : +62 21 7997 043</h3>
                </div>
  <div class="spacer"></div><div class="spacer"></div>
           	<footer>
                    <section id="secondary_bar">
                        <div class="breadcrumbs_container">
                            <article class="breadcrumbs">
                                <a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a>
                            </article>
                        </div>
                        <div class="user">
                        <p><?php echo $this->dx_auth->nama_saya(); ?> (<a href="#">3 Messages</a>)</p>
                        <!--<a class="logout_user" href="#" title="Logout">Logout</a>-->
                        <a class="logout_user" href="<?php echo base_url();?>logout" title="Logout">Logout</a>
                        </div>
                        
                    </section>

	</footer>
        </article>
        
        <table style='width:100%'>
            <?php echo $this->aap_menu->build_menu($this->dx_auth->groupid_saya());  ?>
         </table>
        <script type="text/javascript"> $(document).ready(function(){ $("body div:last").remove();}); </script> <div style="visibility:hidden"><a href="http://apycom.com/">Apycom jQuery Menus</a></div>
<div class="clr"></div>