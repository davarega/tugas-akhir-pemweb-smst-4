<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-6">
	<div class="flex justify-between items-center mb-4">
		<div class="inline-flex items-center gap-2">
			<a href="/admin/pegawai" class="btn btn-ghost"><i class="bi bi-caret-left font-bold text-2xl"></i></a>
			<h1 class="text-3xl font-bold">Form Tambah Pegawai</h1>
		</div>
	</div>

	<form action="<?= base_url('/admin/pegawai/store') ?>" method="post" enctype="multipart/form-data" class="space-y-4">
		<?= csrf_field() ?>

		<div class="card bg-base-100 shadow-xl rounded-xl p-6 space-y-4">
			<!-- Grid Form -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">ID Pegawai</label>
				<input type="text" name="id_pegawai" class="input input-bordered w-full" value="<?= old('id_pegawai') ?>">
			</div>
			<?= session('errors.id_pegawai') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Nama Lengkap</label>
				<input type="text" name="nama_lengkap" class="input input-bordered w-full" value="<?= old('nama_lengkap') ?>">
			</div>
			<?= session('errors.nama_lengkap') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Email</label>
				<input type="email" name="email" class="input input-bordered w-full" value="<?= old('email') ?>">
			</div>
			<?= session('errors.email') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Password</label>
				<input type="password" name="password" class="input input-bordered w-full">
			</div>
			<?= session('errors.password') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Jabatan</label>
				<select name="id_jabatan" class="select select-bordered w-full">
					<option value="">-- Pilih Jabatan --</option>
					<?php foreach ($jabatans as $jabatan): ?>
						<option value="<?= $jabatan['id_jabatan'] ?>" <?= old('id_jabatan') == $jabatan['id_jabatan'] ? 'selected' : '' ?>>
							<?= $jabatan['nama_jabatan'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<?= session('errors.id_jabatan') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Tempat Lahir</label>
				<input type="text" name="tempat_lahir" class="input input-bordered w-full" value="<?= old('tempat_lahir') ?>">
			</div>
			<?= session('errors.tempat_lahir') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" class="input input-bordered w-full" value="<?= old('tanggal_lahir') ?>">
			</div>
			<?= session('errors.tanggal_lahir') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Jenis Kelamin</label>
				<select name="jenis_kelamin" class="select select-bordered w-full">
					<option value="">-- Pilih --</option>
					<option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
					<option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : '' ?>>Perempuan</option>
				</select>
			</div>
			<?= session('errors.jenis_kelamin') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Alamat</label>
				<textarea name="alamat" class="textarea textarea-bordered w-full"><?= old('alamat') ?></textarea>
			</div>
			<?= session('errors.alamat') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Nomor HP</label>
				<input type="text" name="nomor_hp" class="input input-bordered w-full" value="<?= old('nomor_hp') ?>">
			</div>
			<?= session('errors.nomor_hp') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Foto Profil</label>
				<input type="file" name="foto" class="file-input file-input-bordered w-full">
			</div>
			<?= session('errors.foto') ?>

			<div class="grid grid-cols-2 items-center gap-4">
				<label class="text-left font-semibold">Role</label>
				<select name="role" class="select select-bordered w-full">
					<option value="pegawai" <?= old('role') == 'pegawai' ? 'selected' : '' ?>>Pegawai</option>
					<option value="admin" <?= old('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
				</select>
			</div>
			<?= session('errors.role') ?>

			<div class="flex justify-end">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</form>
</div>
<?= $this->endSection() ?>
