<?php
// database/seeders/PermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $permissions = [
            ['name' => 'admin-login',        'description' => 'Login as admin'],
            ['name' => 'admin-login.submit', 'description' => 'Submit admin login form'],
            ['name' => 'admin.logout',       'description' => 'Logout admin'],

            ['name' => 'dashboard',          'description' => 'Access admin dashboard'],
            ['name' => 'setting',            'description' => 'Access settings page'],

            ['name' => 'roles.index',        'description' => 'View list of roles'],
            ['name' => 'roles.create',       'description' => 'Create new role form'],
            ['name' => 'roles.store',        'description' => 'Store new role'],
            ['name' => 'roles.edit',         'description' => 'Edit existing role form'],
            ['name' => 'roles.update',       'description' => 'Update existing role'],
            ['name' => 'roles.destroy',      'description' => 'Delete role'],

            ['name' => 'users.list',         'description' => 'View list of users'],
            ['name' => 'users.add',          'description' => 'Create new user form'],
            ['name' => 'users.store',        'description' => 'Store new user'],
            ['name' => 'users.edit',         'description' => 'Edit existing user form'],
            ['name' => 'users.update',       'description' => 'Update existing user'],

            // About (NEW)
            ['name' => 'about.index',   'description' => 'View list of about items'],
            ['name' => 'about.create',  'description' => 'Create new about item form'],
            ['name' => 'about.store',   'description' => 'Store new about item'],
            ['name' => 'about.edit',    'description' => 'Edit existing about item form'],
            ['name' => 'about.update',  'description' => 'Update existing about item'],
            ['name' => 'about.destroy', 'description' => 'Delete about item'],

            // Values (NEW)
            ['name' => 'value.index',   'description' => 'View list of values'],
            ['name' => 'value.create',  'description' => 'Create new value form'],
            ['name' => 'value.store',   'description' => 'Store new value'],
            ['name' => 'value.edit',    'description' => 'Edit existing value form'],
            ['name' => 'value.update',  'description' => 'Update existing value'],
            ['name' => 'value.destroy', 'description' => 'Delete value'],

            // Mission (NEW)
            ['name' => 'mission.index',   'description' => 'View mission list'],
            ['name' => 'mission.create',  'description' => 'Create mission form'],
            ['name' => 'mission.store',   'description' => 'Store mission'],
            ['name' => 'mission.edit',    'description' => 'Edit mission form'],
            ['name' => 'mission.update',  'description' => 'Update mission'],
            ['name' => 'mission.destroy', 'description' => 'Delete mission'],

            // Work (NEW)
            ['name' => 'work.index',   'description' => 'View list of work'],
            ['name' => 'work.create',  'description' => 'Create new work form'],
            ['name' => 'work.store',   'description' => 'Store new work'],
            ['name' => 'work.edit',    'description' => 'Edit work form'],
            ['name' => 'work.update',  'description' => 'Update work'],
            ['name' => 'work.destroy', 'description' => 'Delete work'],

            // Contact Info (NEW)
            ['name' => 'contact.index',   'description' => 'View contact info list'],
            ['name' => 'contact.create',  'description' => 'Create contact info form'],
            ['name' => 'contact.store',   'description' => 'Store contact info'],
            ['name' => 'contact.edit',    'description' => 'Edit contact info form'],
            ['name' => 'contact.update',  'description' => 'Update contact info'],
            ['name' => 'contact.destroy', 'description' => 'Delete contact info'],

            // Contact Messages (NEW)
            ['name' => 'contact-messages.index',   'description' => 'View contact messages list'],
            ['name' => 'contact-messages.show',    'description' => 'View single contact message'],
            ['name' => 'contact-messages.destroy', 'description' => 'Delete contact message'],

            // Process (NEW)
            ['name' => 'process.index',   'description' => 'View list of process'],
            ['name' => 'process.create',  'description' => 'Create process form'],
            ['name' => 'process.store',   'description' => 'Store process'],
            ['name' => 'process.edit',    'description' => 'Edit process form'],
            ['name' => 'process.update',  'description' => 'Update process'],
            ['name' => 'process.destroy', 'description' => 'Delete process'],

            // Doctors (NEW)
            ['name' => 'doctors.index',   'description' => 'View list of doctors'],
            ['name' => 'doctors.create',  'description' => 'Create new doctor form'],
            ['name' => 'doctors.store',   'description' => 'Store doctor'],
            ['name' => 'doctors.edit',    'description' => 'Edit doctor form'],
            ['name' => 'doctors.update',  'description' => 'Update doctor'],
            ['name' => 'doctors.destroy', 'description' => 'Delete doctor'],

            // AI Diagnosis Logs (NEW)
            ['name' => 'diagnosis-logs.index',   'description' => 'View AI diagnosis logs'],
            ['name' => 'diagnosis-logs.show',    'description' => 'View single diagnosis log'],
            ['name' => 'diagnosis-logs.export',  'description' => 'Export diagnosis logs'],

            // AI Diagnosis Reports / Analytics (NEW)
            ['name' => 'diagnosis-reports.index', 'description' => 'View diagnosis analytics dashboard'],
            // Patients (NEW)
            ['name' => 'patients.index',   'description' => 'View list of patients'],
            ['name' => 'patients.show',    'description' => 'View patient details'],
            ['name' => 'patients.create',  'description' => 'Create new patient form'],
            ['name' => 'patients.store',   'description' => 'Store new patient'],
            ['name' => 'patients.edit',    'description' => 'Edit patient form'],
            ['name' => 'patients.update',  'description' => 'Update patient'],
            ['name' => 'patients.destroy', 'description' => 'Delete patient'],

        ];


        // upsert to avoid duplicates
        $rows = array_map(fn ($p) => [
            'name'        => $p['name'],
            'description' => $p['description'] ?? null,
            'created_at'  => $now,
            'updated_at'  => $now,
        ], $permissions);

        DB::table('permissions')->upsert($rows, ['name'], ['description','updated_at']);

        // Attach all permissions to admin role
        $adminRoleId = DB::table('roles')->where('name','admin')->value('id')
            ?? DB::table('roles')->insertGetId(['name'=>'admin','created_at'=>$now,'updated_at'=>$now]);

        $permissionIds = DB::table('permissions')->pluck('id');
        foreach ($permissionIds as $pid) {
            DB::table('role_permissions')->updateOrInsert(
                ['role_id' => $adminRoleId, 'permission_id' => $pid],
                []
            );
        }
    }
}
