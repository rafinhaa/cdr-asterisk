<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Editar grupo</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/config/groups/edit/'.$group->id) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nameId">Nome do grupo</label>
                            <input type="text" class="form-control <?= !session('errors.name') ?: 'is-invalid' ?>" id="nameId" name="name" placeholder="Digite o nome" value="<?= old('name') ? old('name') : $group->name ?>">
                            <div class="invalid-feedback"><?= session('errors.name') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="descriptionId">Descrição</label>
                            <input type="text" class="form-control <?= !session('errors.description') ?: 'is-invalid' ?>" id="descriptionId" name="description" placeholder="Descrição do grupo" value="<?= old('description') ? old('description') : $group->description ?>">
                            <div class="invalid-feedback"><?= session('errors.description') ?></div>
                        </div>
                    </div>
                    <div class="row">	
						<table class="table table-borderless">
							<thead>
								<tr>
									<th scope="col">Categoria</th>
									<th scope="col">Adicionar</th>
									<th scope="col">Listar</th>
									<th scope="col">Editar</th>
									<th scope="col">Apagar</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td scope="row">Usuários</td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-add"<?= in_array('users-add',$permitions) ? 'checked="checked"' : "" ?>><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-list"<?= in_array('users-list',$permitions) ? 'checked="checked"' : "" ?>><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-edit"<?= in_array('users-edit',$permitions) ? 'checked="checked"' : "" ?>><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-remove"<?= in_array('users-remove',$permitions) ? 'checked="checked"' : "" ?>><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-status"<?= in_array('users-status',$permitions) ? 'checked="checked"' : "" ?>><div class="control-indicator"></div></label></td>
								</tr>
							</tbody>
						</table>
                    </div>      
                    <input type="hidden" name="id" value="<?= $group->id ?>"> 
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
						<button type="submit" class="btn btn-primary btn-default">Enviar</button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2>Usuários no grupo</h2>
				<a href="<?= base_url('/config/groups/'.$group->id.'/add/user') ?>" class="btn btn-outline-primary btn-sm text-uppercase">
					Adicionar usuário no grupo
				</a>
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
								<?php foreach($usersInGroup as $uin): ?>							
								<tr>
									<td><?= $uin['id'] ?></td>
									<td><?= $uin['username'] ?></td>
									<td><?= $uin['name'] ?></td>
									<td><?= $uin['lastname'] ?></td>
									<td><?= $uin['email'] ?></td>
									<td>									
										<button type="button" class="btn btn-sm btn-danger btn-pill btn-delete-modal" data-toggle="modal" data-target="#deleteModal" data-field="<?= $uin['id'] ?>" data-group="<?= $group->id ?>">
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