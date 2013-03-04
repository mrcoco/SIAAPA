
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
    <title>Sistem Informasi PT AA Pialang Asuransi</title>
    <meta name="author" content="Reko Srowako" />
    <meta name="description" content="Sistem Informasi PT AA Pialang Asuransi" />
    <meta name="keywords" content="siaapa,sistem,informasi,asuransi,pialang" />
    <meta name="application-name" content="Sistem Informasi PT AA Pialang Asuransi" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->
    <link href="<?php echo base_url();?>style/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>style/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>style/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="<?php echo base_url();?>style/css/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
        <link type="text/css" href="css/ie.css" rel="stylesheet" />
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>style/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>style/images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>style/images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>style/images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>style/images/apple-touch-icon-57-precomposed.png" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body class="loginPage">
<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 30,
	'value' =>  set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'value' => set_value('password')
);

$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'size'	=> 30,
	'value' => set_value('confirm_password')
);

$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'maxlength'	=> 80,
	'size'	=> 30,
	'value'	=> set_value('email')
);
?>
        <div class="container-fluid">
            <div align="center" class="page-header">
                <img src="<?php echo base_url();?>images/logo.png" align="center" width="405px" />
                <h5 align="center">OLEOS 1 Building, 6th floor Suite 622 Jl. Mampang Prapatan Raya No.139B Kalibata - Jakarta Selatan 12740. Phone.+62 21 7997 044 (hunting) & Fax.+62 21 7997 043</h5>         
            </div>                   
        </div>      
        
    <div class="container-fluid">
        <div class="loginContainer">
            <form class="form-horizontal" action="<?php echo base_url();?>auth/register" method="post" accept-charset="utf-8" id="loginForm">    
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="username">
                                Username:
                                <span class="icon16 icomoon-icon-user-2 right gray marginR10"></span>
                            </label>
                            <?php echo form_input($username)?><?php echo form_error($username['name']); ?>
                        </div>
                    </div>
                </div>

                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="password">
                                Password:
                                <span class="icon16 icomoon-icon-locked right gray marginR10"></span>
                                
                            </label>
                            <?php echo form_password($password)?><?php echo form_error($password['name']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="username">
                                <?php echo form_label('Confirm Password', $confirm_password['id']);?>
                                <span class="icon16 icomoon-icon-user-2 right gray marginR10"></span>
                            </label>
                            <?php echo form_password($confirm_password);?><?php echo form_error($confirm_password['name']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="username">
                                <?php echo form_label('Email Address', $email['id']);?>
                                <span class="icon16 icomoon-icon-user-2 right gray marginR10"></span>
                            </label>
                            <?php echo form_input($email);?><?php echo form_error($email['name']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-row row-fluid">                       
                    <div class="span12">
                        <div class="row-fluid">
                            
                            
                            <div class="form-actions">
                            <div class="span12 controls">
                                
                                
                                <?php if ($this->dx_auth->captcha_registration): ?>

	<dt></dt>
	<dd>
		<?php 
			// Show recaptcha imgage
			echo $this->dx_auth->get_recaptcha_image(); 
			// Show reload captcha link
			echo $this->dx_auth->get_recaptcha_reload_link(); 
			// Show switch to image captcha or audio link
			echo $this->dx_auth->get_recaptcha_switch_image_audio_link(); 
		?>
	</dd>

	<dt><?php echo $this->dx_auth->get_recaptcha_label(); ?></dt>
	<dd>
		<?php echo $this->dx_auth->get_recaptcha_input(); ?>
		<?php echo form_error('recaptcha_response_field'); ?>
	</dd>
	
	<?php 
		// Get recaptcha javascript and non javasript html
		echo $this->dx_auth->get_recaptcha_html();
	?>
<?php endif; ?>
                                
                                
                                <button type="submit" class="btn btn-info right" id="loginBtn" name="register"><span class="icon16 icomoon-icon-enter white"></span> Login</button>
                            </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </form>
        </div>

    </div><!-- End .container-fluid -->

    <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/ios-fix/ios-orientationchange-fix.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/plugins/uniform/jquery.uniform.min.js"></script>

     <script type="text/javascript">
        // document ready function
        $(document).ready(function() {
            $("input, textarea, select").not('.nostyle').uniform();
            $("#loginForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }  
                },
                messages: {
                    username: {
                        required: "Fill me please",
                        minlength: "My name is bigger"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "My password is more that 6 chars"
                    }
                }   
            });
        });
    </script>

 
    <script type="text/javascript">
        // document ready function
        $(document).ready(function() {
            //------------- Some fancy stuff in error pages -------------//
            $('.loginContainer').hide();
            $('.loginContainer').fadeIn(1000).animate({
                '0%': "30%", 'margin-top': +($('.loginContainer').height()/-30 -1)
                }, {duration: 2000, queue: false}, function() {
                // Animation complete.
            });
        });
    </script>

    </body>
</html>
