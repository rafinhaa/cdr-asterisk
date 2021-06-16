<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
		<title>Sleek - Admin Dashboard Template</title>
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
		<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
		<!-- PLUGINS CSS STYLE -->
		<?= link_tag('assets/plugins/nprogress/nprogress.css') ?>
		<!-- No Extra plugin used -->
		<?= link_tag('assets/plugins/toastr/toastr.min.css') ?>
		<!-- SLEEK CSS -->
		<?= link_tag(['id' => 'sleek-css', 'rel' => 'stylesheet', 'href' => 'assets/css/sleek.css']) ?>
		<!-- FAVICON -->
		<?= link_tag('assets/img/favicon.png', 'shortcut icon', 'image/ico') ?>
		<?php if (! empty($css) && is_array($css)) : ?>
			<?php foreach ($css as $name => $css_item): ?>
				<!-- <?= $name ?> -->
				<link rel="stylesheet" href="<?= base_url($css_item) ?>">
			<?php endforeach; ?>
		<?php endif ?>
		<!--
			HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
			-->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="assets/plugins/nprogress/nprogress.js"></script>
	</head>
	<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
		<script>
			NProgress.configure({ showSpinner: false });
			NProgress.start();
		</script>
		<div class="wrapper">
			<!-- LEFT SIDEBAR -->
			<aside class="left-sidebar bg-sidebar">
                <?= $this->include('layouts/sidebar') ?>
			</aside>
			<div class="page-wrapper">
				<!-- Header -->
				<header class="main-header " id="header">
                    <?= $this->include('layouts/header') ?>
				</header>
				<div class="content-wrapper">
					<div class="content">
						<?= $this->renderSection('content') ?>
					</div>
				</div>
				<footer class="footer mt-auto">
					<div class="copyright bg-white">
						<p>
							&copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
							<a
								class="text-primary"
								href="http://www.iamabdus.com/"
								target="_blank"
								>Abdus</a
								>.
						</p>
					</div>
					<script>
						var d = new Date();
						var year = d.getFullYear();
						document.getElementById("copy-year").innerHTML = year;
					</script>
					
				</footer>
			</div>
		</div>

		<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>		
		<script src="<?= base_url('assets/plugins/slimscrollbar/jquery.slimscroll.min.js') ?>"></script>	
		<script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/sleek.bundle.js') ?>"></script>
		<?php if (! empty($scripts) && is_array($scripts)) : ?>
			<?php foreach ($scripts as $name => $script): ?>
				<!-- <?= $name ?> -->
				<script src="<?= base_url($script) ?>"></script>
			<?php endforeach; ?>
		<?php endif ?>
		<?= $this->include('layouts/_alerts') ?>
	</body>
	<script>
		var baseUrl = "<?= base_url();?>";
		var siteUrl = "<?= site_url();?>";
	</script>
</html>