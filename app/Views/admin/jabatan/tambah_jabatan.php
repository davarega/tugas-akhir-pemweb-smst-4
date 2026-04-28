<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<div class="inline-flex">
			<a href="/admin/jabatan" class="btn btn-ghost">
				<i class="bi bi-caret-left font-bold text-2xl"></i>
			</a>
			<h1 class="text-3xl font-bold">Tambah Jabatan</h1>
		</div>
	</div>
	<form action="<?= base_url('/admin/jabatan/store'); ?>" method="post">
		<?= csrf_field() ?>
		<div class="card bg-base-100 shadow-xl rounded-xl p-6 space-y-4">
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Nama Jabatan</label>
				<input type="text" name="nama_jabatan" class="input input-bordered" value="<?= old('nama_jabatan'); ?>" />
			</div>
			<?= session('errors.nama_jabatan') ?>
			<div class="divider"></div>
			<div class="text-center mt-6">
				<button type="submit" class="btn btn-primary">Simpan Jabatan</button>
			</div>
		</div>
	</form>
</div>
<?= $this->endSection() ?>
