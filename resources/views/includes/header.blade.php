<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="/">
                    <img src="/logo.png" style="height: 50px" alt="Logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item submenu"><a class="nav-link" href="{{route('cars')}}">Cars</a>
                                <ul>
                                    <li><a href="{{route('cars')}}" class="nav-link"><span>All Cars</span></a></li>
                                    @foreach(\App\Models\Car\CarCategory::get() as $categ)
                                        <li class="nav-item"><a class="nav-link" href="{{route('cars.category',$categ->title)}}">{{$categ->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Supplier</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('contacts')}}">Contact Us</a></li>
                        </ul>
                    </div>

                </div>
                <!-- Main Menu End -->
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>

