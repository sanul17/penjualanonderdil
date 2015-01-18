 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
        Cetak Faktur
        <small><?php echo $kd_penjualan; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Penjualan</a></li>
        <li class="active">Cetak Faktur</li>
    </ol>
</section>

<div class="pad margin no-print">
    <div class="alert alert-info" style="margin-bottom: 0!important;">
        <i class="fa fa-info"></i>
        <b>Note:</b> This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
    </div>
</div>

<!-- Main content -->
<section class="content invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                Toko Onderdil Ci Santi
                <small class="pull-right"><?php echo gmdate('d/m/Y - H:i:s', $tgl_penjualan); ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Admin, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br/>
                Email: info@almasaeedstudio.com
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>John Doe</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br/>
                Email: john.doe@example.com
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #007612</b><br/>
            <br/>
            <b>Order ID:</b> 4F3S8J<br/>
            <b>Payment Due:</b> 2/22/2014<br/>
            <b>Account:</b> 968-34567
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:50px;">No</th>
                        <th style="width:120px;">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="width:100px;">Quantity</th>
                        <th style="width:150px;">Harga</th>
                        <th style="width:80px;">Dus</th>
                        <th style="width:150px;">Sub Total</th></tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1; $no=1;
                        foreach ($this->cart->contents() as $items) {
                            echo form_hidden('rowid[]', $items['rowid']);
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $items['id']; ?></td>
                                <td><?php echo $items['name']; ?></td>
                                <td><?php echo $items['qty']; ?></td>
                                <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                <td><?php echo $dus[$i]; ?></td>
                                <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            </tr>
                            <?php
                            $i++; $no++;
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr class="gradeX">
                            <td colspan="6">Total</td>
                            <td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
        </div>
                </section><!-- /.content -->