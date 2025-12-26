<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $isAdmin  = $user?->hasRole('admin');
        $isDoctor = $user?->hasRole('doctors') || $user?->hasRole('doctor') || $user?->hasRole('Doctors');

        // ===== Doctor (بياناته فقط) =====
        $myDoctor = null;

        if ($isDoctor && Schema::hasTable('doctors')) {
            // 1) حاول تطابق بالإيميل
            if (!empty($user->email)) {
                $myDoctor = DB::table('doctors')
                    ->whereRaw('LOWER(TRIM(email)) = ?', [strtolower(trim($user->email))])
                    ->first();
            }

            // 2) إذا ما لقي بالإيميل، جرّب بالاسم كخطة بديلة (اختياري)
            if (!$myDoctor && !empty($user->name)) {
                $myDoctor = DB::table('doctors')
                    ->whereRaw('LOWER(TRIM(name)) = ?', [strtolower(trim($user->name))])
                    ->first();
            }
        }

        // ===== Admin stats (فقط Admin) =====
        $stats  = [];
        $latest = ['doctors' => collect()];

        if ($isAdmin) {
            $stats = Cache::remember('admin.dashboard.stats.v2', 600, function () {
                $count = function (string $table) {
                    return Schema::hasTable($table) ? DB::table($table)->count() : 0;
                };

                return [
                    'doctors'     => $count('doctors'),
                    'users'       => $count('users'),
                    'about'       => $count('about'),
                    'values'      => $count('values'),
                    'mission'     => $count('mission'),
                    'work'        => $count('work'),
                    'process'     => $count('process'),
                    'contactInfo' => $count('contact_info'),
                ];
            });

            $latest = [
                'doctors' => Schema::hasTable('doctors')
                    ? DB::table('doctors')->orderByDesc('id')->limit(5)->get()
                    : collect(),
            ];
        }

        return view('admin-panel.dashboard', compact(
            'isAdmin',
            'isDoctor',
            'stats',
            'latest',
            'myDoctor'
        ));
    }
}
