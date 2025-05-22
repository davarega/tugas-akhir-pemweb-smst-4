<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<h1>Ini halaman tambah pegawai</h1>
	<form action="<?= base_url('/admin/pegawai/store') ?>" method="post" enctype="multipart/form-data">
		<?= csrf_field() ?>

		<label>ID Pegawai</label><br>
		<input type="text" name="id_pegawai" value="<?= old('id_pegawai') ?>"><br>
		<?= session('errors.id_pegawai') ?><br><br>

		<label>Nama Lengkap</label><br>
		<input type="text" name="nama_lengkap" value="<?= old('nama_lengkap') ?>"><br>
		<?= session('errors.nama_lengkap') ?><br><br>

		<label>Email</label><br>
		<input type="email" name="email" value="<?= old('email') ?>"><br>
		<?= session('errors.email') ?><br><br>

		<label>Password</label><br>
		<input type="password" name="password"><br>
		<?= session('errors.password') ?><br><br>

		<label>Jabatan</label><br>
		<select name="id_jabatan">
			<option value="">-- Pilih Jabatan --</option>
			<?php foreach ($jabatans as $jabatan): ?>
				<option value="<?= $jabatan['id_jabatan'] ?>" <?= old('id_jabatan') == $jabatan['id_jabatan'] ? 'selected' : '' ?>>
					<?= $jabatan['nama_jabatan'] ?>
				</option>
			<?php endforeach; ?>
		</select><br>
		<?= session('errors.id_jabatan') ?><br><br>

		<label>Tempat Lahir</label><br>
		<input type="text" name="tempat_lahir" value="<?= old('tempat_lahir') ?>"><br>
		<?= session('errors.tempat_lahir') ?><br><br>

		<label>Tanggal Lahir</label><br>
		<input type="date" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>"><br>
		<?= session('errors.tanggal_lahir') ?><br><br>

		<label>Jenis Kelamin</label><br>
		<select name="jenis_kelamin">
			<option value="">-- Pilih --</option>
			<option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
			<option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : '' ?>>Perempuan</option>
		</select><br>
		<?= session('errors.jenis_kelamin') ?><br><br>

		<label>Alamat</label><br>
		<textarea name="alamat"><?= old('alamat') ?></textarea><br>
		<?= session('errors.alamat') ?><br><br>

		<label>Nomor HP</label><br>
		<input type="text" name="nomor_hp" value="<?= old('nomor_hp') ?>"><br>
		<?= session('errors.nomor_hp') ?><br><br>

		<label>Foto Profil</label><br>
		<input type="file" name="foto"><br>
		<?= session('errors.foto') ?><br><br>

		<label>Role</label><br>
		<select name="role">
			<option value="pegawai" <?= old('role') == 'pegawai' ? 'selected' : '' ?>>Pegawai</option>
			<option value="admin" <?= old('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
		</select><br>
		<?= session('errors.role') ?><br><br>

		<button type="submit">Simpan</button>
	</form>
</div>
<?= $this->endSection() ?>
