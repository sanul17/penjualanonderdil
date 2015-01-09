 </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->



<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/app.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/demo.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/chosen.jquery.js');?>"></script>
<!-- page script -->
<script type="text/javascript">
$(function() {
    $('.chzn-select').chosen({width: "95%"});
    $('.chzn-select-deselect').chosen({allow_single_deselect:true});

    $("#dataTable").DataTable({
       "aoColumnDefs": [
       { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
       ],
   });

    $.ajax({
        url: '<?php echo base_url(); ?>dashboard/barangNotification',
    })
    .done(function(msg) {
        $('#barang_notification').html(msg)
        console.log(msg);
    });
    
    $.ajax({
        url: '<?php echo base_url(); ?>dashboard/orderNotification',
    })
    .done(function(msg) {
        $('#order_notification').html(msg)
        console.log(msg);
    });

    $.ajax({
        url: '<?php echo base_url(); ?>dashboard/notification',
    })
    .done(function(msg) {
        $('#notification').html(msg)
        console.log(msg);
    });
    
});


 </script>
</body>
</html>
