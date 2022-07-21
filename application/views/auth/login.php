	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Hello, Welcome back</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="post" action="<?= base_url('auth'); ?>">
									<form>
										<div class="mb-3">
											<input class="form-control form-control-lg" value="<?= set_value('email'); ?>" type="email" name="email" placeholder="Enter your email" />
											<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="mb-3">
											<input class="form-control form-control-lg" value="<?= set_value('nama'); ?>" type="password" name="password" placeholder="Enter your password" />
											<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
											
										</div>
										<div>
											<label class="form-check">
            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
            <span class="form-check-label">
              Remember me next time
            </span>
          </label>
										</div>
										<div class="text-center mt-3">
										 <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
                                    <hr>
								<div class="text-center">
									<a class="small" href="<?= base_url(); ?>auth/registrasi">Belum punya akun?   Daftar!</a>
								</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	