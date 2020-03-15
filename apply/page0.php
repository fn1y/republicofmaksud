<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to apply for membership.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = 'When you get accepted, you\'ll be sent a Discord friend request from fin#0069, one of our all-powerful overlords.';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		<link rel="apple-touch-icon" sizes="167x167" href="https://republicofmaksud.xyz/resources/medium.png" />
<link rel="apple-touch-icon" sizes="180x180" href="https://republicofmaksud.xyz/resources/profile.png" />
<link rel="apple-touch-icon" sizes="152x152" href="https://republicofmaksud.xyz/resources/small.png" />
<link rel="mask-icon" href="https://republicofmaksud.xyz/resources/isolated-monochrome-white.svg" color="rgba(255,255,255,1.00)" /><link rel="icon" type="image/png" href="https://republicofmaksud.xyz/resources/favicon_medium.png" sizes="32x32" />
<link rel="icon" type="image/png" href="https://republicofmaksud.xyz/resources/favicon_small.png" sizes="16x16" />
<link rel="icon" type="image/png" href="https://republicofmaksud.xyz/resources/favicon_large.png" sizes="64x64" />

	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Republic of Maksud">
	<meta name="twitter:description" content="The official website for the Republic of Maksud Minecraft server.">
	<meta name="twitter:image" content="https://republicofmaksud.xyz/resources/profile.png">
	<meta name="twitter:url" content="https://republicofmaksud.xyz/apply/page0.php">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="The Republic of Maksud">
	<meta property="og:title" content="Republic of Maksud">
	<meta property="og:description" content="The official website for the Republic of Maksud Minecraft server.">
	<meta property="og:image" content="https://republicofmaksud.xyz/resources/profile.png">
	<meta property="og:url" content="https://republicofmaksud.xyz/apply/page0.php">
	

	<title>Apply | ROM</title>
	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Future/consolidated-0.css?rwcache=605972233" />
		
	
	   
</head>

<!-- This page was created with RapidWeaver from Realmac Software. http://www.realmacsoftware.com -->

<body>
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand" href="https://republicofmaksud.xyz/"><img src="../rw_common/images/profile copy.png" width="1000" height="1000" alt="Apply"/> <span class="navbar-title">Apply</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
			 aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Home</a></li><li class="nav-item active"><a href="page0.php" rel="" class="nav-link">Apply</a></li><li class="nav-item"><a href="../page/" rel="" class="nav-link">Phases</a></li></ul>
			</div>
		</div>
	</nav>

	<header class="hero" id="hero">
        <div class="hero-background"></div>
		<div class="hero-overlay"></div>
		<h1 class="hero-title">
			Apply
			<em>Join the Republic.</em>
		</h1>
	</header>

	<div class="content">
		<section class="main" style="position: relative;">
			<div class="container">
                <div class="row">
                    <div class="col-sm-12 main">
                        
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Minecraft IGN</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Discord Tag</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>I agree to follow the server rules, and make things fun for everyone else!</label> *
		<input class="form-checkbox-field" <?php echo check('element3', 'checkbox'); ?> type="checkbox" name="form[element3]" value="yes"/><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		<input class="form-input-button" type="reset" name="resetButton" value="Clear" />
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

                    </div>

                    <div class="col-sm-12 sidebar">
                        <h2></h2>
                         
                    </div>
                </div>
			</div>
		</section>
	</div>

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col">
					<ul class="navbar-nav ml-auto"><li class="nav-item"><a href="../" rel="" class="nav-link">Home</a></li><li class="nav-item active"><a href="page0.php" rel="" class="nav-link">Apply</a></li><li class="nav-item"><a href="../page/" rel="" class="nav-link">Phases</a></li></ul>
					&copy; 2020 Adrian Testa & Finlay Carson Moretti | Site Version 1.1
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../rw_common/themes/Future/js/main.js?rwcache=605972233"></script>
</body>

</html>