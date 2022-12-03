<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Item Units </caption>
        <thead class="table-dark text-light rounded">
        <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($itemunits)): ?>
                <tr>
                    <td colspan=11>Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach($itemunits as $index => $itemunit): ?>
                        <tr id="itemunit_<?= $itemunit['id'] ?>" class="text-center" style="text-align: center">
                            <td><?= $index + 1 ?></td>
                            <td><?= $itemunit['name'] ?></td>
                            <td>
                                <form action="/itemunits/delete" method="post" class="form-delete">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $itemunit['id'] ?>" />
                                    <a href="/itemunits/<?= $itemunit['id'] ?>" class="btn btn-sm btn-info btn-lihat">Lihat</a>
                                    <a href="/itemunits/<?= $itemunit['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <button type="submit" class="btn btn-sm btn-danger btnHapus ">Hapus</button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links('itemunits', 'bootstrap_template') ?>

                    