<?= $this->extend('layouts/main'); ?>


<?= $this->section('content') ?>
<?= $this->include('layouts/navbar'); ?>  

    <div class="container py-5">
        <div class="w-50 mx-auto">
            <form action='<?= base_url('edit-book/' . $book['id']); ?>' method='post' enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul" class="form-label ">Judul Buku :</label>
                    <input type="text" class="form-control" id="judul" name='judul' value='<?= $book['judul'] ?>' autofocus>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label ">Kategori :</label>
                        <select class="form-select" id='kategori' name='category_id' value='<?= $book['category_id'] ?>'>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label ">Jumlah Buku :</label>
                    <input type="text" class="form-control" id="jumlah" name='jumlah' value='<?= $book['jumlah'] ?>'>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label ">Deskripsi :</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" cols="50"><?= $book['deskripsi'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Cover Buku: </label>
                    <p>Currently : <a href="<?= base_url('media/' . $book['cover']) ?>"><?= $book['cover'] ?></a></p>
                    <input class="form-control" type="file" id="formFile" name='cover' accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">File Buku: </label>
                    <p>Currently : <a href="<?= base_url('media/' . $book['file_buku']) ?>"><?= $book['file_buku'] ?></a></p>
                    <input class="form-control" type="file" id="formFile" name='file_buku' accept=".pdf">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>