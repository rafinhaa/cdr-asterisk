<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Basic Form Controls</h2>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/users/add') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="emailId">E-mail</label>
                                <input type="email" class="form-control" id="emailId" name="email"placeholder="Digite o e-mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="namedId">Nome</label>
                                <input type="text" class="form-control" id="namedId" name="name" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="lastnameId">Sobrenome</label>
                                <input type="text" class="form-control" id="lastnameId" name="lastname" placeholder="Sobrenome">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="passwordId">Senha</label>
                                <input type="password" class="form-control" id="passwordId" name="password" placeholder="Digite a senha">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="cpasswordId">Confirmar senha</label>
                                <input type="password" class="form-control" id="cpasswordId" name="cpassword" placeholder="Confirme a senha">
                            </div>
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