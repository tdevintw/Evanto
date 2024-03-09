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
                        @include('Admin/includes/nav')
                        <div class="row">
                            <!-- Small table -->
                            <div class="col-md-12 my-4">
                                <h2 class="h4 mb-1">events Management</h2>
                                <p class="mb-3">here you can manage the platform's events requests</p>
                                <div style="margin-bottom: 10px">
                                    <a href="{{route('events.create')}}"><button type="button" class="btn btn-success">New Event</button></a>
                                </div>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- table -->
                                        <table class="table table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Event</th>
                                                    <th>User Name</th>
                                                    <th>Status</th>
                                                    <th>Created_at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($requests as $request)
                                                    <tr>
                                                        <td>{{ $request->id }}</td>
                                                        <td>{{ $request->event->title }}</td>
                                                        <td>{{ $request->user->name }}</td>
                                                        <td>{{ $request->status }}</td>
                                                        <td>{{ $request->created_at }}</td>
                                                        <td>
                                                            @if ($request->user->acces =='banned')
                                                            <button type="button" class="btn btn-danger"
                                                            data-toggle="dropdown">User Banned </button>
                                                            @else
                                                            <button type="button" class="btn btn-success"
                                                                data-toggle="dropdown">Actions</button>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <form action="{{ route('reserveAccept',$request->id) }}"
                                                                  method="post" >
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit"
                                                                        class="dropdown-item ">Accept</button>
                                                                </form>
                                                            

                                                                <form action="{{ route('reserveReject',$request->id) }}"
                                                                   method="post" >
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit"
                                                                        class="dropdown-item ">Reject</button>
                                                                </form>
                                                            </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        @if (count($requests)==0)
                                        <h3 style="text-align: center">There is no records for the moment</h3>    
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- customized table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
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
    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            var sidebar = document.getElementById('leftSidebar');
            if (sidebar.style.width === '60%') {
                sidebar.style.width = '0';
            } else {
                sidebar.style.width = '60%';
            }
        });
    </script>
    
    <script src="js/apps.js"></script>
</body>

</html>
