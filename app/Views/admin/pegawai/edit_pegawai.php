<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-6">
	<div class="mb-4 flex justify-between items-center">
		<div class="inline-flex items-center gap-2">
			<a href=<?= base_url('/admin/pegawai/' . $pegawai['id_pegawai']) ?> class="btn btn-ghost">
				<i class="bi bi-caret-left text-2xl font-bold"></i>
			</a>
			<h1 class="text-3xl font-bold">Edit Pegawai</h1>
		</div>
		<!-- <a href="/admin/pegawai/delete/<?= $pegawai['id_pegawai']; ?>" class="btn btn-error btn-outline"><i class="bi bi-trash"></i>Hapus</a> -->
		<label for="modal-<?= $pegawai['id_pegawai']; ?>" class="btn btn-error btn-outline">
			<i class="bi bi-trash"></i>Hapus
		</label>
		<input type="checkbox" id="modal-<?= $pegawai['id_pegawai']; ?>" class="modal-toggle" />
		<div class="modal" role="dialog">
			<div class="modal-box">
				<h3 class="font-bold text-lg text-red-600">Konfirmasi Hapus</h3>
				<p class="py-4">Apakah kamu yakin ingin menghapus pegawai <strong><?= $pegawai['nama_lengkap']; ?></strong>?</p>
				<div class="modal-action">
					<!-- Tombol batal -->
					<label for="modal-<?= $pegawai['id_pegawai']; ?>" class="btn">Batal</label>

					<!-- Form hapus -->
					<form action="<?= base_url('/admin/pegawai/delete/' . $pegawai['id_pegawai']); ?>" method="post" class="inline">
						<?= csrf_field() ?>
						<button type="submit" class="btn btn-error">Ya, Hapus</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<form action="<?= base_url('/admin/pegawai/update/' . $pegawai['id_pegawai']) ?>" method="post" enctype="multipart/form-data" class="space-y-4">
		<?= csrf_field() ?>
		<!-- <input type="hidden" name="_method" value="PUT"> -->

		<div class="card bg-base-100 shadow-xl rounded-xl p-6 space-y-4">
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">ID Pegawai</label>
				<input disabled readonly type="text" name="id_pegawai" class="input input-bordered w-full" value="<?= old('id_pegawai') ?? $pegawai['id_pegawai'] ?>">
			</div>
			<?= session('errors.id_pegawai') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Nama Lengkap</label>
				<input type="text" name="nama_lengkap" class="input input-bordered w-full" value="<?= old('nama_lengkap') ?? $pegawai['nama_lengkap'] ?>">
			</div>
			<?= session('errors.nama_lengkap') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Email</label>
				<input type="email" name="email" class="input input-bordered w-full" value="<?= old('email') ?? $pegawai['email'] ?>">
			</div>
			<?= session('errors.email') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Password (opsional)</label>
				<input type="password" name="password" class="input input-bordered w-full" placeholder="Kosongkan jika tidak ingin diubah">
			</div>
			<?= session('errors.password') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Jabatan</label>
				<select name="id_jabatan" class="select select-bordered w-full">
					<option value="">-- Pilih Jabatan --</option>
					<?php foreach ($jabatans as $jabatan): ?>
						<option value="<?= $jabatan['id_jabatan'] ?>" <?= (old('id_jabatan') ?? $pegawai['id_jabatan']) == $jabatan['id_jabatan'] ? 'selected' : '' ?>>
							<?= $jabatan['nama_jabatan'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<?= session('errors.id_jabatan') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Tempat Lahir</label>
				<input type="text" name="tempat_lahir" class="input input-bordered w-full" value="<?= old('tempat_lahir') ?? $pegawai['tempat_lahir'] ?>">
			</div>
			<?= session('errors.tempat_lahir') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" class="input input-bordered w-full" value="<?= old('tanggal_lahir') ?? $pegawai['tanggal_lahir'] ?>">
			</div>
			<?= session('errors.tanggal_lahir') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Jenis Kelamin</label>
				<select name="jenis_kelamin" class="select select-bordered w-full">
					<option value="">-- Pilih --</option>
					<option value="L" <?= (old('jenis_kelamin') ?? $pegawai['jenis_kelamin']) == 'L' ? 'selected' : '' ?>>Laki-laki</option>
					<option value="P" <?= (old('jenis_kelamin') ?? $pegawai['jenis_kelamin']) == 'P' ? 'selected' : '' ?>>Perempuan</option>
				</select>
			</div>
			<?= session('errors.jenis_kelamin') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Alamat</label>
				<textarea name="alamat" class="textarea textarea-bordered w-full"><?= old('alamat') ?? $pegawai['alamat'] ?></textarea>
			</div>
			<?= session('errors.alamat') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Nomor HP</label>
				<input type="text" name="nomor_hp" class="input input-bordered w-full" value="<?= old('nomor_hp') ?? $pegawai['nomor_hp'] ?>">
			</div>
			<?= session('errors.nomor_hp') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Foto Profil (opsional)</label>
				<input type="file" name="foto" class="file-input file-input-bordered w-full">
			</div>
			<?= session('errors.foto') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Role</label>
				<select name="role" class="select select-bordered w-full">
					<option value="pegawai" <?= (old('role') ?? $pegawai['role']) == 'pegawai' ? 'selected' : '' ?>>Pegawai</option>
					<option value="admin" <?= (old('role') ?? $pegawai['role']) == 'admin' ? 'selected' : '' ?>>Admin</option>
				</select>
			</div>
			<?= session('errors.role') ?>

			<div class="flex justify-end">
				<button type="submit" class="btn btn-primary">Perbarui</button>
			</div>
		</div>
	</form>
</div>
<?= $this->endSection() ?>
