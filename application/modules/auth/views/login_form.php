<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control'
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
	'id'	=> 'password',
	'class' => 'form-control',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?=$this->load->view('auth/header')?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{!!url('')!!}"><b>Tugumuda</b>Framework</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your journey</p>
	<?=form_open($this->uri->uri_string()); ?>
      <div class="form-group has-feedback">
	  	<?=form_input($login); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <?=form_error($login['name']); ?><?=isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
      <div class="form-group has-feedback">
		  <?=form_password($password); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <?=form_error($password['name']); ?><?=isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
		<?=form_checkbox($remember); ?>
		<?=form_label('Remember me', $remember['id']); ?>
		<?=anchor('/auth/forgot_password/', 'Forgot password',['class' => 'text-danger']); ?>
		<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
		<?=form_submit('submit', 'Sign In',['class' => 'btn btn-primary btn-block btn-flat']); ?>
        </div>
        <!-- /.col -->
      </div>
	  <?=form_close(); ?>


<!-- jQuery 2.2.0 -->
<script src="<?=base_url()?>tugumuda/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>tugumuda/js/bootstrap.min.js"></script>
