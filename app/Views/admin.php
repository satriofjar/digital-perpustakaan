<?= $this->extend('layouts/main'); ?>


<?= $this->section('content') ?>
<?= $this->include('layouts/navbar'); ?>  

    <div class="container py-5">

        <div class="row">
            <div class="col my-3">
                <a href="<?= base_url('admin/books') ?>" class='btn bg-green text-white btn-custom my-2' style='width: 100px'>Buku</a>
                <br>
                <a href="<?= base_url('admin/categories') ?>" class='btn bg-green text-white btn-custom my-2' style='width: 100px'>Kategori</a>

            </div>
                <?php 
                    if($_SERVER['REQUEST_URI'] == '/admin/books'){
                        echo $this->include('book/book-table');
                    }else{
                        echo $this->include('category/category-table');
                    }

                    // echo $_SERVER['REQUEST_URI'];
                 ?>
        </div>    

    </div>

<?= $this->endSection() ?>