<!-- Bootstrap core JavaScript-->
<script>
    var ROOT = "{{asset('/')}}";
</script>
<script src="{{ asset('/')}}admin/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/')}}admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('/')}}admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('/')}}admin/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="{{ asset('/')}}admin/vendor/chart.js/Chart.min.js"></script>
<script src="{{ asset('/')}}admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/')}}admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/sl-1.6.2/datatables.min.css" rel="stylesheet"/>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>  --}}
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/sl-1.6.2/datatables.min.js"></script>


<script src="{{ asset('/')}}admin/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="{{ asset('/')}}admin/vendor/sweetalert/sweetalert.min.js"></script>
<script src="{{ asset('/')}}admin/vendor/summernote/summernote.js"></script>
<script src="{{ asset('/')}}admin/js/custom.js"></script>
@yield('scripts')

@if (session()->has('success'))
    <script>
        "use strict";
        var content = {};

        content.message = '{{session('success')}}';
        content.title = 'Success';
        content.icon = 'fa fa-bell';

        $.notify(content,{
            type: 'success',
            placement: {
                from: 'top',
                align: 'right'
            },
            showProgressbar: true,
            time: 5000,
            delay: 5000,
        });
    </script>
@endif


@if (session()->has('warning'))
    <script>
        "use strict";
        var content = {};

        content.message = '{{session('warning')}}';
        content.title = 'Warning!';
        content.icon = 'fa fa-bell';

        $.notify(content,{
            type: 'warning',
            placement: {
                from: 'top',
                align: 'right'
            },
            showProgressbar: true,
            time: 5000,
            delay: 5000,
        });
    </script>

    @endif
