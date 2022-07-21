<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"><?php echo $judul; ?></h1>

					</div>
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Form Tambah Data Menu</h5>
								</div>
								<div class="card-body">
                                    <form action=" " method="POST">
                                        <div class="form-group">
                                            <label for="nama" class="text-success">Nama</label>
									        <input type="text" name="nama" class="form-control" placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="stok" class="text-success">Stok</label>
									        <input type="text" name="stok" class="form-control" placeholder="Stok">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class="text-success">Harga</label>
									        <input type="text" name="harga" class="form-control" placeholder="Harga">
                                        </div>
										<div class="form-group">
										    <label for="gambar" class="text-success">Gambar</label>
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="gambar" id="gambar">
												
											</div>
										</div>
                                    
                                        <br>

                                        <a href="<?= base_url('Menu') ?>" class="btn btn-danger">Tutup</a>
						                <button type="submit" name="tambah" class="btn btn-dark float-right">Tambah Coffee</button>
                                    </form>
								</div>
							</div>
                    </div>

</main>