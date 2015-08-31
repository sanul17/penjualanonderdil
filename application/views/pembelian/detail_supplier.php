
                    <?php
                    if (form_error('alamat')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="alamat" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control flat" id="alamat" name="alamat" readonly value='<?php echo $alamat; ?>'>
                    </div>
                    <div class="col-md-4"><?php echo form_error('alamat'); ?></div>
                </div>

                    <?php
                    if (form_error('kota')) {
                        echo '<div class="form-group has-error">';
                    }else{
                        echo '<div class="form-group">';
                    }
                    ?>
                    <label for="kota" class="col-md-2 control-label">Kota</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control flat" id="kota" readonly name="kota" value='<?php echo $kota; ?>'>
                    </div>
                    <div class="col-md-2"><?php echo form_error('kota'); ?></div>
                </div>
            <hr>                        
            <div class="box-button">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Data Pembelian</h4>
                    </div>
                </div>
                <div class="cleaner_h3"></div>
            </div>
            <div class="box-body table-responsive">
                <div class="cleaner_h3"></div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:120px;">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Brand</th>
                            <th style="width:150px;">Quantity</th>
                            <th style="width:150px;">Harga</th>
                            <th style="width:150px;">Sub Total</th>
                            <th style="text-align:center; width:150px;"  class="action"><a href="#modalAddPembelianBarang" data-toggle="modal" class="btn btn-default flat"><i class="fa fa-plus fa-fw"></i> Add Barang</a></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr class="gradeX">
                            <td colspan="5">Total</td>
                            <td><span id="total-label"></span><input type="hidden" class="form-control" id="total" name="total"></td>
                            <td style="text-align:center;" colspan="2"> - </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="cleaner_h20"></div>
                <div class="form-group">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary flat" id="submit" disabled>Beli</button>
                        <a href="<?php echo base_url('pembelian');?>" class="btn btn-default flat">Cancel</a>
                    </div>
                </div>