<!DOCTYPE html>
<html lang="en">

@include('admin.partial.header')

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
@if(!empty(auth()->user()))
     <!-- Sidebar -->
@include('admin.partial.left-menu')
<!-- End of Sidebar -->
@endif
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            @if(!empty(auth()->user()))
            <!-- Topbar -->
            @include('admin.partial.top-bar')
            <!-- End of Topbar -->
            @endif
            <!-- Begin Page Content -->
            @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        {{-- <footer class="sticky-footer bg-white py-3">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>&copy; 2023 </span>
                </div>
            </div>
        </footer> --}}
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Loader --}}
<div class="request-loader">
    <img src="{{asset('admin/img/loader.gif')}}" alt="">
</div>
{{-- Loader --}}
@include('admin.partial.footer')

</body>
</html>
