<?= $this->extend('layouts/main'); ?>


<?= $this->section('content') ?>
<?= $this->include('layouts/navbar'); ?>  

    <div class="container py-5">
        <?= $this->include('book/book-table'); ?>

    </div>

<?= $this->endSection() ?>