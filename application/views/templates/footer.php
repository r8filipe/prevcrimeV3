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
<script src="<?php echo base_url(); ?>dist/datatables-plugins/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>dist/datatables-plugins/Buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>dist/datatables-plugins/Buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>dist/datatables-plugins/Buttons/js/buttons.print.min.js"></script>

<!-- JSZip -->
<script src="<?php echo base_url(); ?>dist/datatables-plugins/JSZip/dist/jszip.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>dist/custom/js/sb-admin-2.js"></script>

<!-- Bootstrap-datepicker 1.6 -->
<script src="<?php echo base_url(); ?>dist/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>dist/bootstrap-datepicker/locales/bootstrap-datepicker.pt.min.js" charset="UTF-8"></script>
<script src="<?php echo base_url(); ?>dist/bootstrap-datepicker/locales/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script>
<script src="<?php echo base_url(); ?>dist/bootstrap-datepicker/locales/bootstrap-datepicker.fr.min.js" charset="UTF-8"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $('#datepicker input').datepicker({
        format: "yyyy-mm-dd",
        language: '<?php echo ($dimL = (isset($_SESSION['language'])?$_SESSION['language']:$this->config->item('language')))=='portuguese'?'pt':($dimL=='english'?'en-GB':'fr'); ?>'
    });

    $(document).ready(function () {
        var events_table = $('#dataTables-event').DataTable({
            dom: 'lfrtBp',
            buttons: [
                'csv', 'excel'
            ],
            responsive: true,
            order: [[0, "desc"]],
            language: {
                url:"<?php echo base_url();?>dist/datatables-plugins/i18n/<?php echo (isset($_SESSION['language'])?$_SESSION['language']:$this->config->item('language'));?>.json"
            },
        });
        new $.fn.dataTable.FixedHeader( events_table );

    });
</script>

<!-- Charts -->

<script src="<?php echo base_url(); ?>dist/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>dist/flot/jquery.flot.pie.js"></script>


<?php echo ($dimL = (isset($_SESSION['language'])?$_SESSION['language']:$this->config->item('language')))=='portuguese'?'pt':($dimL=='english'?'en-GB':'fr'); ?>
</body>

</html>