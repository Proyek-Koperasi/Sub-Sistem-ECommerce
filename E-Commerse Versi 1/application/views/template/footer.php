<section id="footer-bar">
	<div class="row">
		<div class="span3">
			<h4>Navigation</h4>
			<ul class="nav">
			<?php if (!$this->session->userdata('level') == 1) : ?>
				<li><a href="<?php echo site_url(); ?>">Homepage</a></li>  
				<li><a href="<?php echo base_url() ?> pages/tentangkami">About Us</a></li>
				<li><a href="<?php echo site_url('contactus');?>">Contact Us</a></li>
				<li><a href="<?php echo site_url('keranjang'); ?>">Akun Saya</a></li>
				<?php if ($this->session->userdata('id')): ?>                  
                <li><a href="<?php echo site_url('users/logout'); ?>">Logout</a></li>
                <?php else: ?>                       
                <li><a href="<?php echo site_url('users/login'); ?>">Login</a></li>
                 <?php endif; ?>
            <?php else: ?>
            	<li><a href="<?php echo site_url('users/logout'); ?>">Logout</a></li>
            <?php endif; ?> 						
			</ul>					
		</div>
		<div class="span4">
			<h4>Akun Saya</h4>
			<ul class="nav">
			<?php if (!$this->session->userdata('level') == 1) : ?>
				<li><a href="<?php echo site_url(); ?>">My Account</a></li>
				<li><a href="<?php echo site_url('orders/history'); ?>">Order History</a></li>
				<li><a href="<?php echo site_url('keinginan'); ?>">Keinginan</a></li>
			<?php else: ?>
				<li><a href="<?php echo site_url('admin/dashboar'); ?>">Dashboard</a></li>
            <?php endif; ?>
			</ul>
		</div>
		<div class="span5">
			
			<br/>
			<span class="social_icons">
				<a class="facebook" href="#">Facebook</a>
				<a class="twitter" href="#">Twitter</a>
			</span>
		</div>					
	</div>	
</section>
<section id="copyright">
	<span>Copyright </dd>2016 <a href="<?php echo site_url(''); ?>">TI4FPolinema</a> ALL Right Reserved.</span>
</section>
</div>
		