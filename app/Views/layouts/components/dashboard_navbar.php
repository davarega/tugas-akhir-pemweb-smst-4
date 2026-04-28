<div class="navbar shadow-sm sticky top-0 bg-base-100 z-1">
	<div class="flex-none lg:hidden">
		<label for="my-drawer" class="btn btn-square btn-ghost">
			<i class="bi bi-list text-3xl"></i>
		</label>
	</div>
	<div class="flex-1">
		<a href="#" class="btn btn-ghost font-bold text-xl">SIMPEG</a>
	</div>
	<div class="flex gap-2 items-center">
		<div class="hidden lg:block">
			<?= view_cell('SidebarMenuCell::show') ?>
		</div>
		<div class="flex-none">
			<div class="dropdown dropdown-end">
				<div tabindex="0" role="button" class="btn btn-ghost btn-circle">
					<div class="indicator">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
						</svg>
						<span class="badge badge-xs indicator-item badge-primary">0</span>
					</div>
				</div>
				<div
					tabindex="0"
					class="card card-compact dropdown-content bg-base-100 z-1 mt-3 w-52 shadow">
					<div class="card-body">
						<span class="">Tidak ada notifikasi untuk saat ini</span>
					</div>
				</div>
			</div>
		</div>
		<div class="dropdown dropdown-bottom dropdown-end hidden lg:block">
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
