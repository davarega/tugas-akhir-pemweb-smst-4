<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class SidebarMenuCell extends Cell
{
    public function show()
    {
        $pegawai = session()->get('user');
        $role = $pegawai['role'] ?? 'pegawai';

        $menu = [];
        $submenu = [];

        if ($role === 'admin') {
            $menu = [
                ['title' => 'Dashboard', 'url' => "/admin", 'icon' => 'bi-columns-gap'],
                ['title' => 'Pegawai', 'url' => "/admin/pegawai", 'icon' => 'bi-people'],
                ['title' => 'Cuti', 'url' => '/admin/cuti', 'icon' => 'bi-calendar-check'],
                ['title' => 'Jabatan', 'url' => '/admin/jabatan', 'icon' => 'bi-person-badge'],
            ];
        } else {
            $menu = [
                ['title' => 'Dashboard', 'url' => "/dashboard", 'icon' => 'bi-columns-gap'],
            ];
        }

        return view('cells/sidebar_menu', ['menu' => $menu]);
    }
}
