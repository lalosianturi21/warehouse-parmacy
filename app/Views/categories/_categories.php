<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Categories </caption>
        <thead class="table-dark text-light rounded">
        <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Name Categories</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php if(empty($categories)): ?>
                <tr>
                    <td colspan=3>Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach($categories as $index => $categorie): ?>
                        <tr id="categorie_<?= $categorie['id'] ?>" class="text-center">
                            <td><?= $index + 1 ?></td>
                            <td><?= $categorie['name'] ?></td>
                            <td><?= $categorie['description'] ?></td>
                            <td>
                                <?php
                                if($categorie['status_id'] == 1):
                                    echo "<span class='badge bg-primary'>Aktif</span>";
                                else:
                                    echo "<span class='badge bg-danger'>Tidak Aktif</span>";
                                endif;
                                ?>
                            </td>
                            <td>
                                <form action="/categories/delete" method="post" class="form-delete">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $categorie['id'] ?>" />
                                    <a href="/categories/<?= $categorie['id'] ?>" class="btn btn-sm btn-info btn-lihat">Lihat</a>
                                    <a href="/categories/<?= $categorie['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <button type="submit" class="btn btn-sm btn-danger btnHapus">Hapus</button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('categories', 'bootstrap_template') ?>