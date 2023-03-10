<?php

$body = '';
if(!isLoggedIn()) 
{
	$body = <<<EOT
	<style type="text/css">
	html, body {
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"!important;
		height: 100%!important;
	}

	body {
		margin: 0!important;
	}

	#videoBG {
		object-fit: cover!important;
		width: 100vw!important;
		height: 100vh!important;
		position: fixed!important;
		top: 0!important;
		left: 0!important;
		z-index: 0!important;
	}

	#overlayshadow {
		object-fit: cover!important;
		width: 100vw!important;
		height: 100vh!important;
		position: fixed!important;
		top: 0!important;
		left: 0!important;
		z-index: 1!important;
		background-color: black!important;
		opacity: 0.5!important;
	}

	.viewport-header {
		position: relative!important;
		height: 100vh!important;
		text-align: center!important;
		display: flex!important;
		align-items: center!important;
		justify-content: center!important;
		z-index: 3!important;
	}

	index-img {
		width: 40vw!important;
		text-align: center!important;
		display: inline-block!important;
	}

	#head-text {
		color: white!important;
		display: inline-block!important;
		font-size: 2vw!important;
		padding: .5vw!important;
	}

	#paragraph-text {
		color: white!important;
		display: inline-block!important;
		font-size: 1.2vw!important;
	}

	#button-group {
		color: white!important;
		margin-top: .6vw!important;
	}

	#button-group button {
		color: white!important;
		margin-top: .6vw!important;
		cursor: pointer!important;
		display: inline-block!important;
		font-weight: 400!important;
		color: #212529!important;
		text-align: center!important;
		vertical-align: middle!important;
		-webkit-user-select: none!important;
		-moz-user-select: none!important;
		-ms-user-select: none!important;
		user-select: none!important;
		background-color: transparent!important;
		border: 1px solid transparent!important;
		padding: .32vw .7vw!important;
		font-size: .8vw!important;
		line-height: 1.5!important;
		border-radius: .2vw!important;
		transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out!important;
		color: #fff!important;
		background-color: #dc3545!important;
		border-color: #dc3545!important;
	}

	#button-group button:hover {
		color: #fff!important;
		background-color: #c82333!important;
		border-color: #bd2130!important;
	}

	.index-row {
		-ms-flex-wrap: wrap!important;
		flex-wrap: wrap!important;
		margin-right: -15px!important;
		margin-left: -15px!important;
	}

	.index-container {
		display: block!important;
	}

	.home-footer {
		position: absolute;
		width: 100%;
		height: 50px;
		bottom: 0;
		left: 0;
		text-align: center;
		z-index: 3;
	}

	#ortxt {
		color: white!important;
		margin-top:10px;
	}
	</style>

	<div id="overlayshadow"></div>
	<video id="videoBG" autoplay loop playsinline muted>
		<source src="/fobe/cdn/vids/index-vid.m4v" type="video/mp4">
	</video>

	<div class="viewport-header">
		<div class="index-container">
			<div class="index-row">
				<img class="img-fluid" style="width:15rem;padding:10px;" src="/fobe/cdn/imgs/finobe-256x256.png">
			</div>
			<div class="index-row">
				<div style="margin-top:20px;">
					<a href="login"><button class="btn btn-danger">Login</button></a><h> </h><a href="register"><button class="btn btn-danger">Register</button></a>
				</div>
			</div>
		</div>
	</div>
	<div class="home-footer"><a href="https://discord.gg/qmV6P6XRhz" target="_blank" class="btn" style="background-color:#5865f2;border-color:#5865f2;color:#fff">Join our Discord <svg class="svg-inline--fa fa-discord fa-w-14" data-fa-pseudo-element-pending-before="discord" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="discord" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M297.216 243.2c0 15.616-11.52 28.416-26.112 28.416-14.336 0-26.112-12.8-26.112-28.416s11.52-28.416 26.112-28.416c14.592 0 26.112 12.8 26.112 28.416zm-119.552-28.416c-14.592 0-26.112 12.8-26.112 28.416s11.776 28.416 26.112 28.416c14.592 0 26.112-12.8 26.112-28.416.256-15.616-11.52-28.416-26.112-28.416zM448 52.736V512c-64.494-56.994-43.868-38.128-118.784-107.776l13.568 47.36H52.48C23.552 451.584 0 428.032 0 398.848V52.736C0 23.552 23.552 0 52.48 0h343.04C424.448 0 448 23.552 448 52.736zm-72.96 242.688c0-82.432-36.864-149.248-36.864-149.248-36.864-27.648-71.936-26.88-71.936-26.88l-3.584 4.096c43.52 13.312 63.744 32.512 63.744 32.512-60.811-33.329-132.244-33.335-191.232-7.424-9.472 4.352-15.104 7.424-15.104 7.424s21.248-20.224 67.328-33.536l-2.56-3.072s-35.072-.768-71.936 26.88c0 0-36.864 66.816-36.864 149.248 0 0 21.504 37.12 78.08 38.912 0 0 9.472-11.52 17.152-21.248-32.512-9.728-44.8-30.208-44.8-30.208 3.766 2.636 9.976 6.053 10.496 6.4 43.21 24.198 104.588 32.126 159.744 8.96 8.96-3.328 18.944-8.192 29.44-15.104 0 0-12.8 20.992-46.336 30.464 7.68 9.728 16.896 20.736 16.896 20.736 56.576-1.792 78.336-38.912 78.336-38.912z"></path></svg><!-- <i class="fab fa-discord"><svg data-fa-pseudo-element=":before" data-prefix="fab" data-icon="discord" class="svg-inline--fa fa-discord fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M297.216 243.2c0 15.616-11.52 28.416-26.112 28.416-14.336 0-26.112-12.8-26.112-28.416s11.52-28.416 26.112-28.416c14.592 0 26.112 12.8 26.112 28.416zm-119.552-28.416c-14.592 0-26.112 12.8-26.112 28.416s11.776 28.416 26.112 28.416c14.592 0 26.112-12.8 26.112-28.416.256-15.616-11.52-28.416-26.112-28.416zM448 52.736V512c-64.494-56.994-43.868-38.128-118.784-107.776l13.568 47.36H52.48C23.552 451.584 0 428.032 0 398.848V52.736C0 23.552 23.552 0 52.48 0h343.04C424.448 0 448 23.552 448 52.736zm-72.96 242.688c0-82.432-36.864-149.248-36.864-149.248-36.864-27.648-71.936-26.88-71.936-26.88l-3.584 4.096c43.52 13.312 63.744 32.512 63.744 32.512-60.811-33.329-132.244-33.335-191.232-7.424-9.472 4.352-15.104 7.424-15.104 7.424s21.248-20.224 67.328-33.536l-2.56-3.072s-35.072-.768-71.936 26.88c0 0-36.864 66.816-36.864 149.248 0 0 21.504 37.12 78.08 38.912 0 0 9.472-11.52 17.152-21.248-32.512-9.728-44.8-30.208-44.8-30.208 3.766 2.636 9.976 6.053 10.496 6.4 43.21 24.198 104.588 32.126 159.744 8.96 8.96-3.328 18.944-8.192 29.44-15.104 0 0-12.8 20.992-46.336 30.464 7.68 9.728 16.896 20.736 16.896 20.736 56.576-1.792 78.336-38.912 78.336-38.912z"></path></svg></i> --></a>

</div>
EOT;
}
else
{
	//user is logged in, send to home page
	header('Location: home');
}

pageHandler();
$ph->navbar = "";
$ph->footer = "";
$ph->pageTitle("Fobe");
$ph->body = $body;
$ph->output();