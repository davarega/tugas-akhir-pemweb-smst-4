<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<div class="inline-flex">
			<a href="/admin/jabatan" class="btn btn-ghost">
				<i class="bi bi-caret-left font-bold text-2xl"></i>
			</a>
			<h1 class="text-3xl font-bold">Detail Jabatan</h1>
		</div>
		<div>
			<label for="modal-<?= $jabatan['id_jabatan']; ?>" class="btn btn-error btn-outline">
				<i class="bi bi-trash"></i> Hapus
			</label>
			<input type="checkbox" id="modal-<?= $jabatan['id_jabatan']; ?>" class="modal-toggle" />
			<div class="modal" role="dialog">
				<div class="modal-box">
					<h3 class="font-bold text-lg text-red-600">Konfirmasi Hapus</h3>
					<p class="py-4">Apakah kamu yakin ingin menghapus data jabatan ini?</p>
					<div class="modal-action">
						<!-- Tombol batal -->
						<label for="modal-<?= $jabatan['id_jabatan']; ?>" class="btn">Batal</label>
						<!-- Form hapus -->
						<form action="<?= base_url('/admin/jabatan/delete/' . $jabatan['id_jabatan']); ?>" method="post" class="inline">
							<?= csrf_field() ?>
							<button type="submit" class="btn btn-error">Ya, Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="<?= base_url('/admin/jabatan/update/' . $jabatan['id_jabatan']); ?>" method="post">
		<div class="card bg-base-100 shadow-xl rounded-xl p-6 space-y-4">

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">ID Jabatan</label>
				<input disabled type="text" name="id_jabatan" class="input input-bordered" value="<?= $jabatan['id_jabatan']; ?>" readonly />
			</div>
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Jumlah Pegawai</label>
				<input disabled type="text" name="id_jabatan" class="input input-bordered" value="<?= $jumlah_pegawai; ?>" readonly />
			</div>
			<div class="divider"></div>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Nama Jabatan</label>
				<input type="text" name="nama_jabatan" class="input input-bordered" value="<?= $jabatan['nama_jabatan']; ?>" />
			</div>
			<div class="divider"></div>

			<div class="text-center mt-6">
				<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
			</div>
		</div>
	</form>

	<?php if ($jumlah_pegawai > 0): ?>
		<div class="mt-6">
			<h2 class="text-xl font-bold mb-4">Daftar Pegawai dengan Jabatan Ini</h2>
			<div class="overflow-x-auto rounded-box shadow border border-black/20 bg-base-100">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Pegawai</th>
							<th>Nama Pegawai</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($pegawai_list as $p): ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $p['id_pegawai']; ?></td>
								<td><?= $p['nama_lengkap']; ?></td>
								<td>
									<a href="/admin/pegawai/<?= $p['id_pegawai']; ?>" class="btn btn-outline btn-primary btn-sm">
										<i class="bi bi-eye"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php endif; ?>
</div>
<?= $this->endSection() ?>
