<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<h1 class="text-3xl font-bold">Data Pegawai</h1>
		<a href="/admin/pegawai/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i>Tambah Pegawai</a>
	</div>
	<div class="overflow-x-auto rounded-box shadow border border-black/20 bg-base-100">
		<table class="table">
			<!-- head -->
			<thead>
				<tr>
					<th></th>
					<th>ID Pegawai</th>
					<th>Nama Pegawai</th>
					<th>Role</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				<?php $i = 1; ?>
				<?php foreach ($pegawai as $p): ?>
					<tr>
						<th><?= $i++; ?></th>
						<td><?= $p['id_pegawai']; ?></td>
						<td><?= $p['nama_lengkap']; ?></td>
						<td>
							<?php if ($p['role'] == 'admin'): ?>
								<span class="badge badge-secondary">Admin</span>
							<?php else: ?>
								<span class="badge badge-primary">Pegawai</span>
							<?php endif; ?>
						<td>
							<a href="/admin/pegawai/<?= $p['id_pegawai']; ?>" class="btn btn-outline btn-primary"><i class="bi bi-eye"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?= $this->endSection() ?>
