<!DOCTYPE html>
<html lang="en" data-theme="skynara">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

	<link rel="stylesheet" href="/css/style.css">
	<!-- Bootstrap Icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
	<!-- Calender -->
	<script type="module" src="https://unpkg.com/cally"></script>
	<!-- Chart -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<title><?= $title ?? "SIMPEG"; ?></title>
</head>

<body class="bg-base-200 min-h-screen">
	<div class="drawer bg-base-200 mx-auto max-w-[100rem] lg:drawer-open">
		<input id="my-drawer" type="checkbox" class="drawer-toggle" />
		<div class="drawer-content">
			<?= $this->include('layouts/components/dashboard_navbar'); ?>
			<!-- Page content here -->
			<?= $this->renderSection('content') ?>
		</div>
		<div class="drawer-side">
			<label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
			<!-- Sidebar content here -->
			<div class="flex flex-col h-full bg-base-300 justify-between w-60 p-4">
				<?= view_cell('SidebarMenuCell::show') ?>
				<div>
					<ul class="menu text-base-content w-full">
						<li><a href="#" class="">
								<i class="bi bi-envelope"></i>
								Inbox
							</a></li>
					</ul>
					<div class="dropdown dropdown-top">
						<div class="divider m-1"></div>
						<div tabindex="0" role="button" class="btn btn-ghost max-w-52">
							<div class="avatar">
								<div class="w-10 rounded-full">
									<img alt="Tailwind CSS Navbar component" src="<?= $user['foto']; ?>" />
								</div>
							</div>
							<span class="ml-2 font-bold truncate"><?= $user['nama_lengkap']; ?></span>
						</div>
						<ul
							tabindex="0"
							class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
							<li>
								<a>
									<i class="bi bi-person text-lg"></i>
									Profile
								</a>
							</li>
							<li>
								<a>
									<i class="bi bi-gear text-lg"></i>
									Settings
								</a>
							</li>
							<div class="border-t m-2 border-gray-300"></div>
							<li>
								<a href="/logout" class="text-red-500">
									<i class="bi bi-box-arrow-right text-lg"></i>
									Logout
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="toast" class="toast toast-top toast-end hidden z-50">
		<div id="toast-message" class="alert alert-success">
			<span id="toast-text"></span>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const toast = document.getElementById('toast');
			const toastText = document.getElementById('toast-text');
			const toastMsg = "<?= session('success') ?? session('error') ?>";
			const isSuccess = <?= session('success') ? 'true' : 'false' ?>;

			if (toastMsg) {
				toast.classList.remove('hidden');
				document.getElementById('toast-message').classList.add(isSuccess ? 'alert-success' : 'alert-error');
				toastText.innerText = toastMsg;

				setTimeout(() => {
					toast.classList.add('hidden');
				}, 3000);
			}
		});
	</script>
</body>

</html>
