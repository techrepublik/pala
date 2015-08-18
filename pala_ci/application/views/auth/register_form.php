<?php
$form = array(
    'class'     => 'form-horizontal',
    'id' => 'register-form'
);
$label = array(
    'class'     => 'col-sm-12'
);
if ($use_username) {
    $username = array(
        'name'	=> 'username',
        'class'     => 'form-control',
        'id'	=> 'username',
        'value' => set_value('username'),
        'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
        'size'	=> 30,
    );
}
$email = array(
    'name'	=> 'email',
    'class'     => 'form-control',
    'id'	=> 'email',
    'value'	=> set_value('email'),
    'maxlength'	=> 80,
    'size'	=> 30,
);
$password = array(
    'name'	=> 'password',
    'class'     => 'form-control',
    'id'	=> 'password',
    'value' => set_value('password'),
    'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
    'size'	=> 30,
);
$confirm_password = array(
    'name'	=> 'confirm_password',
    'class'     => 'form-control',
    'id'	=> 'confirm_password',
    'value' => set_value('confirm_password'),
    'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
    'size'	=> 30,
);
$captcha = array(
    'name'	=> 'captcha',
    'class'     => 'form-control',
    'id'	=> 'captcha',
    'maxlength'	=> 8,
);
$submit = array(
    'name'	=> 'register',
    'class'     => 'btn btn-primary',
    'id'	=> 'register',
    'value'	=> 'Register',
);
?>
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
// if ($login_by_username AND $login_by_email) {
    // $login_label = 'Email or login';
// } else if ($login_by_username) {
    // $login_label = 'Login';
// } else {
    // $login_label = 'Email';
// }
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
    <title>Julieta's Pension House - Register</title>
    <meta charset="utf-8">
    <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <nav class="navbar navbar-default navbar-static-top main-nav div-rounded-corner" role="navigation">

	<div class="container" >

		<div class="navbar-header">

			<button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">

				<span class="sr-only">Toggle navigation</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

			</button>

			<a href="#" class="navbar-brand"><img src="_/images/jph_logo_sm.png" alt="jph logo"></a>

		</div>

		<div id="navbar" class="navbar-collapse collapse">

			<ul class="nav navbar-nav navbar-right">

				<li class="active"><a href="#">Home</a></li>

				<li><a href="#accomodation">Accomodation</a></li>

				<li><a href="#services">Services</a></li>

				<li><a href="#">Booking</a></li>

				<li><a href="#palawan_tour">Palawan Tour</a></li>

				<li><a href="#location">Location</a></li>

			</ul>

		</div>

	</div>

</nav>
    <div class="content">
		<?php echo form_open($this->uri->uri_string(), $form); ?>
		<?php
		if( ! empty($errors))
		{
		?>
		<div class="form-group">
			<div class="col-sm-12">
				<div class="alert alert-danger">
					<ul>
						<?php
						if(is_array($errors)){
							foreach ($errors as $error){
								echo '<li>'.(string) $error.'</li>';
							}
						} else {
							echo $errors;
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php
		}
		?>
		<?php if ($use_username) { ?>
		<div class="form-group">
			<?php echo form_label('Username', $username['id'], $label); ?>
			<div class="col-sm-12"><?php echo form_input($username); ?></div>
		</div>
		<?php } ?>
		<div class="form-group">
			<?php echo form_label('Email Address', $email['id'], $label); ?>
			<div class="col-sm-12"><?php echo form_input($email); ?></div>
		</div>
		<div class="form-group">
			<?php echo form_label('Password', $password['id'], $label); ?>
			<div class="col-sm-12"><?php echo form_password($password); ?></div>
		</div>
		<div class="form-group">
			<?php echo form_label('Confirm Password', $confirm_password['id'], $label); ?>
			<div class="col-sm-12"><?php echo form_password($confirm_password); ?></div>
		</div>

		<?php if ($captcha_registration) {
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
			<div class="col-sm-12"><input type="text" class="form-control" id="recaptcha_response_field" name="recaptcha_response_field" /></div>
			<div class="col-sm-12"><?php echo form_error('recaptcha_response_field'); ?></div>
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
			<div class="col-sm-12"><?php echo form_error($captcha['name']); ?></div>
		</div>
		<?php }
		} ?>
		<div class="form-group text-center">
		<?php echo form_submit($submit); ?>
		</div>
		<?php echo form_close(); ?>
	</div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>