<?php if (session()->has('message')) : ?>
	<div class="alert alert-dismissible fade show alert-danger" role="alert">
		<?= session('message') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="alert alert-dismissible fade show alert-danger" role="alert">
		<?= session('error') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
<?php endif ?>