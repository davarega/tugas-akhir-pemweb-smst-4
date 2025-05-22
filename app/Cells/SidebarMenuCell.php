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

        if ($role === 'admin') {
            $menu = [
                ['title' => 'Dashboard', 'url' => "/admin/dashboard", 'icon' => 'bi-columns-gap'],
                ['title' => 'Pegawai', 'url' => "/admin/dashboard/pegawai", 'icon' => 'bi-people'],
                ['title' => 'Jadwal', 'url' => '/admin/dashboard/jadwal', 'icon' => 'bi-calendar-event'],
            ];
        } else {
            $menu = [
                ['title' => 'Dashboard', 'url' => "/dashboard", 'icon' => 'bi-columns-gap'],
                ['title' => 'Jadwal', 'url' => "/dashboard/jadwal", 'icon' => 'bi-calendar-event'],
            ];
        }

        return view('cells/sidebar_menu', ['menu' => $menu]);
    }
}
