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
                    <i class="icon icon-home"></i>
                    <h6 class="f-w-600">Dashboard </h6>
                </a>
            </li>



            @if(Auth::user()->hasRole('admin'))
                <li class="sidebar-main-title">
                    <div>
                        <h5 class="f-w-700 sidebar-title">Merchants</h5>
                    </div>
                </li>

                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="{{route('merchants')}}">
                        <i class="icon iconly-Buy"></i>
                        <h6>Merchants</h6>
                    </a>
                </li>


                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="{{route('admin.transactions')}}">
                        <i class="icon icon-wallet"></i>
                        <h6>Collections</h6>
                    </a>
                </li>


                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="{{route('admin.disbursements')}}">
                        <i class="icon iconly-Logout"></i>
                        <h6>Disbursements</h6>
                    </a>
                </li>

            @endif


            @if(Auth::user()->hasRole('merchant'))
                <li class="sidebar-main-title">
                    <div>
                        <h5 class="f-w-700 sidebar-title pt-3">Business</h5>
                    </div>
                </li>


                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="{{route('business.transactions',Auth::user()->businesses()->first()->id)}}">
                        <i class="icon icon-wallet"></i>
                        <h6>Collections</h6>
                    </a>
                </li>
                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="{{route('business.disbursements',Auth::user()->businesses()->first()->id)}}">
                        <i class="icon iconly-Logout"></i>
                        <h6>Disbursements</h6>
                    </a>
                </li>

                <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                    <a class="sidebar-link" href="{{route('merchant.manage',Auth::user()->businesses()->first()->id)}}">
                        <i class="icon icon-settings"></i>
                        <h6>Settings</h6>
                    </a>
                </li>
            @endif

        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</aside>
