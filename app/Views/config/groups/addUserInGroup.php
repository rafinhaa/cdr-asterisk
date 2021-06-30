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
								<th>Adicionar</th>
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
								<td>
									<?php if (in_array('users-status', $loggedUserPermissions) ): ?>
										<?php if($user->inGroup($group_id, $user->id)) : ?>
											<button class="badge badge-primary btn-status" data-field="<?= $user->id ?>" data-group="<?= $group_id ?>">no grupo</button>
										<?php else: ?>
											<button class="badge badge-secondary btn-status" data-field="<?= $user->id ?>" data-group="<?= $group_id ?>">fora do grupo</button>
										<?php endif; ?>
									<?php endif; ?>									
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalLabel" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Atenção</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				Modal body text goes here.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Voltar</button>
				<button type="button" class="btn btn-primary btn-pill" data-dismiss="modal">Sim</button>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>