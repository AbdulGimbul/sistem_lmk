<footer class="main-footer">

    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>

    All rights reserved.

    <div class="float-right d-none d-sm-inline-block">

        <b>Version</b> 3.1.0

    </div>

</footer>



<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

</aside>

<!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->

<script src="<?= base_url('/assets/themes/plugins/jquery/jquery.min.js') ?>"></script>

<script src="<?= base_url('/assets/js/jquery-3.6.0.min.js') ?>"></script>

<!-- jQuery UI 1.11.4 -->

<script src="<?= base_url('/assets/themes/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->

<script src="<?= base_url('/assets/themes/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Sparkline -->

<script src="<?= base_url('/assets/themes/plugins/sparklines/sparkline.js') ?>"></script>

<!-- JQVMap -->

<script src="<?= base_url('/assets/themes/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>

<!-- jQuery Knob Chart -->

<script src="<?= base_url('/assets/themes/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>

<!-- daterangepicker -->

<script src="<?= base_url('/assets/themes/plugins/moment/moment.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/daterangepicker/daterangepicker.js') ?>"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="<?= base_url('/assets/themes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

<!-- Summernote -->

<script src="<?= base_url('/assets/themes/plugins/summernote/summernote-bs4.min.js') ?>"></script>

<!-- overlayScrollbars -->

<script src="<?= base_url('/assets/themes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>

<!-- AdminLTE App -->

<script src="<?= base_url('/assets/themes/dist/js/adminlte.min.js') ?>"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?= base_url('/assets/themes/dist/js/demo.js') ?>"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?= base_url('/assets/themes/dist/js/pages/dashboard.js') ?>"></script>

<!-- DataTables  & Plugins -->

<script src="<?= base_url('/assets/themes/plugins/datatables/jquery.dataTables.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/jszip/jszip.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/pdfmake/pdfmake.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/pdfmake/vfs_fonts.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>

<script src="<?= base_url('/assets/themes/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- Wizard Form Multistep -->
<script src="<?= base_url('/assets/js/popper.min.js') ?>"></script>
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src="<?= base_url('/assets/js/jquery.steps.js') ?>"></script>
<script src="<?= base_url('/assets/js/particles.js') ?>"></script>

<!-- Page specific script -->

<script>
    $(function() {

        $("#example1").DataTable({

            "responsive": true,

            "lengthChange": false,

            "autoWidth": false,

            "buttons": [{
                extend: 'print',
                text: 'Cetak',
                title: '<br><center><b>Les Mengaji Kuningan</b> <br> <p style="font-size: 14px"> Jl. Kramatmulya - Cikaso No.65, Karangmangu, Kec. Kramatmulya, Kabupaten Kuningan, Jawa Barat 45553</p></center><br>',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<img src="<?= base_url('/assets/img/watermark-lmk.png') ?>" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width:35%" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }, "copy", "excel", "colvis"]

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#table-minimal').DataTable({

            "paging": false,

            "lengthChange": false,

            "searching": false,

            "ordering": true,

            "info": true,

            "autoWidth": false,

            "responsive": true,

        });

    });
</script>



<script type="text/javascript">
    $(document).ready(function() {

        var maxField = 5; //Input fields increment limitation

        var addButton = $('#add_button'); //Add button selector

        var wrapper = $('.field_wrapper'); //Input field wrapper

        var x = 1; //Initial field counter is 1



        //Once add button is clicked

        $(addButton).click(function() {

            //Check maximum number of input fields

            if (x < maxField) {

                x++; //Increment field counter

                $(wrapper).append('<div class="row mb-3" id="row' + x + '"><div class="col-sm-5"><select class="custom-select" name="hari[]" id="hari"><option value="Senin" selected>Senin</option><option value="Selasa">Selasa</option><option value="Rabu">Rabu</option><option value="Kamis">Kamis</option><option value="Jumat">Jumat</option><option value="Sabtu">Sabtu</option></select></div><div class="col-sm-5"><select class="custom-select" name="jam[]" id="jam"><option value="08.00" selected>08.00</option><option value="08.30">08.30</option><option value="09.00">09.00</option><option value="09.30">09.30</option><option value="10.00">10.00</option><option value="10.30">10.30</option><option value="11.00">11.00</option><option value="11.30">11.30</option><option value="12.00">12.00</option><option value="12.30">12.30</option><option value="13.00">13.00</option><option value="13.30">13.30</option><option value="14.00">14.00</option><option value="14.30">14.30</option><option value="15.00">15.00</option><option value="15.30">15.30</option><option value="16.00">16.00</option><option value="16.30">16.30</option></select></div><div class="col-sm-2 div-hapus"><a href="javascript:void(0)" class="btn btn-danger remove_button" id="' + x + '">X</a></div></div></tr></div>'); //Add field  HTML

            }

        });



        //Once remove button is clicked

        $(wrapper).on('click', '.remove_button', function() {

            var btn_id = $(this).attr("id");

            $('#row' + btn_id + '').remove();

            x--; //Decrement field counter

        });



    });
</script>



<script>
    $(document).on('click', '#select', function() {

        var id_guru = $(this).data('id');

        var nama = $(this).data('name');

        $('#id_guru').val(id_guru);

        $('#guru').val(nama);

        $('#modal-guru').modal('hide');

    })
</script>

<script>
    $(function() {

        $('.tampilModalUbah').on('click', function() {

            const id = $(this).data('id');

            $.ajax({
                url: 'https://abdl.alterdev.id/jadwal/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log("ok");
                    $('#nama').val(data.nama);
                    $('#hari').val(data.hari);
                    $('#jam').val(data.jam);
                    $('#id').val(data.id_jadwal);
                }
            })

        });

    });
</script>

<script>
    $(function() {

        $('.tampilModalUbahLuang').on('click', function() {

            const id = $(this).data('id');

            $.ajax({
                url: 'https://abdl.alterdev.id/guru/getubah',
                // url: 'http://localhost/project-lmk-hosting/public/guru/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log("ok");
                    $('#hari').val(data.hari);
                    $('#jam').val(data.jam);
                    $('#id').val(data.id_ketersediaan);
                }
            })

        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 160,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 1,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 4,
                        "size_min": 0.3,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 600
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 250,
                        "size": 0,
                        "duration": 2,
                        "opacity": 0,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 400,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    });
</script>

<script>
    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age").val()) < 18) {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Data telah disimpan sementara, silahkan lanjutkan memilih guru ngaji!");
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
</script>

</body>


</html>