<table class="table table-bordered">
    <tbody>
        <tr>
            <th width="30%">ID</th>
            <td><?= $medicine["id"] ?></td>
        </tr>
        <tr>
            <th width="30%">Images</th>
            <td colspan=2>
            <img src="/assets/images/<?= $medicine['image_name'] ?>" alt="Image for <?= $medicine['name'] ?>" width="100px"; height="100px"/>
            </td>
        </tr>
        <tr>
            <th width="30%">Code</th>
            <td><?= $medicine["code"] ?></td>
        </tr>
        <tr>
            <th width="30%">Name</th>
            <td><?= $medicine["name"] ?></td>
        </tr>
        <tr>
            <th width="30%">Description</th>
            <td><?= $medicine["description"] ?></td>
        </tr>
        <tr>
            <th width="30%">Min Stock</th>
            <td><?= $medicine["min-stock"] ?></td>
        </tr>
        <tr>
            <th width="30%">Max Stock</th>
            <td><?= $medicine["max-stock"] ?></td>
        </tr>
        <tr>
            <th width="30%">Current Stock</th>
            <td><?= $medicine["current_stock"] ?></td>
        </tr>
        <tr>
            <th width="30%">Price</th>
            <td><?= $medicine["price"] ?></td>
        </tr>
        <tr>
            <th width="30%">Status Id</th>
            <td><?= $medicine["status_id"] ?></td>
        </tr>
        <tr>
            <th width="30%">Item Unit Id</th>
            <td><?= $medicine["item_unit_id"] ?></td>
        </tr>
    </tbody>
</table>