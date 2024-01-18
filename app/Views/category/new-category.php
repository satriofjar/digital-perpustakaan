<?= $this->extend('layouts/main'); ?>


<?= $this->section('content') ?>
<?= $this->include('layouts/navbar'); ?>  

    <div class="container py-5">
        <div class="w-50 mx-auto">
            <form action='<?= base_url('create-category'); ?>' method='post' enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="kategori" class="form-label ">Kategori :</label>
                    <input type="text" class="form-control" id="kategori" name='name' required autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>