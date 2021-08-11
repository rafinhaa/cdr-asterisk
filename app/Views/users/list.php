<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2><?= lang('Cdr.registeredUsers') ?></h2>
				<?php if (in_array('users-add', $loggedUserPermissions) ): ?>
					<a href="<?= base_url('/users/add') ?>" class="btn btn-outline-primary btn-sm text-uppercase">
						<?= lang('Cdr.addUser') ?>
					</a>
				<?php endif; ?>				
			</div>
			<div class="card-body">
				<div class="basic-data-table">
					<table id="basic-data-table" class="table nowrap" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th><?= lang('Cdr.usersList.user') ?></th>
								<th><?= lang('Cdr.name') ?></th>
								<th><?= lang('Cdr.lastName') ?></th>
								<th><?= lang('Cdr.email') ?></th>
								<th><?= lang('Cdr.usersList.status') ?></th>
								<th><?= lang('Cdr.usersList.options') ?></th>
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
										<?php if($user->isBanned() != 1) : ?>
											<button class="badge badge-primary btn-status" data-field="<?= $user->id ?>">ativo</button>
										<?php else: ?>
											<button class="badge badge-secondary btn-status" data-field="<?= $user->id ?>">inativo</button>
										<?php endif; ?>
									<?php endif; ?>									
								</td>
								<td>
									<?php if (in_array('users-edit', $loggedUserPermissions) ): ?>
										<a href="<?= base_url('/users/profile/'.$user->id) ?>" class="button btn-sm btn-primary btn-edit" data-field="<?= $user->id ?>"><i class="mdi mdi-pencil"></i></a>
									<?php endif; ?>
									<?php if (in_array('users-remove', $loggedUserPermissions) ): ?>
										<button type="button" class="btn btn-sm btn-danger btn-pill btn-delete-modal" data-toggle="modal" data-target="#deleteModal" data-field="<?= $user->id ?>">
											<i class="mdi mdi-delete"></i>
										</button>
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
				<h5 class="modal-title" id="modalLabel"><?= lang('Cdr.alerts.warning') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				Modal body text goes here.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-pill" data-dismiss="modal"><?= lang('Cdr.alerts.back') ?></button>
				<button type="button" class="btn btn-primary btn-pill" data-dismiss="modal"><?= lang('Cdr.alerts.yes') ?></button>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>