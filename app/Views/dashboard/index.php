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
	<div class="col-6">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom">
				<h2>Últimas ligações</h2>
			</div>
			<div class="card-body">				
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Data</th>
							<th scope="col">Clid</th>
							<th scope="col">Origem</th>
							<th scope="col">Destino</th>
							<th scope="col">Duração</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($lastCalls)): ?>
							<?php foreach ($lastCalls as $call): ?>
								<tr>
									<?php 	
										$calldate = new DateTime($call['calldate']);
										$calldate = $calldate->format('d/m/Y H:i:s');
									?>
									<td scope="row"><?= $calldate ?></td>								
									<td><?= $call['clid'] ?></td>
									<td><?= $call['src'] ?></td>
									<td><?= $call['dst'] ?></td>
									<td><?= $call['duration'] ?></td>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="5">Não tem dados para ser exibidos</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>