<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>
                    
                    <div class="form-group">
                        <label for="nama_barang" class="col-md-3 control-label">Nama Barang</label>
                        <div class="col-md-6">
                            <input name="nama_barang" id="nama_barang" type="text" class="form-control flat" value="<?php echo $row->kategori." ".$row->type; ?>" readonly="readonly">
                            <input name="id_tipe_kategori" id="id_tipe_kategori" type="hidden" class="form-control flat" value="<?php echo $row->id_tipe_kategori; ?>">
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <label for="qty" class="col-md-3 control-label">Jumlah Orderan</label>
                        <div class="col-md-3">
                            <input name="qty" id="qty" type="text" class="form-control flat">
                        </div>
                    </div>

    <?php
    }
}
?>
