<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2><?= lang('Cdr.groupsAdd.addGroup') ?></h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/config/groups/add') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nameId"><?= lang('Cdr.groupsAdd.groupName') ?></label>
                            <input type="text" class="form-control <?= !session('errors.name') ?: 'is-invalid' ?>" id="nameId" name="name" placeholder="<?= lang('Cdr.groupsAdd.groupNamePh') ?>" value="<?= old('name') ?>">
                            <div class="invalid-feedback"><?= session('errors.name') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="descriptionId"><?= lang('Cdr.groupsAdd.description') ?></label>
                            <input type="text" class="form-control <?= !session('errors.description') ?: 'is-invalid' ?>" id="descriptionId" name="description" placeholder="<?= lang('Cdr.groupsAdd.descriptionPh') ?> do grupo" value="<?= old('description') ?>">
                            <div class="invalid-feedback"><?= session('errors.description') ?></div>
                        </div>
                    </div>
                    <div class="row">	
						<table class="table table-borderless">
							<thead>
								<tr>
									<th scope="col"><?= lang('Cdr.groupsAdd.category') ?></th>
									<th scope="col"><?= lang('Cdr.groupsAdd.toAdd') ?></th>
									<th scope="col"><?= lang('Cdr.groupsAdd.toList') ?></th>
									<th scope="col"><?= lang('Cdr.groupsAdd.toEdit') ?></th>
									<th scope="col"><?= lang('Cdr.groupsAdd.toDelete') ?></th>
									<th scope="col"><?= lang('Cdr.groupsAdd.toStatus') ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td scope="row"><?= lang('Cdr.groupsAdd.users') ?></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-add"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-list"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-edit"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-remove"><div class="control-indicator"></div></label></td>
									<td class="text-center"><label class="control outlined control-checkbox checkbox-success"><input type="checkbox" name="users-status"><div class="control-indicator"></div></label></td>
								</tr>
							</tbody>
						</table>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
						<button type="submit" class="btn btn-primary btn-default"><?= lang('Cdr.groupsAdd.submit') ?></button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>