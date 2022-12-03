<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Suppliers</caption>
        <thead class="table-dark text-light rounded">
        <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Status ID</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($suppliers)): ?>
                <tr>
                    <td colspan=11>Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach($suppliers as $index => $supplier): ?>
                        <tr id="supplier_<?= $supplier['id'] ?>" class="text-center" style="text-align: center">
                            <td><?= $index + 1 ?></td>
                            <td><?= $supplier['name'] ?></td>
                            <td>
                                <?php
                                if($supplier['status_id'] == 1):
                                    echo "<span class='badge bg-primary'>Aktif</span>";
                                else:
                                    echo "<span class='badge bg-danger'>Tidak Aktif</span>";
                                endif;
                                ?>
                            </td>
                            <td>
                                <form action="/suppliers/delete" method="post" class="form-delete">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $supplier['id'] ?>" />
                                    <a href="/suppliers/<?= $supplier['id'] ?>" class="btn btn-sm btn-info btn-lihat">Lihat</a>
                                    <a href="/suppliers/<?= $supplier['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <button type="submit" class="btn btn-sm btn-danger btnHapus ">Hapus</button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('suppliers', 'bootstrap_template') ?>

                    