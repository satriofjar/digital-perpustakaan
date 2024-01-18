<div class="col-lg-9 my-3">
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Kategori</th>
                <th scope='col'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1; 
                foreach ($categories as $category): ?>
            <tr class='align-middle'>
                <th scope="row"><?= $counter++ ?></th>
                <td><?= $category['name'] ?></td>
                <td>
                    <a href='<?= base_url('edit-category/' . $category['id']) ?>' class='btn btn-warning text-white'>Edit</a>
                    <form action="<?= base_url('delete-category/' . $category['id']) ?>" method='post' class='d-inline'>
                        <?= csrf_field() ?>
                        <input type="hidden" name='_method' value='delete'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
        
    </table>
    <a href='<?= base_url('create-category') ?>' class='btn btn-primary my-3'>Tambah</a>
</div>