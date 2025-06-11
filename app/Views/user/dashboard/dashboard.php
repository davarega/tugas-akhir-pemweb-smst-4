<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>

<div class="p-4">
	<div class="card bg-base-100 shadow">
		<div class="card-body">
			<h2 class="card-title">User Profile</h2>
			<div class="divider"></div>
			<div class="md:flex gap-10">
				<div class="mb-10 md:mb-0 flex items-center w-full justify-center flex-col md:w-1/3">
					<div class="avatar">
						<div class="ring-primary ring-offset-base-100 w-24 rounded-full ring-2 ring-offset-2">
							<img src="<?= $user['foto']; ?>" />
						</div>
					</div>
					<div class="mt-4 gap-1 flex flex-col items-center">
						<h3 class="text-lg font-bold"><?= $user['nama_lengkap']; ?></h3>
						<p class="text-sm text-gray-500"><?= $user['email']; ?></p>
						<p class="badge badge-outline badge-primary"><?= $user['role']; ?></p>
					</div>
				</div>
				<div class="grid grid-cols-2 gap-4 w-full">
					<div>
						<div class="text-sm font-medium">Id Pegawai</div>
						<div class="text-xs opacity-60"><?= $user['id_pegawai']; ?></div>
					</div>
					<div>
						<div class="text-sm font-medium">Jabatan</div>
						<div class="text-xs opacity-60"><?= $jabatan['nama_jabatan']; ?></div>
					</div>
					<div>
						<div class="text-sm font-medium">Nomor Handphone</div>
						<div class="text-xs opacity-60"><?= $user['nomor_hp']; ?></div>
					</div>
					<div>
						<div class="text-sm font-medium">Jenis Kelamin</div>
						<div class="text-xs opacity-60"><?= $user['jenis_kelamin'] == "L" ? "Laki laki" : "Perempuan"; ?></div>
					</div>
					<div>
						<div class="text-sm font-medium">Tempat Tanggal Lahir</div>
						<div class="text-xs opacity-60"><?= $user['tempat_lahir']; ?>, <?= $user['tanggal_lahir']; ?></div>
					</div>
					<div>
						<div class="text-sm font-medium">Alamat</div>
						<div class="text-xs opacity-60"><?= $user['alamat']; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
