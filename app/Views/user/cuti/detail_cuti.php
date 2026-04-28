<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<div class="inline-flex">
			<a href="/dashboard/cuti" class="btn btn-ghost"><i class="bi bi-caret-left font-bold text-2xl"></i></a>
			<h1 class="text-3xl font-bold">Detail Cuti</h1>
		</div>
		<!-- <a href="/dashboard/cuti/delete/<?= $cuti['id_cuti']; ?>" class="btn btn-error btn-outline"><i class="bi bi-trash"></i>Hapus</a> -->
		<label for="modal-<?= $cuti['id_cuti']; ?>" class="btn btn-error btn-outline">
			<i class="bi bi-trash"></i>Hapus
		</label>
		<input type="checkbox" id="modal-<?= $cuti['id_cuti']; ?>" class="modal-toggle" />
		<div class="modal" role="dialog">
			<div class="modal-box">
				<h3 class="font-bold text-lg text-red-600">Konfirmasi Hapus</h3>
				<p class="py-4">Apakah kamu yakin ingin menghapus data cuti ini?</p>
				<div class="modal-action">
					<!-- Tombol batal -->
					<label for="modal-<?= $cuti['id_cuti']; ?>" class="btn">Batal</label>

					<!-- Form hapus -->
					<form action="<?= base_url('/dashboard/cuti/delete/' . $cuti['id_cuti']); ?>" method="post" class="inline">
						<?= csrf_field() ?>
						<button type="submit" class="btn btn-error">Ya, Hapus</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<form action="/dashboard/cuti/update/<?= $cuti['id_cuti']; ?>" method="post">
		<div class="card bg-base-100 shadow-xl rounded-xl p-6 space-y-4">

			<!-- ID Cuti -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">ID Cuti</label>
				<input disabled type="text" name="id_cuti" class="input input-bordered" value="<?= $cuti['id_cuti']; ?>" readonly />
			</div>

			<!-- Status -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Status</label>
				<input disabled type="text" name="id_cuti" class="input input-bordered" value="<?= $cuti['status']; ?>" readonly />
			</div>

			<div class="divider"></div>

			<!-- Jenis Cuti -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Jenis Cuti</label>
				<select name="jenis" class="select select-bordered">
					<option <?= $cuti['jenis'] === 'tahunan' ? 'selected' : '' ?>>tahunan</option>
					<option <?= $cuti['jenis'] === 'sakit' ? 'selected' : '' ?>>sakit</option>
					<option <?= $cuti['jenis'] === 'ijin' ? 'selected' : '' ?>>ijin</option>
					<option <?= $cuti['jenis'] === 'melahirkan' ? 'selected' : '' ?>>melahirkan</option>
					<option <?= $cuti['jenis'] === 'lainnya' ? 'selected' : '' ?>>lainnya</option>
				</select>
			</div>

			<!-- Tanggal Mulai -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Tanggal Mulai</label>
				<input type="date" name="tanggal_mulai" class="input input-bordered" value="<?= $cuti['tanggal_mulai']; ?>" />
			</div>

			<!-- Tanggal Selesai -->
			<div class="grid grid-cols-2 items-center gap-4">
				<label class="font-semibold text-left">Tanggal Selesai</label>
				<input type="date" name="tanggal_selesai" class="input input-bordered" value="<?= $cuti['tanggal_selesai']; ?>" />
			</div>

			<!-- Keterangan -->
			<div class="grid grid-cols-2 items-start gap-4">
				<label class="font-semibold text-left mt-2">Keterangan</label>
				<textarea name="keterangan" class="textarea textarea-bordered"><?= $cuti['keterangan']; ?></textarea>
			</div>

			<div class="divider"></div>

			<!-- Tombol Submit -->
			<div class="text-center mt-6">
				<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
			</div>
		</div>
	</form>

</div>
<?= $this->endSection() ?>
