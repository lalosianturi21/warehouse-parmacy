<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Pembelian </caption>
        <thead class="table-dark text-light rounded">
        <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Staff</th>
                <th scope="col">Harga</th>
                <th scope="col">Stock</th>
                <th scope="col">Gambar</th>
                <th scope="col">Expired</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($items)): ?>
                <tr>
                    <td colspan=3>Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach($items as $index => $item): ?>
                        <tr id="item_<?= $item['id'] ?>" class="text-center">
                            <td><?= $index + 1 ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['tanggal'] ?></td>
                            <td>
                            <?php
                            if($item['staff'] == "Kasir"):
                                echo "<span class='badge bg-primary'>Kasir</span>";
                            else:
                                echo "<span class='badge bg-danger'>Penjaga Toko</span>";
                            endif;
                        ?>
                        </td>
                            <td><?= $item['harga'] ?></td>
                            <td><?= $item['stock'] ?></td>
                            <td><img src="/assets/images/<?= $item['image_name'] ?>" alt="Image for <?= $item['nama'] ?>" width="100px"; height="100px"/></td>
                            <td><?php
                            if($item['expired'] == "Belum kadaluarsa"):
                                echo "<span class='badge bg-primary'>Belum kadaluarsa</span>";
                            else:
                                echo "<span class='badge bg-danger'>Sudah kadaluarsa</span>";
                            endif;
                        ?></td>
                            <td>
                                <form action="/items/delete" method="post" class="form-delete">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                                    <a href="/items/<?= $item['id'] ?>" class="btn btn-sm btn-info btn-lihat">Lihat</a>
                                    <a href="/items/<?= $item['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <button type="submit" class="btn btn-sm btn-danger btnHapus">Hapus</button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('items', 'bootstrap_template') ?>