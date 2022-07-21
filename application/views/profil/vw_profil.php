<div class="mb-3">
		<h1 class="h3 d-inline align-middle"><?= $title; ?></h1>
			</div>
                    <div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0"><?= $user['nama']; ?></h5>
                                    <h3 class="card-title mb-0"><?= $user['email']; ?></h3>
									<div class="text-muted mb-2">Member Since <?= date('d F Y', $user['date_created']); ?></div>
								</div>