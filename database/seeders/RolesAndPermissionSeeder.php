<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Define roles
        $roles = [
            'admin',
            'pharmacist',
            'cashier',
            'inventory_manager',
            'delivery_agent',
            'accountant',
            'doctor',
        ];

        // Define permissions module-wise
        $permissions = [
            // Dashboard
            'view dashboard',

            // Billing and Sales
            'create sale', 'edit sale', 'delete sale', 'view sale',
            'create return', 'view return',

            // Medicines/Stock
            'add medicine', 'edit medicine', 'delete medicine', 'view medicine',
            'view expiry alerts', 'view low stock alerts',

            // Purchases/Suppliers
            'create purchase', 'edit purchase', 'view purchase', 'view supplier',

            // Prescriptions
            'view prescription', 'add prescription',

            // Customers/Patients
            'view customer', 'edit customer',

            // Delivery
            'view delivery', 'update delivery status',

            // Accounting/Reports
            'view financial report', 'view gst report', 'download report',

            // Admin/staff management
            'manage users', 'manage roles', 'manage permissions',

            // Settings and audit
            'manage settings', 'view audit logs',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $rolePermissions = [
            'admin' => Permission::all()->pluck('name')->toArray(),
            'pharmacist' => [
                'create sale', 'edit sale', 'view sale', 'create return', 'view return',
                'add medicine', 'edit medicine', 'view medicine', 'view expiry alerts', 'view low stock alerts',
                'view prescription', 'add prescription', 'view customer', 'edit customer',
            ],
            'cashier' => [
                'create sale', 'view sale', 'create return', 'view return', 'view customer',
            ],
            'inventory_manager' => [
                'add medicine', 'edit medicine', 'delete medicine',
                'view medicine', 'view expiry alerts', 'view low stock alerts',
                'create purchase', 'edit purchase', 'view purchase', 'view supplier',
            ],
            'delivery_agent' => [
                'view delivery', 'update delivery status',
            ],
            'accountant' => [
                'view financial report', 'view gst report', 'download report',
            ],
            'doctor' => [
                'view prescription', 'add prescription', 'view customer',
            ],
        ];

        foreach ($rolePermissions as $role => $perms) {
            $roleModel = Role::firstOrCreate(['name' => $role]);
            $roleModel->syncPermissions($perms);
        }
    }
}

