<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Community Auth</title>
	<script src="<?php echo base_url(); ?>dist/js/prefixfree.min.js"></script>
	<link href="<?php echo base_url(); ?>dist/custom/css/style.css" rel="stylesheet">

	<?php
		// Add any javascripts
		if( isset( $javascripts ) )
		{
			foreach( $javascripts as $js )
			{
				echo '<script src="' . $js . '"></script>' . "\n";
			}
		}

		if( isset( $final_head ) )
		{
			echo $final_head;
		}
	?>
</head>
<body>
<div id="menu">
	<ul>
		<li><?php
			$link_protocol = USE_SSL ? 'https' : NULL;

			if( isset( $auth_user_id ) ){
				echo anchor( site_url('examples/logout', $link_protocol ),'Logout');
			}else{
				echo anchor( site_url(LOGIN_PAGE . '?redirect=examples', $link_protocol ),'Login','id="login-link"');
			}
		?></li>
		<?php 
			if( ! isset( $auth_user_id ) ){
				echo '<li>' . anchor( site_url('examples/ajax_login', $link_protocol ),'Ajax Login','id="ajax-login-link"') . '</li>';
			}
		?>
		<li>
			<?php echo anchor( site_url('examples/optional_login_test', $link_protocol ),'Optional Login'); ?>
		</li>
		<li>
			<?php echo anchor( site_url('examples/simple_verification', $link_protocol ),'Simple Verification'); ?>
		</li>
		<li>
			<?php echo anchor( site_url('examples/create_user', $link_protocol ),'Create User'); ?>
		</li>
	</ul>
</div>

<?php

/* End of file page_header.php */
/* Location: /community_auth/views/examples/page_header.php */