<section class="main-content">
    <div class="row">
        <div class="span12">
            <div class="page-header">
                <h1> Riwayat Pemesanan</h1>
            </div>
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <?php if (!empty($orders)): ?>
            <?php $i = 1; ?>
            <?php foreach ($orders as $order): ?>
            <tr>
                    <td><?php echo $order['code']; ?></td>
                    <td><?php echo $this->general->humanDate2($order['order_date']) ?></td>
                    <td><strong><?php echo $this->cart->format_number($order['total']); ?></strong></td>
                    <td><?php echo $this->general->humanDate2($order['payment_deadline']) ?></td>
                    <td><?php echo $paymentMethods[$order['payment_method']] ?></td>
                    <td><?php echo $status[$order['status']] ?></td>
                    <td>
                        <?php if ($order['status'] == 0): ?>
                            <?php echo anchor('konfirmasi/add/' . $order['code'], 'Konfirmasi'); ?>
                            |
                        <?php endif; ?>

                        <?php echo anchor('orders/detail/' . $order['code'], 'Rincian'); ?>
                    </td>
            </tr>

                <?php $i++; ?>

            <?php endforeach; ?>

        <?php endif; ?>

    </table>

    </div>	
</div>
</section>

