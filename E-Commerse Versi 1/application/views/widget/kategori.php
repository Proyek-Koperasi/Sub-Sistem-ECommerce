<?php $categories_gender = $this->general->get_KategoriGender(); ?>
<div class="span3 col">
	<div class="block">	
		<span class="line"></span>
		<ul class="nav nav-list">
			<li class="nav-header">Kategori</li>
			<?php if ($categories_gender): ?>
			<?php foreach ($categories_gender as $kategori): ?>
			<li><a href="<?php echo base_url() ?>product/categorygender/<?php echo $kategori['permalink'] ?>"><?php echo $kategori['kategori']; ?></a></li>
			<?php $gender = $kategori['kategori_gender']; ?>
			<?php $categories = $this->general->get_KategoriProduk($gender); ?>
			<ul class="nav nav-list">
				<?php if ($categories): ?>
					<?php foreach ($categories as $category): ?>
					    <li><a href="<?php echo base_url() ?>product/category/<?php echo $category['permalink'] ?>"><?php echo $category['kategori'] ?></a></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
		<br/>
		<ul class="nav nav-list below">
			<li class="nav-header">Brands</li>
			<?php $Brands = $this->general->get_KategoriBrands(); ?>
				<?php if ($Brands): ?>
					<?php foreach ($Brands as $Brands): ?>
					    <li><a href="<?php echo base_url() ?>product/brands/<?php echo $Brands['permalink'] ?>"><?php echo $Brands['brands'] ?></a></li>
					<?php endforeach; ?>
				<?php endif; ?>
			
		</ul>
	</div>
	<?php $this->load->view('widget/tagihan'); ?>
	
</div>