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
					<th>jenis Cuti</th>
					<th>Jumlah Hari</th>
					<th>Tanggal Mulai</th>
					<th>Status</th>
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
						<td><?= $p['jenis']; ?></td>
						<td><?= $p['jumlah_hari']; ?></td>
						<td><?= $p['tanggal_mulai']; ?></td>
						<td>
							<?php if ($p['status'] == 'diajukan'): ?>
								<span class="badge badge-warning">Menunggu</span>
							<?php elseif ($p['status'] == 'disetujui'): ?>
								<span class="badge badge-success">Disetujui</span>
							<?php elseif ($p['status'] == 'ditolak'): ?>
								<span class="badge badge-error">Ditolak</span>
							<?php endif; ?>
						<td>
							<a href="/dashboard/cuti/<?= $p['id_cuti']; ?>" class="btn btn-outline btn-primary"><i class="bi bi-eye"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?= $this->endSection(); ?>
