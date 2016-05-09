</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>dist/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>dist/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/datatables-plugins/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>dist/datatables-plugins/filtering/row-based/js/range_dates.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>dist/custom/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        var events_table = $('#dataTables-event').DataTable({
            responsive: true,
            order: [[0, "desc"]],
            language: {
                url:"<?php echo base_url();?>dist/datatables-plugins/i18n/<?php echo (isset($_SESSION['language'])?$_SESSION['language']:$this->config->item('language'));?>.json"
            }
        });
        $('#dataTables-event').DataTable().columnFilter
        new $.fn.dataTable.FixedHeader( events_table );
        $('#begin_date').keyup( function() { events_table.draw(); } );
        $('#end_date').keyup( function() { events_table.draw(); } );
    });
</script>

</body>

</html>
