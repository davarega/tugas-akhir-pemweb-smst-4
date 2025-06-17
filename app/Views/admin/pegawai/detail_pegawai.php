<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="mb-4 flex justify-between items-center">
		<div class="inline-flex items-center gap-2">
			<a href="/admin/pegawai" class="btn btn-ghost"><i class="bi bi-caret-left font-bold text-2xl"></i></a>
			<h1 class="text-3xl font-bold">User Profile</h1>
		</div>
		<a href="/admin/pegawai/edit/<?= $pegawai['id_pegawai']; ?>" class="btn btn-primary btn-outline"><i class="bi bi-pencil-square"></i>Edit</a>
	</div>
	<div class="card bg-base-100 shadow-xl rounded-xl p-6 space-y-4">
		<div class="md:flex gap-10">
			<div class="mb-10 md:mb-0 flex items-center w-full justify-center flex-col md:w-1/3">
				<div class="avatar">
					<div class="ring-primary ring-offset-base-100 w-24 rounded-full ring-2 ring-offset-2">
						<img src="<?= $pegawai['foto']; ?>" />
					</div>
				</div>
				<div class="mt-4 gap-1 flex flex-col items-center">
					<h3 class="text-lg font-bold"><?= $pegawai['nama_lengkap']; ?></h3>
					<p class="text-sm text-gray-500"><?= $pegawai['email']; ?></p>
					<p class="badge badge-outline badge-primary"><?= $pegawai['role']; ?></p>
				</div>
			</div>
			<div class="grid grid-cols-2 gap-4 w-full">
				<div>
					<div class="text-sm font-medium">Id Pegawai</div>
					<div class="text-xs opacity-60"><?= $pegawai['id_pegawai']; ?></div>
				</div>
				<div>
					<div class="text-sm font-medium">Jabatan</div>
					<div class="text-xs opacity-60"><?= $jabatan['nama_jabatan']; ?></div>
				</div>
				<div>
					<div class="text-sm font-medium">Nomor Handphone</div>
					<div class="text-xs opacity-60"><?= $pegawai['nomor_hp']; ?></div>
				</div>
				<div>
					<div class="text-sm font-medium">Jenis Kelamin</div>
					<div class="text-xs opacity-60"><?= $pegawai['jenis_kelamin'] == "L" ? "Laki laki" : "Perempuan"; ?></div>
				</div>
				<div>
					<div class="text-sm font-medium">Tempat Tanggal Lahir</div>
					<div class="text-xs opacity-60"><?= $pegawai['tempat_lahir']; ?>, <?= $pegawai['tanggal_lahir']; ?></div>
				</div>
				<div>
					<div class="text-sm font-medium">Alamat</div>
					<div class="text-xs opacity-60"><?= $pegawai['alamat']; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
