<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>

                    <div class="form-group">
                        <label for="kd_barang" class="col-md-3 control-label">List Barang</label>
                        <div class="col-md-6">
                            <input name="kd_barang" type="text" class="form-control flat" value="<?php echo $row->kd_barang; ?>" readonly="readonly">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_barang" class="col-md-3 control-label">Nama Barang</label>
                        <div class="col-md-6">
                            <input name="nama_barang" type="text" class="form-control flat" value="<?php echo $row->nama_barang; ?>" readonly="readonly">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="harga" class="col-md-3 control-label">Harga Barang</label>
                        <div class="col-md-6">
                            <input name="harga" type="text" class="form-control flat" value="<?php echo $row->harga; ?>" readonly="readonly">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="qty" class="col-md-3 control-label">Jumlah Orderan</label>
                        <div class="col-md-3">
                            <input name="qty" type="text" class="form-control flat">
                        </div>
                    </div>

    <?php
    }
}
?>