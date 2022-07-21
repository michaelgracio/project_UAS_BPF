<main class="content">
	<div class="container-fluid p-0">
	<?= $this->session->flashdata('message');?>
		<h1 class="h3 mb-3"><?php echo $judul; ?></h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a href="<?= base_url(); ?>Menu/tambah" class="text-info">Tambah Menu</h5>
							<div class="row">
								<div class="col-12 col-lg-8 col-xxl-9 d-flex">
									<div class="card flex-fill">
										<table class="table table-hover my-0">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Stok</th>
													<th>Harga</th>
													<th>Gambar</th>
													<th>Aksi</th>

												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($menu as $us) : ?>
												<tr>
													<td> <?= $i; ?>.</td>
													<td><?= $us['nama']; ?></td>
													<td><?= $us['stok']; ?></td>
													<td><?= $us['harga']; ?></td>
													<td><img src="<?= base_url('assets/img/coffee/') . $us['gambar']; ?>" style="width:100px" class="img-thumbnail"></td>
													<td>
														<a href="<?= base_url('Menu/hapus/') . $us['id']; ?>"
															class="badge bg-danger">Delete</a>
														<a href="<?= base_url('Menu/edit/') . $us['id']; ?>"
															class="badge bg-warning">Edit</a>
													</td>
												</tr>
												<?php $i++; ?>
												<?php endforeach; ?>
										</table>
									</div>
									<div class="card-body">
									</div>
								</div>
							</div>
					</div>

				</div>
</main>