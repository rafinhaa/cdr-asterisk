<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
	<div class="bg-white border rounded">
		<div class="row no-gutters">
			<div class="col-lg-4 col-xl-3">
				<div class="profile-content-left profile-left-spacing pt-5 pb-3 px-3 px-xl-5">
					<div class="card text-center widget-profile px-0 border-0">
						<div class="card-img mx-auto rounded-circle">
							<img src="<?= base_url('assets/img/user/user.png') ?>" style="max-width:90px;  max-height:90px; width: auto; height: auto; " alt="user image">
						</div>
						<div class="card-body">
							<h4 class="py-2 text-dark"><p><?= $user->getFullName() ?></p></h4>
							<p><?= $user->email ?></p>
						</div>
					</div>
					<hr class="w-100">
				</div>
			</div>
			<div class="col-lg-8 col-xl-9">
				<div class="profile-content-right profile-right-spacing py-5">
					<ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true"><?= lang('Cdr.userProfile.settings') ?></a>							
						</li>
					</ul>
					<div class="tab-content px-3 px-xl-5" id="myTabContent">
						<div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="settings-tab">
							<div class="tab-pane-content mt-5">
								<form action="<?= base_url('users/profile/'.$user->id)?>" method="post">
									<?= csrf_field() ?>
									<div class="form-group row mb-6">
										<label for="coverImage" class="col-sm-4 col-lg-2 col-form-label"><?= lang('Cdr.userProfile.image') ?></label>
										<div class="col-sm-8 col-lg-10">
											<div class="custom-file mb-1">
												<input type="file" class="custom-file-input" id="coverImage">
												<label class="custom-file-label" for="coverImage"><?= lang('Cdr.userProfile.image.choose') ?></label>
												<div class="invalid-feedback">Example invalid custom file feedback</div>
											</div>
										</div>
									</div>
									<div class="row mb-2">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="firstName"><?= lang('Cdr.userProfile.name') ?></label>
												<input type="text" class="form-control <?= !session('errors.name') ?: 'is-invalid' ?>" name="name" value="<?= old('name') ? old('name') : $user->name ?>">
												<div class="invalid-feedback"><?= session('errors.name') ?></div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="lastName"><?= lang('Cdr.userProfile.lastname') ?></label>
												<input type="text" class="form-control <?= !session('errors.lastname') ?: 'is-invalid' ?>" name="lastname" value="<?= old('lastname') ? old('lastname') : $user->lastname ?>">
												<div class="invalid-feedback"><?= session('errors.lastname') ?></div>
											</div>
										</div>
									</div>
									<div class="form-group mb-4">
										<label for="userName"><?= lang('Cdr.userProfile.user') ?></label>
										<input type="text" class="form-control <?= !session('errors.username') ?: 'is-invalid' ?>" name="username" value="<?= old('username') ? old('username') : $user->username ?>" disabled>
										<div class="invalid-feedback"><?= session('errors.username') ?></div>
									</div>
									<div class="form-group mb-4">
										<label for="email"><?= lang('Cdr.userProfile.email') ?></label>
										<input type="email" class="form-control <?= !session('errors.email') ?: 'is-invalid' ?>" name="email" value="<?= old('email') ? old('email') : $user->email ?>" disabled>
										<div class="invalid-feedback"><?= session('errors.email') ?></div>
									</div>
									<div class="form-group mb-4">
										<label for="newPassword"><?= lang('Cdr.userProfile.newPassword') ?></label>
										<input type="password" class="form-control <?= !session('errors.password') ?: 'is-invalid' ?>" id="newPassword" name="password">
										<div class="invalid-feedback"><?= session('errors.password') ?></div>
									</div>
									<div class="form-group mb-4">
										<label for="cpassword"><?= lang('Cdr.userProfile.newPasswordConfirm') ?></label>
										<input type="password" class="form-control <?= !session('errors.cpassword') ?: 'is-invalid' ?>" id="cpassword" name="cpassword">
										<div class="invalid-feedback"><?= session('errors.cpassword') ?></div>
									</div>
									<input type="hidden" name="id" value="<?= !isset($user->id) ?: $user->id ?>">
									<div class="d-flex justify-content-end mt-5">
										<button type="submit" class="btn btn-primary mb-2 btn-pill"><?= lang('Cdr.userProfile.update') ?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Content -->
<?= $this->endSection() ?>