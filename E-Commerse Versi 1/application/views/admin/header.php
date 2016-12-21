<div id="header" class="clearfix">
    <h1><Elektronik Koperasi</span></a></h1>
    <div class="info">
        <h6>Admin Panel</h6>
    </div>
    <div class="menu">
            <ul>
				<li><a href="<?php echo site_url('/');?>" target="_blank">Lihat Website</a></li>
                <li><a href="<?php echo site_url('admin/users/profile');?>">Profil (<?php echo $this->session->userdata('NamaDepan')?>)</a></li>
                <li><a href="<?php echo site_url('users/logout') ?>">Logout</a></li>
            </ul>
        </div> 
</div>         <!--end #header-->

<div id="breadcrumbs" class="clearfix">
    <?php echo set_breadcrumb() ?>
</div>        <!--end #breadcrumbs-->
