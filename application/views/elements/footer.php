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
       ]
   });    

    $("#dataTableBarang").DataTable({
       "aoColumnDefs": [
       { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
       ], 
       "ajax": "<?php echo base_url('barang/getBarang')?>",
       "deferRender": true,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td class="bg-light-blue" colspan="11">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        },
       "columns": [
       { "data": "kd_barang" },
       { "data": "nama_barang" },
       { "data": "kategori" },
       { "data": "type" },
       { "data": "brand" },
       { "data": "min_stok" },
       { "data": "stok" },
       { "data": "modal" },
       { "data": "harga" },
       { "data": "posisi" },
       { "data": "action" }
       ]
   });

    $("#dataTableTipeKategori").DataTable({
       "aoColumnDefs": [
       { 'bSortable': false, 'bSearchable' : false, 'aTargets': [ 'action' ] }
       ], 
       "ajax": "<?php echo base_url('barang/getTipeKategori')?>",
       "deferRender": true,
       "columns": [
       { "data": "kategori" },
       { "data": "type" },
       { "data": "action" }
       ]
   });

    $(".dataTableReport").DataTable();

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
