<table class="table table-bordered">
    <tbody>
        <tr>
            <th width="30%">ID</th>
            <td><?= $item["id"] ?></td>
        </tr>
        <tr>
            <th width="30%">Nama</th>
            <td><?= $item["nama"] ?></td>
        </tr>
        <tr>
            <th width="30%">Tanggal</th>
            <td><?= $item["tanggal"] ?></td>
        </tr>
        <tr>
            <th width="30%">Staff</th>
            <td><?= $item["staff"] ?></td>
        </tr>
        <tr>
            <th width="30%">Harga</th>
            <td><?= $item["harga"] ?></td>
        </tr>
        <tr>
            <th width="30%">Stock</th>
            <td><?= $item["stock"] ?></td>
        </tr>
        <tr>
            <th width="30%">Images</th>
            <td colspan=2>
            <img src="/assets/images/<?= $item['image_name'] ?>" alt="Image for <?= $item['nama'] ?>" width="100px"; height="100px"/>
            </td>
        </tr>
        <tr>
            <th width="30%">Expired</th>
            <td><?= $item["expired"] ?></td>
        </tr>
    </tbody>
</table>