<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Basic Form Controls</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
                            <span class="mt-2 d-block">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlPassword">Password</label>
                            <input type="password" class="form-control" id="exampleFormControlPassword" placeholder="Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>