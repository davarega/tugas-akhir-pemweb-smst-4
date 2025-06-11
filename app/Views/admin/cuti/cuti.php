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
					<th>Nama Pegawai</th>
					<th>Status</th>
					<th>Jenis Cuti</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Selesai</th>
					<th>Alasan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				<?php $i = 1; ?>
				<?php foreach ($cuti as $c): ?>
					<tr>
						<th><?= $c['id_cuti']; ?></th>
						<td><?= $c['nama_lengkap']; ?></td>
						<td class="text-nowrap">
							<?php if ($c['status'] == 'disetujui'): ?>
								<span class="badge badge-success">Disetujui</span>
							<?php elseif ($c['status'] == 'ditolak'): ?>
								<span class="badge badge-error">Ditolak</span>
							<?php else: ?>
								<span class="badge badge-warning">Menunggu Persetujuan</span>
							<?php endif; ?>
						</td>
						<td><?= $c['jenis']; ?></td>
						<td><?= date('d-m-Y', strtotime($c['tanggal_mulai'])); ?></td>
						<td><?= date('d-m-Y', strtotime($c['tanggal_selesai'])); ?></td>
						<td><?= $c['keterangan']; ?></td>
						<td>
							<!-- <a href="/admin/cuti/<?= $c['id_cuti']; ?>" class="btn btn-ghost btn-xs">details</a> -->
							<form action="cuti/approve/<?= $c["id_cuti"]; ?>" method="post" style="display:inline;">
								<button class="btn btn-sm btn-soft btn-success" type="submit">Terima</button>
							</form>
							<form action="cuti/reject/<?= $c["id_cuti"]; ?>" method="post" style="display:inline;">
								<button class="btn btn-sm btn-soft btn-error" type="submit">Tolak</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?= $this->endSection() ?>
