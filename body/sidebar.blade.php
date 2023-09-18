 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-tools-fill"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="geral.html">General</a></li>
                                    <li><a href="l10n-read.html">Localization</a></li>
                                    <li><a href="Company.html">Company</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-table-2"></i>
                                    <span>Common Tables</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('supplier.all')}}">Supplier</a></li>
                                    <li><a href="{{route('family.all')}}">Family</a></li>
                                    <li><a href="{{route('unitMeasure.all')}}">Units of Measure</a></li>
                                    <li><a href="{{route('taxRate.all')}}">Tax Rates</a></li>
                                    <li><a href="{{route('postalCode.all')}}">Postal Codes</a></li>
                                    <li><a href="{{route('product.all')}}">Products</a></li>



                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-file-text-line"></i>
                                    <span>Documents</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Entry Documents</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="{{route('excelDownloadView')}}">Download Table Excel</a></li>
                                            <li><a href="{{route('purchaseOrder.all')}}">Purchase Order</a></li>
                                            <li><a href="{{route('printPurchaseOrder.list')}}">Print Purchase Order</a></li>
                                            <li><a href="{{route('savePurchaseOrder.list')}}">Saved Purchases Orders</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-table-2"></i>
                                    <span>Statistics</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('statistics.all')}}">Products Statistics</a></li>

                                </ul>
                            </li>

                            <li class="menu-title">Infrastructure</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>ERP4U Ticket Line</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Utility</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">

                                </ul>
                            </li>






                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
