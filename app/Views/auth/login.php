<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<div class="relative flex flex-col justify-center items-center h-screen overflow-hidden">
	<form method="post" action="auth/login" class="bg-white p-6 rounded shadow-md w-96">
		<h2 class="text-2xl font-bold mb-4">Login Pegawai</h2>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<div class="mb-4">
			<label for="id_pegawai" class="block font-semibold">Id Pegawai</label>
			<input type="text" name="id_pegawai" id="id_pegawai" class="input input-bordered w-full" required>
		</div>

		<div class="mb-4">
			<label for="password" class="block font-semibold">Password</label>
			<input type="password" name="password" id="password" class="input input-bordered w-full" required>
		</div>

		<button type="submit" class="btn btn-primary w-full">Login</button>
	</form>
</div>
<?= $this->endSection() ?>
