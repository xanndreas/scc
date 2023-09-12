<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'category_create',
            ],
            [
                'id'    => 20,
                'title' => 'category_edit',
            ],
            [
                'id'    => 21,
                'title' => 'category_show',
            ],
            [
                'id'    => 22,
                'title' => 'category_delete',
            ],
            [
                'id'    => 23,
                'title' => 'category_access',
            ],
            [
                'id'    => 24,
                'title' => 'product_create',
            ],
            [
                'id'    => 25,
                'title' => 'product_edit',
            ],
            [
                'id'    => 26,
                'title' => 'product_show',
            ],
            [
                'id'    => 27,
                'title' => 'product_delete',
            ],
            [
                'id'    => 28,
                'title' => 'product_access',
            ],
            [
                'id'    => 29,
                'title' => 'selling_create',
            ],
            [
                'id'    => 30,
                'title' => 'selling_edit',
            ],
            [
                'id'    => 31,
                'title' => 'selling_show',
            ],
            [
                'id'    => 32,
                'title' => 'selling_delete',
            ],
            [
                'id'    => 33,
                'title' => 'selling_access',
            ],
            [
                'id'    => 34,
                'title' => 'selling_detail_create',
            ],
            [
                'id'    => 35,
                'title' => 'selling_detail_edit',
            ],
            [
                'id'    => 36,
                'title' => 'selling_detail_show',
            ],
            [
                'id'    => 37,
                'title' => 'selling_detail_delete',
            ],
            [
                'id'    => 38,
                'title' => 'selling_detail_access',
            ],
            [
                'id'    => 39,
                'title' => 'cart_create',
            ],
            [
                'id'    => 40,
                'title' => 'cart_edit',
            ],
            [
                'id'    => 41,
                'title' => 'cart_show',
            ],
            [
                'id'    => 42,
                'title' => 'cart_delete',
            ],
            [
                'id'    => 43,
                'title' => 'cart_access',
            ],
            [
                'id'    => 44,
                'title' => 'purchasing_create',
            ],
            [
                'id'    => 45,
                'title' => 'purchasing_edit',
            ],
            [
                'id'    => 46,
                'title' => 'purchasing_show',
            ],
            [
                'id'    => 47,
                'title' => 'purchasing_delete',
            ],
            [
                'id'    => 48,
                'title' => 'purchasing_access',
            ],
            [
                'id'    => 49,
                'title' => 'purchasing_detail_create',
            ],
            [
                'id'    => 50,
                'title' => 'purchasing_detail_edit',
            ],
            [
                'id'    => 51,
                'title' => 'purchasing_detail_show',
            ],
            [
                'id'    => 52,
                'title' => 'purchasing_detail_delete',
            ],
            [
                'id'    => 53,
                'title' => 'purchasing_detail_access',
            ],
            [
                'id'    => 54,
                'title' => 'offer_detail_create',
            ],
            [
                'id'    => 55,
                'title' => 'offer_detail_edit',
            ],
            [
                'id'    => 56,
                'title' => 'offer_detail_show',
            ],
            [
                'id'    => 57,
                'title' => 'offer_detail_delete',
            ],
            [
                'id'    => 58,
                'title' => 'offer_detail_access',
            ],
            [
                'id'    => 59,
                'title' => 'offer_create',
            ],
            [
                'id'    => 60,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 61,
                'title' => 'offer_show',
            ],
            [
                'id'    => 62,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 63,
                'title' => 'offer_access',
            ],
            [
                'id'    => 64,
                'title' => 'inventory_create',
            ],
            [
                'id'    => 65,
                'title' => 'inventory_edit',
            ],
            [
                'id'    => 66,
                'title' => 'inventory_show',
            ],
            [
                'id'    => 67,
                'title' => 'inventory_delete',
            ],
            [
                'id'    => 68,
                'title' => 'inventory_access',
            ],
            [
                'id'    => 69,
                'title' => 'stock_opname_create',
            ],
            [
                'id'    => 70,
                'title' => 'stock_opname_edit',
            ],
            [
                'id'    => 71,
                'title' => 'stock_opname_show',
            ],
            [
                'id'    => 72,
                'title' => 'stock_opname_delete',
            ],
            [
                'id'    => 73,
                'title' => 'stock_opname_access',
            ],
            [
                'id'    => 74,
                'title' => 'article_content_create',
            ],
            [
                'id'    => 75,
                'title' => 'article_content_edit',
            ],
            [
                'id'    => 76,
                'title' => 'article_content_show',
            ],
            [
                'id'    => 77,
                'title' => 'article_content_delete',
            ],
            [
                'id'    => 78,
                'title' => 'article_content_access',
            ],
            [
                'id'    => 79,
                'title' => 'article_category_create',
            ],
            [
                'id'    => 80,
                'title' => 'article_category_edit',
            ],
            [
                'id'    => 81,
                'title' => 'article_category_show',
            ],
            [
                'id'    => 82,
                'title' => 'article_category_delete',
            ],
            [
                'id'    => 83,
                'title' => 'article_category_access',
            ],
            [
                'id'    => 84,
                'title' => 'article_access',
            ],
            [
                'id'    => 85,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 86,
                'title' => 'warehouse_access',
            ],
            [
                'id'    => 87,
                'title' => 'contact_create',
            ],
            [
                'id'    => 88,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 89,
                'title' => 'contact_show',
            ],
            [
                'id'    => 90,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 91,
                'title' => 'contact_access',
            ],
            [
                'id'    => 92,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 93,
                'title' => 'admin_page_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
