<!doctype html>
<html ⚡>

<head>
	<meta charset="UTF-8">
	<title><?= $data['title'] ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" media="all" href="<?= BASEURL; ?>/css/style.css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
	<meta name="viewport" content="width=device-width,minimum-scale=1">
	<base href="<?= BASEURL; ?>/public/">
	<style amp-boilerplate>
		body {
			-webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
			-moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
			-ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
			animation: -amp-start 8s steps(1, end) 0s 1 normal both
		}

		@-webkit-keyframes -amp-start {
			from {
				visibility: hidden
			}

			to {
				visibility: visible
			}
		}

		@-moz-keyframes -amp-start {
			from {
				visibility: hidden
			}

			to {
				visibility: visible
			}
		}

		@-ms-keyframes -amp-start {
			from {
				visibility: hidden
			}

			to {
				visibility: visible
			}
		}

		@-o-keyframes -amp-start {
			from {
				visibility: hidden
			}

			to {
				visibility: visible
			}
		}

		@keyframes -amp-start {
			from {
				visibility: hidden
			}

			to {
				visibility: visible
			}
		}
	</style><noscript>
		<style amp-boilerplate>
			body {
				-webkit-animation: none;
				-moz-animation: none;
				-ms-animation: none;
				animation: none
			}
		</style>
	</noscript>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
	<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
</head>
<!-- Header -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
	<div class="close-menu">
		<a on="tap:sidebar.toggle">
			<img src="images/bt-close.png" alt="Close Menu" width="24" height="24" />
		</a>
	</div>
	<a href="../"><img src="images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" /></a>
	<div>
		<ul>
			<li><a href="../categories" class="link-menu">Categorias</a></li>
			<li><a href="../products" class="link-menu">Produtos</a></li>
		</ul>
	</div>
</amp-sidebar>
<header>
	<div class="go-menu">
		<a on="tap:sidebar.toggle">☰</a>
		<a href="<?= BASEURL; ?>" class="link-logo"><img src="images/go-logo.png" alt="Welcome" width="69" height="430" /></a>
	</div>
	<div class="right-box">
		<a href="../dashboard" title="Administration Panel"><span class="go-title">Administration Panel</span></a>
		<?php if (isset($_SESSION["logged"])) { ?>
			<a href="../products" title="Products"><span class="go-title ml-2">Products</span></a>
			<a href="../categories" title="Categories"><span class="go-title ml-2">Categories</span></a>
			<a href="../brands" title="Brands"><span class="go-title ml-2">Brands</span></a>
			<a href="../coupons" title="Coupons"><span class="go-title ml-2">Coupons</span></a>
			<a href="../users" title="Users"><span class="go-title ml-2">Users</span></a>
			<a href="../logs" title="Logs"><span class="go-title ml-2">Logs</span></a>
			<a href="../login/logout" title="Logout"><span class="go-title ml-2">Logout</span></a>
		<?php } ?>
	</div>
</header>
<!-- Header -->