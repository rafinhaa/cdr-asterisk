<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Novo usuário</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/users/add') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="emailId">E-mail</label>
                            <input type="email" class="form-control <?= !session('errors.email') ?: 'is-invalid' ?>" id="emailId" name="email" placeholder="Digite o e-mail" value="<?= old('email')?>">
                            <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usernameId">Usuário</label>
                            <input type="text" class="form-control <?= !session('errors.username') ?: 'is-invalid' ?>" id="usernameId" name="username" placeholder="Usuário" value="<?= old('username')?>">
                            <div class="invalid-feedback"><?= session('errors.username') ?></div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-md-6 mb-3">
                            <label for="namedId">Nome</label>
                            <input type="text" class="form-control <?= !session('errors.name') ?: 'is-invalid' ?>" id="namedId" name="name" placeholder="Nome" value="<?= old('name')?>">
                            <div class="invalid-feedback"><?= session('errors.name') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastnameId">Sobrenome</label>
                            <input type="text" class="form-control <?= !session('errors.lastname') ?: 'is-invalid' ?>" id="lastnameId" name="lastname" placeholder="Sobrenome" value="<?= old('lastname')?>">
                            <div class="invalid-feedback"><?= session('errors.lastname') ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="passwordId">Senha</label>
                            <input type="password" class="form-control <?= !session('errors.password') ?: 'is-invalid' ?>" id="passwordId" name="password" placeholder="Digite a senha">
                            <div class="invalid-feedback"><?= session('errors.password') ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cpasswordId">Confirmar senha</label>
                            <input type="password" class="form-control <?= !session('errors.cpassword') ?: 'is-invalid' ?>" id="cpasswordId" name="cpassword" placeholder="Confirme a senha">
                            <div class="invalid-feedback"><?= session('errors.cpassword') ?></div>
                        </div>
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