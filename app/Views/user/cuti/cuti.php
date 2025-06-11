<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<h1 class="text-3xl font-bold">Data Cuti</h1>
		<a href="/dashboard/cuti/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i>Tambah Cuti</a>
	</div>
	<div class="overflow-x-auto rounded-box shadow border border-black/20 bg-base-100">
		<table class="table">
			<!-- head -->
			<thead>
				<tr>
					<th></th>
					<th>ID Cuti</th>
					<th>Nama Cuti</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				<?php $i = 1; ?>
				<?php foreach ($cuti as $p): ?>
					<tr>
						<th><?= $i++; ?></th>
						<td><?= $p['id_cuti']; ?></td>
						<td><?= $p['nama_lengkap']; ?></td>
						<td>
							<a href="/admin/cuti/<?= $p['id_cuti']; ?>" class="btn btn-ghost btn-xs">details</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?= $this->endSection(); ?>
