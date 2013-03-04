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
<body class="loginpage">
    <div class="loginbox">
        <img src="<?php echo base_url();?>images/logo.png" align="center" width="315px" />
        <h6>OLEOS 1 Building, 6th floor Suite 622 Jl. Mampang Prapatan Raya No.139B Kalibata - Jakarta Selatan 12740. Phone.+62 21 7997 044 (hunting) & Fax.+62 21 7997 043</h6>
        <div class="loginboxinner">
            <div class="logo">
                <h1><span>SI</span>AAPA</h1>
            </div><!--logo-->
        </div><!--loginboxinner-->
        <table>
                <tr>
                    <td><?php echo form_label('Username', $username['id']);?></td>
                </tr>
                <tr>
                    <td><?php echo form_input($username)?>
                        <?php echo form_error($username['name']); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo form_label('Password', $password['id']);?></td>
                </tr>
                <tr>
                    <td><?php echo form_password($password)?>
                        <?php echo form_error($password['name']); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo form_label('Confirm Password', $confirm_password['id']);?></td>
                </tr>
                <tr>
                    <td><?php echo form_password($confirm_password);?>
                        <?php echo form_error($confirm_password['name']); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo form_label('Email Address', $email['id']);?></td>
                </tr>
                <tr>
                    <td><?php echo form_input($email);?>
		<?php echo form_error($email['name']); ?></td>
                </tr>
                <?php if ($this->dx_auth->captcha_registration): ?>
                <tr>
                    <td><?php 
			// Show recaptcha imgage
			echo $this->dx_auth->get_recaptcha_image(); 
			// Show reload captcha link
			echo $this->dx_auth->get_recaptcha_reload_link(); 
			// Show switch to image captcha or audio link
			echo $this->dx_auth->get_recaptcha_switch_image_audio_link(); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->dx_auth->get_recaptcha_label(); ?></td>
                </tr>
                <tr>
                    <td><?php echo $this->dx_auth->get_recaptcha_input(); ?>
                        <?php echo form_error('recaptcha_response_field'); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php 
		// Get recaptcha javascript and non javasript html
                        echo $this->dx_auth->get_recaptcha_html();?>
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td><?php echo form_submit('register','Register');?></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
    </div><!--loginbox-->
</body>
</html>