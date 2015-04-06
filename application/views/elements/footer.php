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
        $('.barang_notification').html(msg)
        console.log(msg);
    });
    
    $.ajax({
        url: '<?php echo base_url(); ?>dashboard/orderNotification',
    })
    .done(function(msg) {
        $('.order_notification').html(msg)
        console.log(msg);
    });

    $.ajax({
        url: '<?php echo base_url(); ?>dashboard/notification',
    })
    .done(function(msg) {
        $('.notification').html(msg)
        console.log(msg);
    });
    
});


$("#import-excel").fileinput({
    showPreview: false,
    previewSettings : {image: {width : "240px", height : "auto" }},
    allowedFileExtensions : ['xls', 'xlsx'],
    overwriteInitial: false,
    maxFileCount: 1
});

$("#import-excel").change(function (){
    var fileName = $(this).val();
    if (fileName != '') {
        $('#import-submit').removeAttr('disabled');
    }else{
        $('#import-submit').attr('disabled', 'disabled');
    }
});

</script>
</body>
</html>
