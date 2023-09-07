<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/contacts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-phone-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contact.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('article_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/article-contents*") ? "c-show" : "" }} {{ request()->is("admin/article-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.article.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('article_content_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.article-contents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/article-contents") || request()->is("admin/article-contents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.articleContent.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('article_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.article-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/article-categories") || request()->is("admin/article-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-angle-double-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.articleCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('transaction_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sellings*") ? "c-show" : "" }} {{ request()->is("admin/selling-details*") ? "c-show" : "" }} {{ request()->is("admin/carts*") ? "c-show" : "" }} {{ request()->is("admin/purchasings*") ? "c-show" : "" }} {{ request()->is("admin/purchasing-details*") ? "c-show" : "" }} {{ request()->is("admin/offers*") ? "c-show" : "" }} {{ request()->is("admin/offer-details*") ? "c-show" : "" }} {{ request()->is("admin/supplies*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.transaction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('selling_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sellings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sellings") || request()->is("admin/sellings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.selling.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('selling_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.selling-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/selling-details") || request()->is("admin/selling-details/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list-ul c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sellingDetail.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('cart_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carts") || request()->is("admin/carts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cart.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchasing_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchasings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchasings") || request()->is("admin/purchasings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-invoice c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchasing.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('purchasing_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.purchasing-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchasing-details") || request()->is("admin/purchasing-details/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.purchasingDetail.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('offer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.offers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/offers") || request()->is("admin/offers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hands-helping c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.offer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('offer_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.offer-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/offer-details") || request()->is("admin/offer-details/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-info c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.offerDetail.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('supply_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.supplies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/supplies") || request()->is("admin/supplies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-stumbleupon c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.supply.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('warehouse_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/inventories*") ? "c-show" : "" }} {{ request()->is("admin/stock-opnames*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.warehouse.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-filter c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('inventory_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.inventories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/inventories") || request()->is("admin/inventories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-box c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.inventory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('stock_opname_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stock-opnames.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stock-opnames") || request()->is("admin/stock-opnames/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stockOpname.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>