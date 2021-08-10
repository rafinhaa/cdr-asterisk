<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2><?= lang('Cdr.groups.registredGroups') ?></h2>
				<a href="<?= base_url('/config/groups/add') ?>" class="btn btn-outline-primary btn-sm text-uppercase">
					<?= lang('Cdr.groups.addGroup') ?>
				</a>
			</div>
			<div class="card-body">
				<div class="basic-data-table">
					<table id="basic-data-table" class="table nowrap" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th><?= lang('Cdr.groups.group') ?></th>
								<th><?= lang('Cdr.groups.description') ?></th>
								<th><?= lang('Cdr.groups.options') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($groups as $group): ?>							
							<tr>
								<td><?= $group->id ?></td>
								<td><?= $group->name ?></td>
								<td><?= $group->description ?></td>
								<td>
                                    <a href="<?= base_url('/config/groups/edit/'.$group->id) ?>" class="button btn-sm btn-primary btn-edit"><i class="mdi mdi-pencil"></i></a>
									<button type="button" class="btn btn-sm btn-danger btn-pill btn-delete-modal" data-toggle="modal" data-target="#deleteModal" data-field="<?= $group->id ?>">
											<i class="mdi mdi-delete"></i>
									</button>
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