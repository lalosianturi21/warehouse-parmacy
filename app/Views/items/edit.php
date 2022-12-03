<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/item.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Staff <i class="fa-solid fa-user"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    </div>

<form action="/items/<?= $item['id'] ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
<div class="mb-3 row">
        <label for="nama" class="form-label">Nama obat</label>
        <input type="text" name="nama" id="nama" class="form-contol" value="<?= $item['nama'] ?>">
        <?php if(isset($errors) and $errors->getError('nama')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('nama'); ?>
        </div>
        <?php } ?>
    </div>
    <div class="mb-3 row">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-contol" value="<?= $item['tanggal'] ?>">
        <?php if(isset($errors) and $errors->getError('tanggal')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('tanggal'); ?>
        </div>
        <?php } ?>
    </div>
    <div class="mb-3">
        <label for="staff" class="form-label">Status</label>
        <select name="staff" class=""form-control>
            <option value="Kasir" <?=$item['staff'] == "1" ? 'selected' : '' ?>>Kasir</option>
            <option value="Penjaga toko" <?=$item['staff'] =="2" ? 'selected' : '' ?>>Penjaga toko</option>
        </select>
    </div>
    <div class="mb-3 row">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" name="harga" id="harga" class="form-contol" value="<?= $item['harga'] ?>">
        <?php if(isset($errors) and $errors->getError('harga')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('harga'); ?>
        </div>
        <?php } ?>
    </div>

    <div class="mb-3 row">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" name="stock" id="stock" class="form-contol" value="<?= $item['stock'] ?>">
        <?php if(isset($errors) and $errors->getError('stock')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('stock'); ?>
        </div>
        <?php } ?>
    </div>

    <div class="mb-3 row">
        <label for="image_upload" class="form-label">Image</label>
        <input type="file" name="image_upload" id="image_upload" class="form-contol" value="<?= $item['image_name'] ?>">
        <?php if(isset($errors) and $errors->getError('image_upload')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('image_upload'); ?>
        </div>
        <?php } ?>
    </div>

  <div class="mb-3">
    <label for="status_id" class="form-label">Status</label>
    <select name="status_id" class="form-control">
        <option value="1" <?= $medicine['status_id'] == 1 ? 'selected' : '' ?>>Belum Kadaluarsa </option>
        <option value="2" <?= $medicine['status_id'] == 1 ? 'selected' : '' ?>>Sudah Kadaluarsa </option>
<div class="mb-3">
    <input type="submit" value="Perbarui" class="btn btn-primary">
</div>
    </form>
</body>
</html>