<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2><?= lang('Cdr.userAdd.newUser') ?></h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/users/add') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="emailId"><?= lang('Cdr.userAdd.email') ?></label>
                            <input type="email" class="form-control <?= !session('errors.email') ?: 'is-invalid' ?>" id="emailId" name="email" placeholder="<?= lang('Cdr.userAdd.emailPlaceholder') ?>" value="<?= old('email')?>">
                            <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usernameId"><?= lang('Cdr.userAdd.user') ?></label>
                            <input type="text" class="form-control <?= !session('errors.username') ?: 'is-invalid' ?>" id="usernameId" name="username" placeholder="<?= lang('Cdr.userAdd.userPlaceholder') ?>" value="<?= old('username')?>">
                            <div class="invalid-feedback"><?= session('errors.username') ?></div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-md-6 mb-3">
                            <label for="namedId"><?= lang('Cdr.userAdd.name') ?></label>
                            <input type="text" class="form-control <?= !session('errors.name') ?: 'is-invalid' ?>" id="namedId" name="name" placeholder="<?= lang('Cdr.userAdd.namePlaceholder') ?>" value="<?= old('name')?>">
                            <div class="invalid-feedback"><?= session('errors.name') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastnameId"><?= lang('Cdr.userAdd.lastname') ?></label>
                            <input type="text" class="form-control <?= !session('errors.lastname') ?: 'is-invalid' ?>" id="lastnameId" name="lastname" placeholder="<?= lang('Cdr.userAdd.lastnamePlaceholder') ?>" value="<?= old('lastname')?>">
                            <div class="invalid-feedback"><?= session('errors.lastname') ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="passwordId"><?= lang('Cdr.userAdd.password') ?></label>
                            <input type="password" class="form-control <?= !session('errors.password') ?: 'is-invalid' ?>" id="passwordId" name="password" placeholder="<?= lang('Cdr.userAdd.passwordPlaceholder') ?>">
                            <div class="invalid-feedback"><?= session('errors.password') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpasswordId"><?= lang('Cdr.userAdd.confirmPass') ?></label>
                            <input type="password" class="form-control <?= !session('errors.cpassword') ?: 'is-invalid' ?>" id="cpasswordId" name="cpassword" placeholder="<?= lang('Cdr.userAdd.confirmPassPlaceholder') ?>">
                            <div class="invalid-feedback"><?= session('errors.cpassword') ?></div>
                        </div>
                    </div>       
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
						<button type="submit" class="btn btn-primary btn-default"><?= lang('Cdr.userAdd.submit') ?></button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>