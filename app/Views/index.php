<?= $this->extend('layouts/main') ?>


<?= $this->section('content') ?>

    <?= $this->include('layouts/navbar'); ?>  
  
      <section id="Rent" class='my-5'>
        <div class="container" style="margin-top: 30px">
          <div class="row book-list">
            <?php foreach ($books as $book): ?>
              <div class="col-lg-3 py-3">
                <div class="card card-body">
                    <img src="<?= base_url('media/' . $book['cover']) ?>" alt="" style="width:70%" class="mx-auto"/>
                    <br/>
                    <h4 class="text-center mb-3"><?= $book['judul'] ?></h4>
                    <p class="bookAuthor fw-bold"><span class="fw-normal" style="font-size: 14px">Kategori : </span><?= $book['name'] ?></p>  
                    <p class="bookLanguage fw-bold"><span class="fw-normal" style="font-size: 14px">Jumlah : </span><?= $book['jumlah'] ?></p>
                    <p><?= $book['deskripsi'] ?></p>
                    <a href="<?= base_url('export-book/' . $book['id']) ?>" class="btn bg-green btn-custom text-white">Export</a>
                </div>
              </div>
              <?php endforeach; ?>
          </div>
        </div>
      </section>



<?= $this->endSection() ?>