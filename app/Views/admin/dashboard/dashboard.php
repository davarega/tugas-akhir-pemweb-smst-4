<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<script type="module" src="https://unpkg.com/cally"></script>

<div class="p-4">
	<div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
		<div class="flex flex-col gap-4">
			<div class="stat shadow bg-base-100 rounded-box">
				<div class="stat-figure text-primary">
					<i class="bi bi-people text-3xl"></i>
				</div>
				<div class="stat-title">Total Semua Pegawai</div>
				<div class="stat-value text-primary">12.345</div>
				<div class="stat-desc">periode 1 Mei 2025</div>
			</div>
			<div class="stat shadow bg-base-100 rounded-box">
				<div class="stat-figure text-accent">
					<i class="bi bi-people text-3xl"></i>
				</div>
				<div class="stat-title">Total Pegawai Aktif</div>
				<div class="stat-value text-accent">12.234</div>
				<div class="stat-desc">periode 1 Mei 2025</div>
			</div>
			<div class="stat shadow bg-base-100 rounded-box">
				<div class="stat-figure text-warning">
					<i class="bi bi-people text-3xl"></i>
				</div>
				<div class="stat-title">Total Pegawai Cuti</div>
				<div class="stat-value text-warning">123</div>
				<div class="stat-desc">periode 1 Mei 2025</div>
			</div>
			<calendar-date class="cally bg-base-100 w-full border border-base-300 shadow-lg rounded-box">
				<svg aria-label="Previous" class="fill-current size-4" slot="previous" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path fill="currentColor" d="M15.75 19.5 8.25 12l7.5-7.5"></path>
				</svg>
				<svg aria-label="Next" class="fill-current size-4" slot="next" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path fill="currentColor" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
				</svg>
				<calendar-month></calendar-month>
			</calendar-date>
		</div>
		<div class="lg:col-span-2">
			<div class="card bg-base-100 shadow">
				<div class="flex justify-between p-4 pb-0">
					<h2 class="text-lg font-semibold">Statistik Pegawai</h2>
					<a href="<?= base_url('/admin/dashboard/pegawai'); ?>" class="btn btn-primary text-primary-content btn-sm">Lihat Semua</a>
				</div>
				<div class="divider px-4"></div>
				<div class="overflow-x-auto rounded-box shadow">
					<table class="table">
						<!-- head -->
						<thead>
							<tr>
								<th></th>
								<th>Id Pegawai</th>
								<th>Nama</th>
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
										<a href="#" class="btn btn-ghost btn-xs">details</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
