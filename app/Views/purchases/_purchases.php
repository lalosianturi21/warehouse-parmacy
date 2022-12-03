<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Purchases</caption>
        <thead class="table-dark text-light rounded">
        <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">#</th>
                <th scope="col">Invoice No</th>
                <th scope="col">Invoice Date</th>
                <th scope="col">Supplier id</th>
                <th scope="col">Grand total</th>
                <th scope="col">User id</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($purchases)): ?>
                <tr>
                    <td colspan=3>Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach($purchases as $index => $purchase): ?>
                        <tr id="purchase_<?= $purchase['id'] ?>" class="text-center">
                            <td><?= $index + 1 ?></td>
                            <td>
                            <a href="purchases/<?= $purchase['id'] ?>">Detail</a>
                            </td>
                            <td><?= $purchase['invoice_no'] ?></td>
                            <td><?= $purchase['invoice_date'] ?></td>
                            <td><?= $purchase['supplier_id'] ?></td>
                            <td><?= $purchase['grand_total'] ?></td>
                            <td><?= $purchase['user_id'] ?></td>
                            <td>
                                <form action="/purchases/delete" method="post" class="form-delete">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $purchase['id'] ?>" />
                                    <a href="/purchases/<?= $purchase['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <button type="submit" class="btn btn-sm btn-danger btnHapus">Hapus</button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('purchases', 'bootstrap_template') ?>