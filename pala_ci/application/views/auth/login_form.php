<?php
$form = array(
    'class'     => 'form-horizontal',
    'id' => 'login-form'
);
$label = array(
    'class'     => 'col-sm-12'
);
$login = array(
    'name'	=> 'login',
    'class'     => 'form-control',
    'id'	=> 'login',
    'value'     => set_value('login'),
    'maxlength'	=> 80,
    'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
    $login_label = 'Email or login';
} else if ($login_by_username) {
    $login_label = 'Login';
} else {
    $login_label = 'Email';
}
$password = array(
    'name'	=> 'password',
    'class'     => 'form-control',
    'id'	=> 'password',
    'size'	=> 30,
);
$remember = array(
    'name'	=> 'remember',
    'id'	=> 'remember',
    'value'	=> 1,
    'checked'	=> set_value('remember'),
    'style'     => 'margin:0;padding:0',
);
$captcha = array(
    'name'	=> 'captcha',
    'class'     => 'form-control',
    'id'	=> 'captcha',
    'maxlength'	=> 8,
);
$submit = array(
    'name'	=> 'submit',
    'class'     => 'btn btn-primary',
    'id'	=> 'submit',
    'value'	=> 'Log-in',
);
?>
<!DOCTYPE html> 
<html lang="en-US">
  <head>
    <title>Julieta's Pension House - Login</title>
    <meta charset="utf-8">
    <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="content">
		<?php echo form_open($this->uri->uri_string(), $form); ?>
		<div class="form-group">
			<?php echo form_label($login_label, $login['id'], $label); ?>
			<div class="col-sm-12"><?php echo form_input($login); ?></div>
			<div class="col-sm-12"><?php echo form_error($login['name'], '<div class="alert alert-danger">', isset($errors[$login['name']])?$errors[$login['name']]:''.'</div>'); ?></div>
		</div>
		<div class="form-group">
			<?php echo form_label('Password', $password['id'], $label); ?>
			<div class="col-sm-12"><?php echo form_password($password); ?></div>
			<div class="col-sm-12"><?php echo form_error($password['name'], '<div class="alert alert-danger">', isset($errors[$password['name']])?$errors[$password['name']]:''.'</div>'); ?></div>
		</div>
		<?php if ($show_captcha) {
				if ($use_recaptcha) { ?>
		<div class="form-group">
			<div class="col-sm-12">
				<div id="recaptcha_image"></div>
			</div>
			<div class="col-sm-12">
				<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
				<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
				<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<div class="recaptcha_only_if_image">Enter the words above</div>
				<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
			</div>
			<div class="col-sm-12"><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></div>
			<div class="col-sm-12"><?php echo form_error('recaptcha_response_field','<div class="alert alert-danger">', '</div>'); ?></div>
			<?php echo $recaptcha_html; ?>
		</div>
		<?php } else { ?>
		<div class="form-group">
			<div class="col-sm-12 text-center">
				<p>Enter the code exactly as it appears:</p>
				<?php echo $captcha_html; ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo form_label('Confirmation Code', $captcha['id'], $label); ?>
			<div class="col-sm-12"><?php echo form_input($captcha); ?></div>
			<div class="col-sm-12"><?php echo form_error($captcha['name'],'<div class="alert alert-danger">', '</div>'); ?></div>
		</div>
		<?php }
		} ?>
		<div class="form-group">
			<div class="col-sm-12">
				<?php echo form_checkbox($remember); ?>
				<?php echo form_label('Remember me', $remember['id']); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-right">
				<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?> |
				<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-center"><?php echo form_submit($submit); ?></div>
		</div>
		<?php echo form_close(); ?>
	</div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>   