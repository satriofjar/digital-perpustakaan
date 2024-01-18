<div class="col-md-auto my-3">
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Cover</th>
                <th scope='col'>Judul</th>
                <th scope='col'>Kategori</th>
                <th scope='col'>Jumlah</th>
                <th scope='col'>Deskripsi</th>
                <th scope='col'>File</th>
                <th scope='col'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1; 
                foreach ($books as $book): ?>
            <tr class='align-middle'>
                <th scope="row"><?= $counter++ ?></th>
                <td><img src="<?= base_url('media/' . $book['cover']) ?>" class='' width='70' alt=""></td>
                <td><?= $book['judul'] ?></td>
                <td><?= $book['name'] ?></td>
                <td><?= $book['jumlah'] ?></td>
                <td><?= $book['deskripsi'] ?></td>
                <td><a href="<?= base_url('media/' . $book['file_buku']) ?>" target='_blank'><?= $book['file_buku'] ?></a></td>
                <td>
                    <a href='<?= base_url('edit-book/' . $book['id'] ) ?>' class='btn btn-warning text-white'>Edit</a>
                    <form action="<?= base_url('delete-category/' . $book['id']) ?>" method='post' class='d-inline'>
                        <?= csrf_field() ?>
                        <input type="hidden" name='_method' value='delete'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>
    <a href='<?= base_url('create-book') ?>' class='btn btn-primary my-3'>Tambah</a>
</div>