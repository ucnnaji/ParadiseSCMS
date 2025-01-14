<?php include("functions/top.php"); 
$data = $_SESSION['AdminID'];
$sql = "SELECT * FROM students WHERE `AdminID` = '$data'";
$rss = query($sql);

if (row_count($rss) == 0) {
  
  echo "$(toastr.error('Invalid ID'))";
}

$row = mysqli_fetch_array($rss);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Result</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Result</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <form method="POST">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Check Result</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Select a Session .:</label>
                                    <select name="ses" id="ses" class="form-control">

                                        <?php
$sl = "SELECT * FROM `sessions` ORDER BY `id` desc";
$ww = query($sl);
while ($rw = mysqli_fetch_array($ww)) {
 ?>
                                        <option name="class" id="ses"><?php echo $rw['ses'] ?></option>
                                        <?php
                                }
                                ?>
                                    </select>
                                </div>
                               <label>Select Class.:</label>
                                <select name="cls" id="cls" class="custom-select">
                                    <option name="cls" id="cls">Creche</option>
                                    <option name="cls" id="cls">KG 1</option>
                                    <option name="cls" id="cls">KG 2</option>
                                    <option name="cls" id="cls">Nursery 1</option>
                                    <option name="cls" id="cls">Nursery 2</option>
                                    <option name="cls" id="cls">Basic 1</option>
                                    <option name="cls" id="cls">Basic 2</option>
                                    <option name="cls" id="cls">Basic 3</option>
                                    <option name="cls" id="cls">Basic 4</option>
                                    <option name="cls" id="cls">Basic 5</option>
                                    <option name="cls" id="cls">J.S.S 1</option>
                                    <option name="cls" id="cls">J.S.S 2</option>
                                    <option name="cls" id="cls">J.S.S 3</option>
                                    <option name="cls" id="cls">S.S.S 1</option>
                                    <option name="cls" id="cls">S.S.S 2</option>
                                    <option name="cls" id="cls">S.S.S 3</option>
                                </select>
                                <br /><br />

                                <label>Select Term.:</label>
                                <select name="tmms" id="tmms" class="custom-select">
                                    <option name="tmms" id="tmms">1st Term</option>
                                    <option name="tmms" id="tmms">2nd Term</option>
                                    <option name="tmms" id="tmms">3rd Term</option>
                                </select>
                                <br /><br />
                                <!-- /.input group -->
                            </div
                            <input type="text" id="admn" value="<?php echo $row['AdminID'] ?>" hidden>
                            <div class="card-footer">
                                <button type="button" name="submit" id="chk" class="btn btn-primary">Check
                                    Result</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </form>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("include/footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page script -->
<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>
<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

})
</script>
<script src="ajax.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
});
</script>
</body>

</html>
<?php
//notification for null result
if(isset($_SESSION['nah'])) {
   echo "<script>$(toastr.error('Result for you hasn`t been uploaded yet. Kindly check back later.'));</script>";

}

?>
