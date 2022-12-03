<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Sales</caption>
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
            <?php if(empty($sales)): ?>
                <tr>
                    <td colspan=3>Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach($sales as $index => $sale): ?>
                        <tr id="sale_<?= $sale['id'] ?>" class="text-center">
                            <td><?= $index + 1 ?></td>
                            <td>
                            <a href="sales/<?= $sale['id'] ?>">Detail</a>
                            </td>
                            <td><?= $sale['invoice_no'] ?></td>
                            <td><?= $sale['invoice_date'] ?></td>
                            <td><?= $sale['supplier_id'] ?></td>
                            <td><?= thousand_separator($sale['grand_total']) ?></td>
                            <td><?= $sale['user_id'] ?></td>
                            <td>
                                <form action="/sales/delete" method="post" class="form-delete">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $sale['id'] ?>" />
                                    <a href="/sales/<?= $sale['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <button type="submit" class="btn btn-sm btn-danger btnHapus">Hapus</button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('sales', 'bootstrap_template') ?>