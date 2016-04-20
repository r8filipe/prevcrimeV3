</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>dist/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>dist/datatables/media/js/jquery.dataTables.min.js"></script>
<script
    src="<?php echo base_url(); ?>dist/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>dist/custom/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-event').DataTable({
            responsive: true,
            order: [[0, "desc"]]
        });
    });
</script>

</body>

</html>
