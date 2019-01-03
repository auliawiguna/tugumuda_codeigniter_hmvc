
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'class' => 'validate[required] form-control'
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'validate[required] form-control'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'validate[required] form-control'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'validate[required] form-control'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'validate[required] form-control'
);
?>
<?=$this->load->view('auth/header')?>

<section class="content">
	<div class="box box-primary">
		<div class="row">
			<div class="col-md-6">
				<h1>Tugumuda Framework</h1>
				<h3>Codeigniter Version</h3>
				<p>Proud to you by :</p>
				<ul>
					<li>Ahmad Aulia Wiguna</li>
					<li>Abid Muhammad Ismi</li>
					<li>Angger P Putro</li>
					<li>Pandu Harry Murti a.k.a PAHAMU</li>
					<li>Rendy "Mas Kusumo" Amdani</li>
				</ul>
			</div>
        	<div class="col-md-6">
				<?=form_open($this->uri->uri_string(),['method' => 'POST','class' => 'form-horizontal']); ?>
					<div class="box-body">
						<?php if ($use_username): ?>
						<div class="form-group">
							<?=form_label('Username', $username['id'],['class' => 'col-sm-3 control-label']);?>
							<div class="col-sm-7">
								<?=form_input($username)?>
								<b class="text-red"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></b>
							</div>
						</div>
						<?php endif;?>
						<div class="form-group">
							<?=form_label('Email Address', $email['id'],['class' => 'col-sm-3 control-label']);?>
							<div class="col-sm-7">
								<?=form_input($email)?>
								<b class="text-red"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></b>
							</div>
						</div>

						<div class="form-group">
							<?=form_label('Password', $password['id'],['class' => 'col-sm-3 control-label']);?>
							<div class="col-sm-7">
								<?=form_password($password)?>
								<?php echo form_error($password['name']); ?></b>
							</div>
						</div>
						<div class="form-group">
							<?=form_label('Confirm Password', $confirm_password['id'],['class' => 'col-sm-3 control-label']);?>
							<div class="col-sm-7">
								<?=form_password($confirm_password)?>
								<b class="text-red"><?php echo form_error($confirm_password['name']); ?></b>
							</div>
						</div>
						<?php if ($captcha_registration) {
							if (!$use_recaptcha) {	
						?>					
						<div class="form-group">
							<?=form_label('Confirmation Code', $captcha['id'],['class' => 'col-sm-3 control-label']);?>
							<div class="col-sm-7">
							<?php echo $captcha_html; ?>
								<?=form_input($captcha)?>
								<b class="text-red"><?php echo form_error($captcha['name']); ?></b>
							</div>
						</div>
						<?php
							}
						}
						?>
					</div>

					<div class="box-footer">
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
								<?php echo form_submit('register', 'Register',['class' => 'btn btn-success']); ?>
							</div>
						</div> 
					</div>
				<?=form_close(); ?>				
        	</div>
      	</div>
    </div>
</section>

