@include('layouts.header')
<!-- Navbar -->
@include('layouts.nav')
<!-- End Navbar -->
<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End sidebar -->
        <!-- Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                @yield('title-content')
            </div>
            @yield('content')
        </main>
        <!-- End content -->
    </div>
</div>
<!-- End main content -->
@include('layouts.footer')
