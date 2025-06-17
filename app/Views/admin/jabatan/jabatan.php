<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<h1 class="text-3xl font-bold">Data Cuti</h1>
	</div>
	<div class="overflow-x-auto rounded-box shadow border border-black/20 bg-base-100">
		<table class="table">
			<!-- head -->
			<thead>
				<tr>
					<th></th>
					<th>Id Jabatan</th>
					<th>Nama Jabatan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				<?php $i = 1; ?>
				<?php foreach ($jabatans as $j): ?>
					<tr>
						<th><?= $i++; ?></th>
						<td><?= $j['id_jabatan']; ?></td>
						<td><?= $j['nama_jabatan']; ?></td>
						<td>
							<a href="/admin/jabatan/<?= $j['id_jabatan']; ?>" class="btn btn-outline btn-primary"><i class="bi bi-eye"></i></a>
							<a href="/admin/jabatan/edit/<?= $j['id_jabatan']; ?>" class="btn btn-outline btn-secondary"><i class="bi bi-pencil"></i></a>
							<form action="/admin/jabatan/delete/<?= $j['id_jabatan']; ?>" method="post" style="display:inline;">
								<?= csrf_field() ?>
								<button type="submit" class="btn btn-outline btn-error" onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan ini?')"><i class="bi bi-trash"></i></button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?= $this->endSection() ?>
