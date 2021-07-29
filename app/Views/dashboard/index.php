<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
	<div class="col-xl-3 col-sm-6">
		<div class="card card-mini mb-4">
			<div class="card-body">			
				<h2 class="mb-1"><?= $totalCalls ? $totalCalls : '0' ?></h2>
				<p>Total Ligações</p>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6">
		<div class="card card-mini  mb-4">
			<div class="card-body">
				<h2 class="mb-1"><?= $totalTimeCalls ? $totalTimeCalls : '0' ?></h2>
				<p>Tempo total</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-default">
			<div class="card-header justify-content-center">
				<h2 class="text-center">Ligações</h2>
			</div>
			<div class="card-body">
				<canvas id="myChart" width="100" height="100"></canvas>
			</div>
		</div>
	</div>
<?= $this->endSection() ?></div>