<?= $this->extend('layouts/dashboard_template') ?>

<?= $this->section('content') ?>
<div class="p-4">
	<div class="overflow-x-auto rounded-box shadow border border-black/20 bg-base-100">
		<table class="table">
			<!-- head -->
			<thead>
				<tr>
					<th></th>
					<th>Nama</th>
					<th>NIP</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				<tr>
					<th>1</th>
					<td>Cy Ganderton</td>
					<td>Quality Control Specialist</td>
					<td>
						<a href="#" class="btn btn-ghost btn-xs">details</a>
					</td>
				</tr>
				<!-- row 2 -->
				<tr>
					<th>2</th>
					<td>Hart Hagerty</td>
					<td>Desktop Support Technician</td>
					<td>Purple</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?= $this->endSection() ?>
