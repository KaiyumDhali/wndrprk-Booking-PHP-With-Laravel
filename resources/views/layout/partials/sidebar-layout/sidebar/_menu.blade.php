<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">

        @role('employee')
            <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">

                <!--begin:Menu item-->
                <div class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-grid-fill fs-2"></i>
                        <span class="menu-title ms-4">Dashboards</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>


                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('employee_profile.*') ? 'active' : '' }}"
                        href="{{ route('employee_profile') }}">
                        <i class="bi bi-person-bounding-box fs-2"></i>
                        <span class="menu-title ms-4">Employee Profile</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('single_employee_all_attendance_search.*') ? 'active' : '' }}"
                        href="{{ route('single_employee_all_attendance_search') }}">
                        {{-- <i class="bi bi-window-plus fs-2"></i> --}}
                        <i class="bi bi-card-list fs-2"></i>
                        <span class="menu-title ms-4">Attendance Report</span>
                    </a>
                    <!--end:Menu link-->
                </div>



                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('employee_profile_leave_entry.*') ? 'active' : '' }}"
                        href="{{ route('employee_profile_leave_entry') }}">
                        <i class="bi bi-window-plus fs-2"></i>
                        <span class="menu-title ms-4">Employee Leave</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('employee_profile_ledger.*') ? 'active' : '' }}"
                        href="{{ route('employee_profile_ledger') }}">
                        <i class="bi bi-card-checklist fs-2"></i>
                        <span class="menu-title ms-4">Ledgers Details</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->


            </div>
        @else
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">


                <!--begin:Menu Dashboards -->
                <div class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="ki-outline ki-home fs-2"></i>
                        <span class="menu-title ms-4">Dashboards</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                {{-- Add: General Setting item --}}
                @canany(['read company setting'])
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs('emp_company*', 'emp_branch*') ? 'here show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <i class="bi bi-gear fs-2"></i>
                            <span class="menu-title ms-4"> General Setting</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                @can('read company setting')
                                    <a class="menu-link {{ request()->routeIs('emp_company.*') ? 'active' : '' }}"
                                        href="{{ route('emp_company.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Company Setting</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                {{-- @can('read employee branch')
                                <a class="menu-link {{ request()->routeIs('emp_branch.*') ? 'active' : '' }}"
                                    href="{{ route('emp_branch.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Branch </span>
                                </a>
                            @endcan --}}
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                {{-- @can('read employee department')
                                <a class="menu-link {{ request()->routeIs('emp_department.*') ? 'active' : '' }}"
                                    href="{{ route('emp_department.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> Department</span>
                                </a>
                            @endcan --}}
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                {{-- @can('read employee designation')
                                <a class="menu-link {{ request()->routeIs('emp_designation.*') ? 'active' : '' }}"
                                    href="{{ route('emp_designation.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> Designation</span>
                                </a>
                            @endcan --}}
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcanany
                {{-- End: General Setting item --}}


                  <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion ">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                           <i class="bi bi-box fs-2"></i>

                            <span class="menu-title ms-4"> Inventory</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                {{-- Add: Supplier Menu item --}}
                @can('read supplier')
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ request()->routeIs('suppliers*', 'supplier_ledgers*') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <i class="bi bi-person-video2 fs-2"></i>
                        <span class="menu-title ms-4"> Supplier</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            @can('read supplier')
                                <a class="menu-link {{ request()->routeIs('suppliers.*') ? 'active' : '' }}"
                                    href="{{ route('suppliers.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Supplier</span>
                                </a>
                            @endcan
                            <!--end:Menu link-->
                            <!--begin:Menu link-->
                            @can('read supplier ledger')
                                <a class="menu-link {{ request()->routeIs('supplier_ledgers.*') ? 'active' : '' }}"
                                    href="{{ route('supplier_ledgers.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Supplier Ledgers</span>
                                </a>
                            @endcan
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                @endcan
                {{-- End: Supplier Menu item --}}


                 {{-- Add: Employee Menu item --}}
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ request()->routeIs('employees*', 'employee_ledger*') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <i class="bi bi-people fs-2"></i>
                        <span class="menu-title ms-4"> Employee</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            @can('read employee')
                                <a class="menu-link {{ request()->routeIs('employees.*') ? 'active' : '' }}"
                                    href="{{ route('employees.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Employee</span>
                                </a>
                            @endcan
                        </div>
                        <!--end:Menu link-->
                        <!--begin:Menu link-->
                        <div class="menu-item">
                            @can('read employee ledger')
                                <a class="menu-link {{ request()->routeIs('employee_ledger.*') ? 'active' : '' }}"
                                    href="{{ route('employee_ledger.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Employee Ledgers</span>
                                </a>
                            @endcan
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                {{-- End: Employee Menu item --}}



              

                   {{-- Add: Product item --}}
                @canany(['read product'])
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs(
                            'products*',
                            'product_type*',
                            'product_fragrance*',
                            'categories.*',
                            'sub_category*',
                            'brands*',
                            'colors*',
                            'sizes*',
                            'units*',
                        )
                            ? 'here show'
                            : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <i class="bi bi-bag-check fs-2"></i>
                            <span class="menu-title ms-4"> Product</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                @can('read product')
                                    <a class="menu-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                                        href="{{ route('products.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add Product</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read product type')
                                    <a class="menu-link {{ request()->routeIs('product_type.index*') ? 'active' : '' }}"
                                        href="{{ route('product_type.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Product Type</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read category')
                                    <a class="menu-link {{ request()->routeIs('categories.index*') ? 'active' : '' }}"
                                        href="{{ route('categories.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Category</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read sub category')
                                    <a class="menu-link {{ request()->routeIs('sub_category.*') ? 'active' : '' }}"
                                        href="{{ route('sub_category.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Sub Category</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read brand')
                                    <a class="menu-link {{ request()->routeIs('brands.*') ? 'active' : '' }}"
                                        href="{{ route('brands.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Brand</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read product fragrance')
                                    <a class="menu-link {{ request()->routeIs('product_fragrance.*') ? 'active' : '' }}"
                                        href="{{ route('product_fragrance.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Fragrance</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read color')
                                    <a class="menu-link {{ request()->routeIs('colors.*') ? 'active' : '' }}"
                                        href="{{ route('colors.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Color</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read size')
                                    <a class="menu-link {{ request()->routeIs('sizes.*') ? 'active' : '' }}"
                                        href="{{ route('sizes.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Size</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read unit')
                                    <a class="menu-link {{ request()->routeIs('units.*') ? 'active' : '' }}"
                                        href="{{ route('units.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Unit</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcanany
                {{-- End: Product Menu item --}}




                 {{-- Add: Product purchase item --}}
                @canany(['read purchase', 'read purchase report'])
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs('purchase*', 'purchase_invoice_return_list', 'purchase_invoice_edit', 'purchase_invoice_list*', 'supplier_wise_purchase_list*') ? 'here show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                           <i class="bi bi-box fs-2"></i>

                            <span class="menu-title ms-4"> Purchase</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                @can('read purchase')
                                    <a class="menu-link {{ request()->routeIs('purchase.*') ? 'active' : '' }}"
                                        href="{{ route('purchase.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Product Purchase</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->

                                <!--begin:Menu link-->
                                @can('read purchase report')
                                    <a class="menu-link {{ request()->routeIs('purchase_invoice_return_list*') ? 'active' : '' }}"
                                        href="{{ route('purchase_invoice_return_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Purchase Return Report</span>
                                    </a>
                                @endcan
                                @can('read purchase report')
                                    <a class="menu-link {{ request()->routeIs('purchase_invoice_list*', 'purchase_invoice_edit*', 'purchase_invoice_details*') ? 'active' : '' }}"
                                        href="{{ route('purchase_invoice_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Invoice Wise Purchase Report</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->

                                <!--begin:Menu link-->
                                @can('read purchase report')
                                    <a class="menu-link {{ request()->routeIs('supplier_wise_purchase_list*') ? 'active' : '' }}"
                                        href="{{ route('supplier_wise_purchase_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Supplier Wise Purchase Register Report</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcanany
                {{-- End: Product purchase Menu item --}}



                {{-- Add: Product sales item --}}
                @canany(['read sales', 'read sales report', 'sales report datewise', 'item wise profit'])
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs('sales*', 'sales_invoice_return_list', 'sales_invoice_return_details', 'sales_invoice_edit', 'item_wise_profit_list', 'invoice_wise_profit_list', 'item_wise_sales_list', 'sales_invoice_list*', 'customer_wise_sales_list*') ? 'here show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <i class="bi bi-cart fs-2"></i>

                            <span class="menu-title ms-4"> Consume Portal</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">

                                <!--begin:Menu link-->
                                @can('read sales')
                                    <a class="menu-link {{ request()->routeIs('sales.*') ? 'active' : '' }}"
                                        href="{{ route('sales.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Product Consumer</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read sales report')
                                    <a class="menu-link {{ request()->routeIs('sales_invoice_list*', 'sales_invoice_edit*', 'sales_invoice_details*') ? 'active' : '' }}"
                                        href="{{ route('sales_invoice_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Issue No Wise Consume Reports</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                <!-- @can('read sales report')
                                    <a class="menu-link {{ request()->routeIs('sales_challan_list*', 'sales_challan_details*') ? 'active' : '' }}"
                                        href="{{ route('sales_challan_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Challan Wise Sales Reports</span>
                                    </a>
                                @endcan -->
                                <!--end:Menu link-->

                                <!--begin:Menu link-->
                                <!-- @can('read sales report')
                                    <a class="menu-link {{ request()->routeIs('sales_invoice_return_list*', 'sales_invoice_return_details*') ? 'active' : '' }}"
                                        href="{{ route('sales_invoice_return_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Invoice Wise Sales Return Reports</span>
                                    </a>
                                @endcan -->
                                <!--end:Menu link-->

                                <!--begin:Menu link-->
                                <!-- @can('read sales report datewise')
                                    <a class="menu-link {{ request()->routeIs('customer_wise_sales_list*') ? 'active' : '' }}"
                                        href="{{ route('customer_wise_sales_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Customer Wise Sales Reports</span>
                                    </a>
                                @endcan -->
                                <!--end:Menu link-->

                                <!--begin:Menu link-->
                                {{-- @can('read sales report datewise')
                                    <a class="menu-link {{ request()->routeIs('item_wise_sales_list*') ? 'active' : '' }}"
                                        href="{{ route('item_wise_sales_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Item Wise Sales Reports</span>
                                    </a>
                                @endcan --}}
                                     <!-- @can('read sales details report')
                                    <a class="menu-link {{ request()->routeIs('read sales details report*') ? 'active' : '' }}"
                                        href="{{ route('report.sales.details') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Sales Details Reports</span>
                                    </a>
                                @endcan -->
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                <!-- @can('read item wise profit')
                                    <a class="menu-link {{ request()->routeIs('item_wise_profit_list*') ? 'active' : '' }}"
                                        href="{{ route('item_wise_profit_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Item Wise Profit Reports</span>
                                    </a>
                                @endcan -->
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                <!-- @can('read invoice wise profit')
                                    <a class="menu-link {{ request()->routeIs('invoice_wise_profit_list*') ? 'active' : '' }}"
                                        href="{{ route('invoice_wise_profit_list') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Invoice Wise Profit Reports</span>
                                    </a>
                                @endcan -->
                                <!--end:Menu link-->
                                <!-- @can('read customer wise profit')
                                    <a class="menu-link {{ request()->routeIs('report.customer-item-profit*') ? 'active' : '' }}"
                                        href="{{ route('report.customer-item-profit') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Item & Customer Wise Profit Reports</span>
                                    </a>
                                @endcan -->

                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcanany
                {{-- End: Product sales Menu item --}}


                  {{-- Add: Product Stock item --}}
                @canany(['read stock report'])
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs(
                            'stock_report*',
                            'finish_good_wise_stock_report*',
                            'material_wise_stock_report*',
                            'item_wise_stock_report*',
                        )
                            ? 'here show'
                            : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <i class="bi bi-building fs-2"></i>

                            <span class="menu-title ms-4"> Product Stock</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                {{-- @can('read stock report')
                                <a class="menu-link {{ request()->routeIs('stock_report*') ? 'active' : '' }}"
                                    href="{{ route('stock_report') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Today Stock Report</span>
                                </a>
                            @endcan --}}
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read stock report')
                                    <a class="menu-link {{ request()->routeIs('finish_good_wise_stock_report*') ? 'active' : '' }}"
                                        href="{{ route('finish_good_wise_stock_report') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Products Stock</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                      
                                <!--begin:Menu link-->
                                @can('read stock report')
                                    <a class="menu-link {{ request()->routeIs('item_wise_stock_report*') ? 'active' : '' }}"
                                        href="{{ route('item_wise_stock_report') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Item Wise Stock Ledger</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcanany
                {{-- End: Product Menu item --}}
                                </div>
                                </div>
                <!--begin:Menu About Us -->
                <div class="menu-item menu-accordion {{ request()->routeIs('room_type') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('room_type') ? 'active' : '' }}"
                        href="{{ route('about_us.index') }}">
                        {{-- <i class="bi bi-grid-fill fs-2"></i> --}}
                        <i class="ki-outline ki-eye fs-2"></i>
                        <span class="menu-title ms-4">About Us</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->


                <!--begin:Menu Room Type -->
                <div class="menu-item menu-accordion {{ request()->routeIs('room_type') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('room_type') ? 'active' : '' }}"
                        href="{{ route('room_type.index') }}">
                        <i class="bi bi-diagram-3 fs-2x"></i>
                        <span class="menu-title ms-4">Room Type</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu Room List -->
                <div class="menu-item menu-accordion {{ request()->routeIs('room') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('room') ? 'active' : '' }}"
                        href="{{ route('room.index') }}">
                        <i class="bi bi-house-heart fs-2"></i>
                        <span class="menu-title ms-4">Room List</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu Room List -->
                <div class="menu-item menu-accordion {{ request()->routeIs('booking') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('booking') ? 'active' : '' }}"
                        href="{{ route('booking.index') }}">
                        <i class="bi bi-calendar-date fs-2"></i>
                        <span class="menu-title ms-4">Booking</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>

                <div class="menu-item menu-accordion {{ request()->routeIs('booking') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('booking') ? 'active' : '' }}"
                        href="{{ route('multiple_booking') }}">
                        <i class="bi bi-calendar-range fs-2"></i>
                        <span class="menu-title ms-4">Multiple Booking</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                </div>


                <div class="menu-item menu-accordion {{ request()->routeIs('slider') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('slider') ? 'active' : '' }}"
                        href="{{ route('slider.index') }}">
                        <i class="ki-outline ki-arrow-right-left fs-2"></i>
                        <span class="menu-title ms-4">Slider</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>


                <div class="menu-item menu-accordion {{ request()->routeIs('pages') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('pages') ? 'active' : '' }}"
                        href="{{ route('pages.index') }}">
                       <i class="ki-outline ki-picture fs-2"></i>
                        <span class="menu-title ms-4">Pages Banner</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>


                <div class="menu-item menu-accordion {{ request()->routeIs('rides') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('rides') ? 'active' : '' }}"
                        href="{{ route('rides.index') }}">
                       <i class="ki-outline ki-rocket fs-2"></i>

                        <span class="menu-title ms-4">Rides</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>


                <div class="menu-item menu-accordion {{ request()->routeIs('spots') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('spots') ? 'active' : '' }}"
                        href="{{ route('spots.index') }}">
                      <i class="bi bi-geo-alt fs-2"></i> <!-- Location Pin -->

                        <span class="menu-title ms-4">Spots</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->

                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>


                <div class="menu-item menu-accordion {{ request()->routeIs('gallery') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('gallery') ? 'active' : '' }}"
                        href="{{ route('gallery.index') }}">
                        <i class="ki-outline ki-element-12 fs-2"></i>
                        <span class="menu-title ms-4">Gallery</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->

                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('video') ? 'active' : '' }}"
                        href="{{ route('video.index') }}">
                        <i class="bi bi-youtube fs-2"></i>
                        <span class="menu-title ms-4">Video</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>

                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('team') ? 'active' : '' }}"
                        href="{{ route('team.index') }}">
                        <i class="bi bi-person fs-2"></i>
                        <span class="menu-title ms-4">Team</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>

                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('blog') ? 'active' : '' }}"
                        href="{{ route('blog.index') }}">
                        <i class="bi bi-journal-text fs-2"></i>
                        <span class="menu-title ms-4">Blog</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('blog') ? 'active' : '' }}"
                        href="{{ route('offers.index') }}">
                        <i class="bi bi-tag fs-2"></i>
                        <span class="menu-title ms-4">Offer</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    <!--end:Menu link-->

                    
                </div>
                <!--end:Menu item-->

                {{-- Add: Customer Menu item --}}
                @can('read customer')
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs('customers*', 'customer_type*', 'customer_ledgers*') ? 'here show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <i class="bi bi-person-vcard-fill fs-2"></i>
                            <span class="menu-title ms-4"> Customer</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                @can('read customer type')
                                    <a class="menu-link {{ request()->routeIs('customer_type.*') ? 'active' : '' }}"
                                        href="{{ route('customer_type.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Customer Type</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                @can('read customer')
                                    <a class="menu-link {{ request()->routeIs('customers.*') ? 'active' : '' }}"
                                        href="{{ route('customers.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add Customer</span>
                                    </a>
                                @endcan
                                <!--end:Menu link-->
                                <!--begin:Menu link-->
                                {{-- @can('read customer ledger')
                                                        <a class="menu-link {{ request()->routeIs('customer_ledgers.*') ? 'active' : '' }}"
                                                            href="{{ route('customer_ledgers.index') }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Customer Ledgers</span>
                                                        </a>
                                                    @endcan --}}
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcan
                {{-- End: Customer Menu item --}}


                @can('write user management')
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs('user-management.*') ? 'here show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <i class="bi bi-person-fill-gear fs-2"></i>
                            <span class="menu-title ms-4">User Management</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ request()->routeIs('user-management.users.*') ? 'active' : '' }}"
                                    href="{{ route('user-management.users.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Users</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ request()->routeIs('user-management.roles.*') ? 'active' : '' }}"
                                    href="{{ route('user-management.roles.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Roles</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ request()->routeIs('user-management.permissions.*') ? 'active' : '' }}"
                                    href="{{ route('user-management.permissions.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Permissions</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                @endcan
                <!--end:Menu item-->

                {{-- Add: DB Backup Menu item --}}
                {{-- @can('read dbbackup')
                    <div data-kt-menu-trigger="click"
                        class="menu-item menu-accordion {{ request()->routeIs('dbbackups.*') ? 'here show' : '' }}">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <i class="bi bi-database-check fs-2"></i>
                            <span class="menu-title ms-4">Database</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->

                                <a class="menu-link {{ request()->routeIs('dbbackups.index*') ? 'active' : '' }}"
                                    href="{{ route('dbbackups.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Database Backup</span>
                                </a>

                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endcan --}}
                {{-- End: DB Backup Menu item --}}

            </div>
        @endrole
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
