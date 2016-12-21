<section class="main-content">
    <div class="row">
        <div class="span12">
    
    <div class="page-header">
        <h1>Rincian Pemesanan</h1>
    </div>
    <table class="table table-bordered table-striped">
        <tr >
            <td >Kode</td><td><?php echo $order['code']; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td><td><?php echo $this->general->humanDate2($order['order_date']); ?></td>
        </tr>
        <tr>
            <td>Total</td><td><strong><?php echo number_format($order['total'],2,',','.'); ?></strong></td>
        </tr>
        <tr>
            <td>Batas Pembayaran</td><td><?php echo $this->general->humanDate2($order['payment_deadline']); ?></td>
        </tr>
        <tr>
            <td>Metode Bayar</td><td><?php echo $paymentMethods[$order['payment_method']]; ?></td>
        </tr>
        <tr>
            <td>Status</td><td><?php echo $status[$order['status']]; ?></td>
        </tr>
    </table>
    <h3>Rincian Item</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>

                <th>Nama</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>

            </tr>
        </thead>

        <?php $i = 1; ?>

        <?php foreach ($orderDetails as $orderDetail): ?>



            <tr>

                <td><?php echo $orderDetail['name']; ?></td>
                <td><?php echo $orderDetail['qty'] ?></td>
                <td><?php echo number_format($orderDetail['net_price'],2,',','.'); ?></td>
                <td style="text-align:right"><?php echo number_format($orderDetail['net_price'] * $orderDetail['qty'],2,',','.'); ?></td>

            </tr>

            <?php $i++; ?>

        <?php endforeach; ?>

        <tr>
            <td colspan="3" style="text-align:right"><h4>TOTAL :</h4></td>
            <td style="text-align:right"><h4><strong><?php echo number_format($order['total'],2,',','.'); ?></strong></h4> </td>               
        </tr>                  

    </table>
    <a href="<?php echo base_url() ?>index.php/orders/history" class="btn btn-primary">&lt; Kembali</a>



</div>	
</div>
</section>

