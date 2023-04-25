</div>
</section>
<!-- /.content -->
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022
        <a href="">Punya Saya</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Datatables -->
<script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js">
</script>
<script src="assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js">
</script>
<script src="assets/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="assets/plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


<script>
$(document).ready(function() {
    $('#datatables').DataTable({
        order: [
            [9, 'desc']
        ],
        buttons: ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#datatables_wrapper .col-md-6:eq(0)');
    $('#datatablesnilai').DataTable();
});
// $(function() {
//     $("#datatables").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "buttons": ["copy", "csv", "excel", "pdf", "print"]
//     }).buttons().container().appendTo('#datatables .col-md-6:eq(0)');
// });
// 
</script>
</body>

</html>