<!doctype html>
<html lang="en">
@include('Admin/includes/head')
<body class="vertical  light  ">
    <div class="wrapper">
        @include('Admin/includes/aside')
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h5 page-title">Welcome Back , {{ $user->name }} !</h2>
                            </div>
                        </div>
                        <div class="mb-2 align-items-center">
                            <div class="card shadow mb-4">
                                <div class="container-fluid p-5">
                                    <h2 class=" text-dark">Stats</h2>
                                    @if ($user->role == 'admin')
                                     <div class="header-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Users</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$users}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/476/476863.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Since website launch</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                   
                                                                    Events</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$events}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/2558/2558944.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Since website launch</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Tickets
                                                                </h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$tickets}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/470/470835.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Since website launch</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Categories</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/718/718970.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Since website launch</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Banned Users</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$bans}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/11244/11244277.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Since website launch</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Public</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$public}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/6360/6360268.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Number Of Public Events</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Private</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$private}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/4413/4413865.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Number Of Private Events</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Rate %</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$rate}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/190/190411.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Acceptance of Requests Rate</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                   Launch %</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$rateE}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/1067/1067357.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Rate of Launched Events</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>   
                                    @else
                                    <div class="header-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Users</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$users}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/476/476863.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Number of users attend your events</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                   
                                                                    Events </h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$events}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/2558/2558944.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Personal Event Number</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Buyed Tickets
                                                                </h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$tickets}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/470/470835.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Numbers of selled Tickets</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Request</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/718/718970.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Number Of Requests sent to you</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Public</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/6360/6360268.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Number Of Public Events</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Private</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/4413/4413865.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Number Of Private Events</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                    Rate %</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/190/190411.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Acceptance of Requests Rate</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6">
                                                <div class="card card-stats mb-4 mb-xl-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                                   Launch Rate %</h5>
                                                                <span class="h2 font-weight-bold mb-0">{{$categories}}</span>
                                                            </div>
                                                            <div class="col-auto">
                                                                <img style="width: 50px" src="https://cdn-icons-png.flaticon.com/256/1067/1067357.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 mb-0 text-muted text-sm">

                                                            <span class="text-nowrap">Rate of Launched Events</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>   
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('assets/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/d3.min.js') }}"></script>
    <script src="{{ asset('assets/js/topojson.min.js') }}"></script>
    <script src="{{ asset('assets/js/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('assets/js/datamaps.custom.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script>
        /* define global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('assets/js/gauge.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts.custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/uppy.min.js') }}"></script>
    <script src="{{ asset('assets/js/quill.min.js') }}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
    <script src="js/apps.js"></script>
</body>

</html>
