<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<div class="inline-flex">
			<a href="/dashboard/cuti" class="btn btn-ghost"><i class="bi bi-caret-left font-bold text-2xl"></i></a>
			<h1 class="text-3xl font-bold">Ajukan Cuti</h1>
		</div>
	</div>
	<form action="<?= base_url('/dashboard/cuti/store') ?>" method="post" enctype="multipart/form-data">
		<?= csrf_field() ?>

		<div class="card bg-base-100 shadow-xl rounded-xl p-6 space-y-4">
			<!-- Jenis Cuti -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Jenis Cuti</label>
				<select class="select validator" name="jenis" required>
					<option disabled selected value="">Pilih jenis cuti</option>
					<option value="tahunan">tahunan</option>
					<option value="sakit">sakit</option>
					<option value="ijin">ijin</option>
					<option value="melahirkan">melahirkan</option>
					<option value="lainnya">lainnya</option>
				</select>
				<?= session('errors.jenis') ?>
			</div>

			<!-- Tanggal Mulai -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Tanggal Mulai</label>
				<input type="date" name="tanggal_mulai" class="input input-bordered" required />
				<?= session('errors.tanggal_mulai') ?>
			</div>

			<!-- Tanggal Selesai -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Tanggal Selesai</label>
				<input type="date" name="tanggal_selesai" class="input input-bordered" required />
				<?= session('errors.tanggal_selesai') ?>
			</div>

			<!-- Keterangan -->
			<div class="grid grid-cols-2 items-start gap-4">
				<label class="font-semibold text-left mt-2">Keterangan</label>
				<textarea name="keterangan" class="textarea textarea-bordered" placeholder="Contoh: alasan cuti..." required></textarea>
				<?= session('errors.keterangan') ?>
			</div>

			<!-- Status Otomatis -->
			<input type="hidden" name="status" value="diajukan" />

			<!-- Tombol Ajukan -->
			<div class="text-center mt-6">
				<button type="submit" class="btn btn-primary">Ajukan Cuti</button>
			</div>
		</div>
	</form>
</div>
<?= $this->endSection() ?>
