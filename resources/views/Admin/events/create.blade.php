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
                                <h2 class="h4 mb-1">Add Event</h2>
                                <p class="mb-3">here you can Add the platform's events</p>
                                <div style="display:flex;flex-direction:flex;justify-content:center">
                                    <form style="width:50%" action="{{ route('events.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="organize_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input style="width:50%" name="title" type="text" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Title">
                                        </div>
                                        @if ($errors->has('title'))
                                            <p class="text-danger">{{ $errors->first('title') }}</p>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea style="width:50%" name="description" type="text"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Description"></textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <p class="text-danger">{{ $errors->first('description') }}</p>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select  name="category_id" class="form-select"
                                                aria-label="Default select example">
                                                <option>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('category_id'))
                                            <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tickets</label>
                                            <input style="width:50%" name="tickets" type="number"  class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Number of tickets">
                                        </div>
                                        @if ($errors->has('tickets'))
                                            <p class="text-danger">{{ $errors->first('tickets') }}</p>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input style="width:50%" name="image" type="file" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Category">
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input style="width:50%" name="location" type="text" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Location">
                                        </div>
                                        @if ($errors->has('location'))
                                            <p class="text-danger">{{ $errors->first('location') }}</p>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date</label>
                                            <input style="width:50%" name="date" type="datetime-local"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Location">
                                        </div>
                                        @if ($errors->has('date'))
                                            <p class="text-danger">{{ $errors->first('date') }}</p>
                                        @endif
                                        <div class="form-group" style="display: flex ; gap:5px">
                                            <label for="exampleInputEmail1">Reserve Method:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reserve_method"
                                                    id="exampleRadios1" value="default">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Default
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="reserve_method"
                                                    id="exampleRadios2" value="request">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Request
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('reserve_method'))
                                        <p class="text-danger">{{ $errors->first('reserve_method') }}</p>
                                    @endif
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
