<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PrevCrime - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url(); ?>dist/bootstrap/dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>dist/custom/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Login Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2016, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */


if (!isset($on_hold_message)) {
    if (isset($login_error_mesg)) {
        echo '
			<div class="message">
				<p>
					Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.
				</p>
				<p>
					Username, email address and password are all case sensitive.
				</p>
			</div>
		';
    }
    echo '<div class="row">';





    echo '</div>';
    echo '<div class="container col-md-6 col-lg-offset-3">';
    echo '<img src="'.base_url().'dist/images/opvc-icon.png" align="middle" class="img-responsive center-block">';
    echo form_open($login_url, array('class' => 'form-signin'));
    ?>
            <input name="login_string" id="login_string" class="form-control" placeholder="Email" required="" autofocus="" type="text">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="login_pass" id="login_pass" class="form-control"
               maxlength="<?php echo config_item('max_chars_for_password'); ?>" autocomplete="off"
               readonly="readonly" placeholder="Password"
               onfocus="this.removeAttribute('readonly');"
            />
            <div class="checkbox">
                <label>

                    <?php
                    if (config_item('allow_remember_me')) {
                        ?>
                        <input value="yes" type="checkbox" id="remember_me" name="remember_me"> Relembrar-me
                        <?php
                    }
                    ?>
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block">Iniciar sessão</button>
        </form>
    </div> <!-- /container -->

    <?php

} else {
    // EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
    echo '
			<div style="border:1px solid red;">
				<p>
					Excessive Login Attempts
				</p>
				<p>
					You have exceeded the maximum number of failed login<br />
					attempts that this website will allow.
				<p>
				<p>
					Your access to login and account recovery has been blocked for ' . ((int)config_item('seconds_on_hold') / 60) . ' minutes.
				</p>
				<p>
					Please use the <a href="/examples/recover">Account Recovery</a> after ' . ((int)config_item('seconds_on_hold') / 60) . ' minutes has passed,<br />
					or contact us if you require assistance gaining access to your account.
				</p>
			</div>
		';
}

?>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url(); ?>dist/custom/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>
