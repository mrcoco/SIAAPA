
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login Page | AA Pialang Asuransi</title>
<link rel="stylesheet" href="<?php echo base_url();?>templates/amanda/css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>templates/amanda/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/amanda/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/amanda/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/amanda/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/amanda/js/custom/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/amanda/js/custom/index.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>templates/amanda/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>templates/amanda/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<?php
$username = array(
	'name'      => 'username',
	'id'        => 'username',
	'size'      => 20,
	'value'     => set_value('username')
);

$password = array(
	'name'      => 'password',
	'id'        => 'password',
	'size'      => 20
);

$remember = array(
	'name'      => 'remember',
	'id'        => 'remember',
	'value'     => 1,
	'checked'   => set_value('remember'),
	'style'     => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'      => 'captcha',
	'id'        => 'captcha',
	'maxlength' => 8
);

?>
    <?php echo form_open($this->uri->uri_string())?>
<body class="loginpage">
    <div class="loginbox">
        <img src="<?php echo base_url();?>images/logo.png" align="center" width="315px" />
        <h6>OLEOS 1 Building, 6th floor Suite 622 Jl. Mampang Prapatan Raya No.139B Kalibata - Jakarta Selatan 12740. Phone.+62 21 7997 044 (hunting) & Fax.+62 21 7997 043</h6>
        <div class="loginboxinner">
            <div class="logo">
                <h1><span>SI</span>AAPA</h1>
            </div><!--logo-->
        </div><!--loginboxinner-->
        <div id="form">
            <table>
                <tr>
                    <td>Username</td>
                    <td><?php echo form_input($username)?>
                    <?php echo form_error($username['name']); ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><?php echo form_password($password)?>
                    <?php echo form_error($password['name']); ?></td>
                </tr>
                <tr>
                    
                </tr>
            </table>
            <?php if ($show_captcha): ?>
            <table>               
                <tr>
                    <td>
                        Enter the code exactly as it appears. There is no zero.
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->dx_auth->get_recaptcha_image(); ?>
                        <?php 
		// Get recaptcha javascript and non javasript html
		echo $this->dx_auth->get_recaptcha_html();
	?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_label('Confirmation Code', $confirmation_code['id']);?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_input($confirmation_code);?>
                        <?php echo form_error($confirmation_code['name']); ?>
                    </td>
                </tr>
<!--            </table>-->
            <?php endif; ?>
<!--            <table>-->
                <tr>
                    <td>
                        <?php echo form_checkbox($remember);?> <?php echo form_label('Remember me', $remember['id']);?> 
                        <?php echo '<a href="http://aapialang.co.id/ci/auth/forgot_password">Forgot password</a>';?> 
                        <?php
                            if ($this->dx_auth->allow_registration) {
				echo anchor($this->dx_auth->register_uri, 'Register');
                            };
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_submit('login','Login');?><?php echo $this->dx_auth->get_auth_error(); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div><!--loginbox-->
    <h4><?php echo $auth_message ?></h4>
</body><?php echo form_close()?>
</html>    