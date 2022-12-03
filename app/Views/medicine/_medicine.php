<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Pembelian </caption>
        <thead class="table-dark text-light rounded">
        <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Min Stock</th>
                <th scope="col">Max Stock</th>
                <th scope="col">Current Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Status Id</th>
                <th scope="col">Item Unit Id</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($medicines)): ?>
                <tr>
                    <td colspan=11>Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach($medicines as $index => $medicine): ?>
                        <tr id="medicine_<?= $medicine['id'] ?>" class="text-center" style="text-align: center">
                            <td><?= $index + 1 ?></td>
                            <td><img src="/assets/images/<?= $medicine['image_name'] ?>" alt="Image for <?= $medicine['name'] ?>" width="100px"; height="100px"/></td>
                            <td><?= $medicine['code'] ?></td>
                            <td><?= $medicine['name'] ?></td>
                            <td><?= $medicine['description'] ?></td>
                            <td><?= $medicine['min-stock'] ?></td>
                            <td><?= $medicine['max-stock'] ?></td>
                            <td><?= $medicine['current_stock'] ?></td>
                            <td><?= $medicine['price'] ?></td>
                            <td>
                                <?php
                                if($medicine['status_id'] == 1):
                                    echo "<span class='badge bg-primary'>Tersedia</span>";
                                else:
                                    echo "<span class='badge bg-danger'>Tidak Tersedia</span>";
                                endif;
                                ?>
                            </td>
                            <td><?= $medicine['item_unit_id'] ?></td>
                            <td>
                                <form action="/medicine/delete" method="post" class="form-delete">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $medicine['id'] ?>" />
                                    <a href="/medicine/<?= $medicine['id'] ?>" class="btn btn-sm btn-info btn-lihat">Lihat</a>
                                    <a href="/medicine/<?= $medicine['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <button type="submit" class="btn btn-sm btn-danger btnHapus ">Hapus</button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('medicine', 'bootstrap_template') ?>

                    