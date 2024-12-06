<aside class="page-sidebar">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div class="main-sidebar " style="padding-top: 40px" id="main-sidebar">
        <ul class="sidebar-menu " id="simple-bar">
            <li class="pin-title sidebar-main-title">
                <div>
                    <h5 class="sidebar-title f-w-700">Pinned</h5>
                </div>
            </li>
            <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i>
                <a class="sidebar-link" href="/home">
                    <svg class="stroke-icon">
                        <use href="/assets/svg/iconly-sprite.svg#Paper"></use>
                    </svg>
                    <h6 class="f-w-600">Dashboard </h6>
                </a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h5 class="lan-1 f-w-700 sidebar-title">Merchant</h5>
                </div>
            </li>

            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                <a class="sidebar-link {{Route::is('merchant.manage') ? 'active' : null}}" href="javascript:void(0)">
                    <svg class="stroke-icon">
                        <use href="/assets/svg/iconly-sprite.svg#Home-dashboard"></use>
                    </svg>
                    <h6>Merchants</h6><span class="badge">3</span><i class="iconly-Arrow-Right-2 icli"></i>
                </a>
                <ul class="sidebar-submenu" style="display: {{Route::is('merchant.manage') ? 'block' : 'none'}}">
                    <li><a class="{{Route::is('merchant.manage') ? 'active' : null}}"  href="{{route('merchants')}}">All Merchants </a></li>
                    <li> <a href="/">Products</a></li>
                </ul>
            </li>


            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                <a class="sidebar-link" href="javascript:void(0)">
                    <svg class="stroke-icon">
                        <use href="/assets/svg/iconly-sprite.svg#Home-dashboard"></use>
                    </svg>
                    <h6>Transactions</h6><span class="badge">3</span><i class="iconly-Arrow-Right-2 icli"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li> <a href="/">All Transactions</a></li>
                    <li> <a href="/">Collections</a></li>
                    <li> <a href="/">Dismemberment</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</aside>
