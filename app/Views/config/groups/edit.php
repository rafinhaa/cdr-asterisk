<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Editar grupo</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/users/add') ?>" method="post">
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
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" checked="checked"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" checked="checked"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" checked="checked"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" checked="checked"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" checked="checked"><div class="control-indicator"></div></label></td>
								</tr>
							</tbody>
						</table>
                    </div>       
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
						<button type="submit" class="btn btn-primary btn-default">Enviar</button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>