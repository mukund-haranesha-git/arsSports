<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | {{ $menu }}</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('website/assets/images/favicon.ico')}}" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/iCheck/flat/blue.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/drag_drop/jquery-ui.css')}}">
    <!-- CHECKBOX STYLE CSS  -->
    <link rel="stylesheet" href="{{ URL::asset('assets/sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/checkbox.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/radio2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/owl.carousel.min.css') }}">
</head>
<body class="hold-transition sidebar-mini " id="bodyid">
<div id="loader" class="lds-dual-ring hidden overlay"></div>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('admin/dashboard') }}" class="nav-link">Dashboard</a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4" id="left-menubar" style="min-height:0!important; overflow-x: hidden;">
        <a href="{{url('/admin')}}" class="brand-link" style="text-align: center">
            <span class="brand-text font-weight-light"><b>{{ config('app.name') }}</b> Admin</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview @if(isset($menu) && $menu=='User') menu-open  @endif" style="border-bottom: 1px solid #4f5962; margin-bottom: 4.5%;">
                        <a href="#" class="nav-link @if(isset($menu) && $menu=='User') active  @endif">
                            <img src=" {{url('assets/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image" style="width: 2.1rem; margin-right: 1.5%;">
                            <p style="padding-right: 6.5%;">
                                {{ $user = Auth::user()->name }}
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                @php $eid = \Illuminate\Support\Facades\Auth::user()->id; @endphp
                                <a href="{{ url('admin/profile_update/'.$eid.'/edit') }}" class="nav-link @if(isset($menu) && $menu=='User') active @endif">
                                    <i class="nav-icon fa fa-pencil"></i><p class="text-warning">Edit Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/logout') }}" class="nav-link">
                                    <i class="nav-icon fa fa-sign-out"></i><p class="text-danger">Logout</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link @if($menu=='Dashboard') active @endif">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/banner') }}" class="nav-link @if($menu == 'Banner') active @endif">
                            <i class="nav-icon fa fa-image"></i>
                            <p>Banner</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/category') }}" class="nav-link @if($menu == 'Category') active @endif">
                            <i class="nav-icon fa fa-sitemap"></i>
                            <p>Category</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/products') }}" class="nav-link @if($menu == 'Products') active @endif">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/settings') }}" class="nav-link @if($menu == 'Settings') active @endif">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>Settings</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/contactUs') }}" class="nav-link @if($menu == 'Contact Us') active @endif">
                            <i class="nav-icon fa fa-phone-square"></i>
                            <p>Contact Us</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    @yield('content')

    <footer class="main-footer">
        <strong>© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}. All Rights Reserved.</strong>
        <strong class="pull-right">Developed By <a href="mailto: mukundharanesha@gmail.com">Mukund Haranesha</a></strong>
    </footer>
</div>
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/jQuery/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<script src="{{ URL::asset('assets/plugins/drag_drop/jquery-1.12.4.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/drag_drop/jquery-ui.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ URL::asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/knob/jquery.knob.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{ URL::asset('assets/dist/js/adminlte.js')}}"></script>
<script src="{{ URL::asset('assets/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ URL::asset('assets/dist/js/demo.js')}}"></script>
<script src="{{ URL('assets/dist/js/custom.js')}}"></script>
<script src="{{ URL('assets/dist/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/ladda/ladda-themeless.min.css')}}">
<script src="{{ URL::asset('assets/plugins/ladda/spin.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/ladda/ladda.min.js')}}"></script>
<script src="{{ URL::asset('assets/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('assets/dist/js/owl.carousel.js')}}"></script>
<script>Ladda.bind( 'input[type=submit]' );</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('.select2').select2();
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "dom": '<"top"i>rt<"bottom"flp><"clear">'
        });

        $('#example3').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "dom": '<"top"i>rt<"bottom"flp><"clear">'
        });

        /*Datepicker*/
        $('#datepicker2').datepicker({
            format: 'yyyy-m-d',
            startDate: '+0d',
            autoclose: true,
        });

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        });

        $(".timepicker").timepicker({
            showInputs: false,
            minuteStep: 1,
            showMeridian: true,
        });

        $('.my-colorpicker1').colorpicker()
    });
</script>

<script src="{{ URL::asset('assets/plugins/summernote/summernote.js') }}"></script>

<script type="text/javascript">
    /*DISPLAY IMAGE*/
    function AjaxUploadImage(obj,id){
        var file = obj.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
        {
            $('#previewing'+URL).attr('src', 'noimage.png');
            alert("<p id='error'>Please select a valid image file</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            //$("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        } else{
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(obj.files[0]);
        }
    }
    function imageIsLoaded(e){
        $('#DisplayImage').css("display", "block");
        $('#DisplayImage').css("margin-top", "1.5%");
        $('#DisplayImage').attr('src', e.target.result);
        $('#DisplayImage').attr('width', '150');
    }

    /*REORDER CODE*/
    function slideout() {
        setTimeout(function() {
            $("#responce").slideUp("slow", function() {
            });
        }, 3000);
    }
    $("#responce").hide();

    $( function() {
        $( "#sortable" ).sortable({opacity: 0.9, cursor: 'move', update: function() {
                var order = $(this).sortable("serialize") + '&update=update';
                var reorder_url = $(this).attr("url");
                $.get(reorder_url, order, function(theResponse) {
                    $("#responce").html(theResponse);
                    $("#responce").slideDown('slow');
                    slideout();
                });
            }});
        $( "#sortable" ).disableSelection();
    } );

    /*SUMMER NOTE CODE*/
    $(function (){
        $("textarea[id=description]").summernote({
            height: 350,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize', 'height']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['table','picture','link','map','minidiag']],
                ['misc', ['fullscreen', 'codeview']],
            ],
            callbacks: {
                onImageUpload: function(files) {
                    for (var i = 0; i < files.length; i++)
                        upload_image(files[i], this);
                }
            },
        });
        function upload_image(file, el) {
            // var token = $('meta[name="csrf-token"]').attr('content');
            var form_data = new FormData();
            form_data.append('image', file);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                data: form_data,
                url: '{{url('admin/image/upload')}}',
                type: "post",
                cache: false,
                contentType: false,
                processData: false,
                success: function(img){
                    $(el).summernote('editor.insertImage', img);
                }
            });
        }
    });
</script>
</body>
</html>
