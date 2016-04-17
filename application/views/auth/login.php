<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>


    <script src="<?php echo base_url(); ?>dist/js/prefixfree.min.js"></script>
    <link href="<?php echo base_url(); ?>dist/custom/css/style.css" rel="stylesheet">

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

    echo form_open($login_url, array('class' => 'std-form'));
    ?>

    <div class="login-form">
        <?php
        if (!isset($optional_login)) {
            echo '<h1 class="welcome">Login</h1>';
        }
        ?>
        <div class="field">
            <input type="text" placeholder="baylor@example.com" name="login_string" id="login_string" autocomplete="off"
                   maxlength="255">
        </div>

        <div class="field with-btn">
            <input type="password" name="login_pass" id="login_pass" class="form_input password"
                   maxlength="<?php echo config_item('max_chars_for_password'); ?>" autocomplete="off"
                   readonly="readonly"
                   onfocus="this.removeAttribute('readonly');"/>
        </div>

        <?php
        if (config_item('allow_remember_me')) {
            ?>

            <br/>

            <label for="remember_me" class="form_label">Remember Me</label>
            <input type="checkbox" id="remember_me" name="remember_me" value="yes"/>

            <?php
        }
        ?>
        <button>Login</button>


    </div>
    </form>

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
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>
</html>
