<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="flex justify-between items-center mb-4">
		<h1 class="text-2xl font-bold">Data Cuti</h1>
	</div>
	<div class="overflow-x-auto rounded-box shadow border border-black/20 bg-base-100">
		<table class="table">
			<!-- head -->
			<thead>
				<tr>
					<th></th>
					<th>ID Cuti</th>
					<th>Nama Pegawai</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				<?php $i = 1; ?>
				<?php foreach ($cuti as $c): ?>
					<tr>
						<th><?= $i++; ?></th>
						<td><?= $c['id_cuti']; ?></td>
						<td><?= $c['nama_lengkap']; ?></td>
						<td>
							<a href="/admin/cuti/<?= $c['id_cuti']; ?>" class="btn btn-ghost btn-xs">details</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?= $this->endSection() ?>
