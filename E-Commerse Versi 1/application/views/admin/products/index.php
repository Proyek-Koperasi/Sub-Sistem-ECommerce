<script type="text/javascript">
    $(document).ready(function() {
        $('#menu_list2').show();
    });
</script>
<h2 class="page_title">Products</h2>
<?php if ($this->session->flashdata('success')): ?>
    <div class="success_msg">
        <span><?php echo $this->session->flashdata('success'); ?></span>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="error_msg">
        <span><?php echo $this->session->flashdata('error'); ?></span>
    </div>
<?php endif; ?>
<div id="result"></div>
<div class="table_row">
    <div class="row clearfix">

        <div class="search">
            <form id="ArticleIndexForm" method="get" action="<?php echo site_url('admin/produk/index'); ?>" accept-charset="utf-8">
                <div class="input text"><input name="q" type="text" value="<?php echo $this->input->get('q'); ?>" id="ArticleQ" /></div>            
               <button class="green_bt">Search</button>
            </form>        
        </div>


        <div class="option">
            <a href="<?php echo site_url('admin/produk/add'); ?>" class="add">Tambah Produk</a>
        </div>


    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Harga Net</th>
            <th>Kategori</th>
            <th>Stock</th>
            <th>Status</th>
            <th width="110" class="ac">Action</th>
        </tr>
        <?php if ($products): ?>

            <?php foreach ($products as $product): ?>
                <tr>

                   
                    <td> <a href=""><img src="<?php echo base_url() ?>assets/uploads/files/<?php echo $product['gambar']; ?>" alt="" width="50px" height="35px"></a></td>
                    <td><?php echo $product['nama'] ?></td>
                    <td><?php echo $product['sku'] ?></td>
                    <td><?php echo number_format($product['harga']) ?></td>
                    <td><?php echo $product['diskon'] ?> %</td>
                    <td><?php echo number_format($product['harga_net']) ?></td>
                    <td><?php echo $product['categoryName'] ?></td>
                    <td><?php echo $product['jumlah'] ?></td>
                    <td><?php echo $status[$product['enabled']] ?></td>
                    <td>

                        <a href="<?php echo base_url() ?>admin/produk/edit/<?php echo $product['id']; ?>" class="ico edit">Ubah</a> &nbsp;
                        <a href="<?php echo base_url() ?>admin/produk/delete/<?php echo $product['id']; ?>" class="ico del" onclick="return confirm('Are you sure want to delete this?')">Hapus</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8"><strong>Data Tidak Ditemukan</strong></td>
            </tr>
        <?php endif; ?>
    </table>
    <div class="paging">
        <?php echo $pagination ?>    
    </div>

   
</div>                    

<!--end #article-->
