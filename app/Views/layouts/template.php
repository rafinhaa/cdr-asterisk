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
		<?= link_tag('assets/plugins/toastr/toastr.css') ?>
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
	</head>
	<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
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
		<script src="<?= base_url('assets/plugins/nprogress/nprogress.js') ?>"></script>		
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
	<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</html>