<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>

        <div class="form-group">
            <label for="kd_barang" class="col-md-3 control-label">Kode Barang</label>
            <div class="col-md-6">
                <input name="kd_barang" id="kd_barang"  type="text" class="form-control flat" value="<?php echo $row->kd_barang; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label for="nama_barang" class="col-md-3 control-label">Nama Barang</label>
            <div class="col-md-6">
                <input name="nama_barang" id="nama_barang"  type="text" class="form-control flat" value="<?php echo $row->kategori.' '.$row->type; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label for="brand" class="col-md-3 control-label">Brand</label>
            <div class="col-md-6">
                <input name="brand" id="brand"  type="text" class="form-control flat" value="<?php echo $row->brand; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label for="harga_beli" class="col-md-3 control-label">Harga Beli</label>
            <div class="col-md-6">
                <input name="harga_beli" id="harga_beli"  type="text" class="form-control flat" value="<?php echo $row->modal; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="qty" class="col-md-3 control-label">Quantity</label>
            <div class="col-md-3">
                <input name="qty" id="qty"  type="text" class="form-control flat">
            </div>
        </div>

        <?php
    }
}
?>