<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'category' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'type'                  => 'Type',
            'type_helper'           => ' ',
            'category'              => 'Category',
            'category_helper'       => ' ',
            'stock_minimum'         => 'Stock Minimum',
            'stock_minimum_helper'  => ' ',
            'price_buy'             => 'Price Buy',
            'price_buy_helper'      => ' ',
            'price_sell'            => 'Price Sell',
            'price_sell_helper'     => ' ',
            'packaging_unit'        => 'Packaging Unit',
            'packaging_unit_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'slug'                  => 'Slug',
            'slug_helper'           => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'product_code'          => 'Product Code',
            'product_code_helper'   => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
        ],
    ],
    'selling' => [
        'title'          => 'Sellings',
        'title_singular' => 'Selling',
        'fields'         => [
            'id'                                => 'ID',
            'id_helper'                         => ' ',
            'batch_code'                        => 'Batch Code',
            'batch_code_helper'                 => ' ',
            'grand_total'                       => 'Grand Total',
            'grand_total_helper'                => ' ',
            'notes'                             => 'Notes',
            'notes_helper'                      => ' ',
            'rounding_cost'                     => 'Rounding Cost',
            'rounding_cost_helper'              => ' ',
            'additional_cost'                   => 'Additional Cost',
            'additional_cost_helper'            => ' ',
            'price_discounts'                   => 'Price Discounts',
            'price_discounts_helper'            => ' ',
            'customer'                          => 'Customer',
            'customer_helper'                   => ' ',
            'status'                            => 'Status',
            'status_helper'                     => ' ',
            'created_at'                        => 'Created at',
            'created_at_helper'                 => ' ',
            'updated_at'                        => 'Updated at',
            'updated_at_helper'                 => ' ',
            'deleted_at'                        => 'Deleted at',
            'deleted_at_helper'                 => ' ',
            'selling_detail'                    => 'Selling Detail',
            'selling_detail_helper'             => ' ',
            'selling_transaction_number'        => 'Selling Transaction Number',
            'selling_transaction_number_helper' => ' ',
        ],
    ],
    'sellingDetail' => [
        'title'          => 'Selling Details',
        'title_singular' => 'Selling Detail',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'subtotal'          => 'Subtotal',
            'subtotal_helper'   => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'cart' => [
        'title'          => 'Carts',
        'title_singular' => 'Cart',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'purchasing' => [
        'title'          => 'Purchasings',
        'title_singular' => 'Purchasing',
        'fields'         => [
            'id'                                   => 'ID',
            'id_helper'                            => ' ',
            'batch_code'                           => 'Batch Code',
            'batch_code_helper'                    => ' ',
            'grand_total'                          => 'Grand Total',
            'grand_total_helper'                   => ' ',
            'notes'                                => 'Notes',
            'notes_helper'                         => ' ',
            'rounding_cost'                        => 'Rounding Cost',
            'rounding_cost_helper'                 => ' ',
            'additional_cost'                      => 'Additional Cost',
            'additional_cost_helper'               => ' ',
            'price_discounts'                      => 'Price Discounts',
            'price_discounts_helper'               => ' ',
            'supplier'                             => 'Supplier',
            'supplier_helper'                      => ' ',
            'status'                               => 'Status',
            'status_helper'                        => ' ',
            'created_at'                           => 'Created at',
            'created_at_helper'                    => ' ',
            'updated_at'                           => 'Updated at',
            'updated_at_helper'                    => ' ',
            'deleted_at'                           => 'Deleted at',
            'deleted_at_helper'                    => ' ',
            'purchasing_detail'                    => 'Purchasing Detail',
            'purchasing_detail_helper'             => ' ',
            'purchasing_transaction_number'        => 'Purchasing Transaction Number',
            'purchasing_transaction_number_helper' => ' ',
        ],
    ],
    'purchasingDetail' => [
        'title'          => 'Purchasing Details',
        'title_singular' => 'Purchasing Detail',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'subtotal'          => 'Subtotal',
            'subtotal_helper'   => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'offerDetail' => [
        'title'          => 'Offer Details',
        'title_singular' => 'Offer Detail',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'quantity'           => 'Quantity',
            'quantity_helper'    => ' ',
            'price_offer'        => 'Price Offer',
            'price_offer_helper' => ' ',
            'price_deal'         => 'Price Deal',
            'price_deal_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'supply'             => 'Supply',
            'supply_helper'      => ' ',
        ],
    ],
    'offer' => [
        'title'          => 'Offers',
        'title_singular' => 'Offer',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'supplier'                     => 'Supplier',
            'supplier_helper'              => ' ',
            'status'                       => 'Status',
            'status_helper'                => ' ',
            'grand_total'                  => 'Grand Total',
            'grand_total_helper'           => ' ',
            'offer_detail'                 => 'Offer Detail',
            'offer_detail_helper'          => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'offering_expired_date'        => 'Offering Expired Date',
            'offering_expired_date_helper' => ' ',
            'offering_number'              => 'Offering Number',
            'offering_number_helper'       => ' ',
        ],
    ],
    'inventory' => [
        'title'          => 'Inventories',
        'title_singular' => 'Inventory',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'types'             => 'Types',
            'types_helper'      => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'model_key'         => 'Model Key',
            'model_key_helper'  => ' ',
            'model_name'        => 'Model Name',
            'model_name_helper' => ' ',
        ],
    ],
    'stockOpname' => [
        'title'          => 'Stock Opname',
        'title_singular' => 'Stock Opname',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'notes'             => 'Notes',
            'notes_helper'      => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'quantity'          => 'Quantity',
            'quantity_helper'   => ' ',
            'types'             => 'Types',
            'types_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'articleContent' => [
        'title'          => 'Article Content',
        'title_singular' => 'Article Content',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'page_text'             => 'Page Text',
            'page_text_helper'      => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'slug'                  => 'Slug',
            'slug_helper'           => ' ',
            'category'              => 'Category',
            'category_helper'       => ' ',
        ],
    ],
    'articleCategory' => [
        'title'          => 'Article Categories',
        'title_singular' => 'Article Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'article' => [
        'title'          => 'Articles',
        'title_singular' => 'Article',
    ],
    'transaction' => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
    ],
    'warehouse' => [
        'title'          => 'Warehouse',
        'title_singular' => 'Warehouse',
    ],
    'contact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'user'                  => 'User',
            'user_helper'           => ' ',
            'code'                  => 'Code',
            'code_helper'           => ' ',
            'name'                  => 'Name',
            'name_helper'           => ' ',
            'address'               => 'Address',
            'address_helper'        => ' ',
            'address_2'             => 'Address 2',
            'address_2_helper'      => ' ',
            'phone'                 => 'Phone',
            'phone_helper'          => ' ',
            'type'                  => 'Type',
            'type_helper'           => ' ',
            'identity_image'        => 'KTP',
            'identity_image_helper' => ' ',
            'pos_code'              => 'Pos Code',
            'pos_code_helper'       => ' ',
            'enterprises'           => 'Enterprises',
            'enterprises_helper'    => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'self_image'            => 'Self Image',
            'self_image_helper'     => ' ',
            'npwp'                  => 'NPWP',
            'npwp_helper'           => ' ',
        ],
    ],
    'supply' => [
        'title'          => 'Supply',
        'title_singular' => 'Supply',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'quantity_needs'        => 'Quantity Needs',
            'quantity_needs_helper' => ' ',
            'initial_price'         => 'Initial Price',
            'initial_price_helper'  => ' ',
            'product'               => 'Product',
            'product_helper'        => ' ',
            'start_date'            => 'Start Date',
            'start_date_helper'     => ' ',
            'end_date'              => 'End Date',
            'end_date_helper'       => ' ',
            'status'                => 'Status',
            'status_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],

];
