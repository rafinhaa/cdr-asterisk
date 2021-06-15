<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2>Usuários cadastrados</h2>
			</div>
			<div class="card-body">
				<div class="basic-data-table">
					<table id="basic-data-table" class="table nowrap" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Usuário</th>
								<th>Nome</th>
								<th>Sobrenome</th>
								<th>E-mail</th>
								<th>Opções</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($users as $user): ?>							
							<tr>
								<td><?= $user->id ?></td>
								<td><?= $user->username ?></td>
								<td><?= $user->name ?></td>
								<td><?= $user->lastname ?></td>
								<td><?= $user->email ?></td>
								<td></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>