<section class="main-content">              
    <div class="row">       
      		<div class="span12">
                    <h1><?php echo $this->session->userdata('NamaDepan')?>&nbsp;<?php echo $this->session->userdata('NamaBelakang')?></h1>
            </div>        
    </div>
    <div class="row">
        	<div class="span12">
                    	<ul class="nav nav-tabs">
                          <li class="active"><a href="#fname" data-toggle="tab">Profil</a></li>
                          <li><a href="#lname" data-toggle="tab">Riwayat Belanja</a></li>                  
                        </ul>          	
                     
                        <div class="tab-content">
                          <div class="tab-pane active" id="fname">
                            <form class="form-horizontal" method="post" action="<?php echo site_url('users/profile'); ?>">
        <fieldset>

            <div class="control-group">
                <label for="focusedInput" class="control-label">Full name:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="full_name" value="<?php echo set_value('NamaDepan', isset($user['NamaDepan']) ? $user['NamaDepan'] : ''); ?>"/>
                </div>
            </div>  

            <div class="control-group">
                <label for="focusedInput" class="control-label">Email:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="email" value="<?php echo set_value('email', isset($user['email']) ? $user['email'] : ''); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Password:</label>
                <div class="controls">
                    <input type="password" class="input-xlarge focused span6" name="password" value="" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Confirm Password:</label>
                <div class="controls">
                    <input type="password" class="input-xlarge focused span6" name="confirm_password" value="" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Phone:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="phone" value="<?php echo set_value('phone', isset($user['phone']) ? $user['phone'] : ''); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Zip:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge focused span6" name="zip" value="<?php echo set_value('zip', isset($user['zip']) ? $user['zip'] : ''); ?>" />
                </div>
            </div>
            <div class="control-group">
                <label for="focusedInput" class="control-label">Address:</label>
                <div class="controls">
                    <textarea class="input-xlarge focused span6" name="address"><?php echo set_value('address', isset($user['address']) ? $user['address'] : ''); ?></textarea>
                </div>
            </div>
             <div class="span8">
                <button class="btn btn-primary pull-right"  type="submit">Save</button>
            </div>  
        </fieldset>
        <?php echo form_close(); ?>


                          </div>
                          <div class="tab-pane" id="lname">
                            <div class="span11">
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
                        </div>
                </div>      	

</div>
</section>