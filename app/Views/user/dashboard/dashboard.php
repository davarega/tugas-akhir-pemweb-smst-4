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
							<img src="/img/usersprofile/temp_profile.jpeg" />
						</div>
					</div>
					<div class="mt-4 gap-1 flex flex-col items-center">
						<h3 class="text-lg font-bold">Balerina Cappucina</h3>
						<p class="text-sm text-gray-500">brainrot@gmail.com</p>
						<p class="badge badge-outline badge-primary">Pegawai</p>
					</div>
				</div>
				<div class="grid grid-cols-2 gap-4 w-full">
					<div>
						<div class="text-sm font-medium">Id Pegawai</div>
						<div class="text-xs opacity-60">123456789</div>
					</div>
					<div>
						<div class="text-sm font-medium">Jabatan</div>
						<div class="text-xs opacity-60">Marketing Specialist</div>
					</div>
					<div>
						<div class="text-sm font-medium">Nomor Handphone</div>
						<div class="text-xs opacity-60">+62812345678910</div>
					</div>
					<div>
						<div class="text-sm font-medium">Jenis Kelamin</div>
						<div class="text-xs opacity-60">Perempuan</div>
					</div>
					<div>
						<div class="text-sm font-medium">Tempat Tanggal Lahir</div>
						<div class="text-xs opacity-60">Banyumas, 1/10/1999</div>
					</div>
					<div>
						<div class="text-sm font-medium">Alamat</div>
						<div class="text-xs opacity-60">Jl Kebangsaan No 123</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
