<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Staff <i class="fa-solid fa-user"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    </div>


<form action="/items" method="post" enctype="multipart/form-data">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
            <div class="col-12">
                <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Tambah Item</h3>
            </div>
            <form action="">
                <div class="row g-3">
                    <div class="col-md-6">
                    <label for="staff" class="form-label">Nama Obat    <i class="fa-solid fa-clipboard"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name item"  name="nama" id="nama"  value="<?= set_value('nama') ?>" >
                    <?php if(isset($errors) and $errors->getError('nama')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('nama'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal kadaluarsa</label>
                    <input type="text" name="tanggal" id="tanggal"  class="form-control" placeholder="Enter Date" value="<?= set_value('tanggal') ?>">
                        <?php if(isset($errors) and $errors->getError('tanggal')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('tanggal'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga"  class="form-control" placeholder="Enter Price" value="<?= set_value('harga') ?>">
                        <?php if(isset($errors) and $errors->getError('harga')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('harga'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" name="stock" id="stock"  class="form-control" placeholder="Enter Stock" value="<?= set_value('stock') ?>">
                        <?php if(isset($errors) and $errors->getError('stock')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('stock'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" placeholder="Enter Date">
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="col-12">
                        <select class="form-select" name="status_id" id="status_id">
                            <option selected>Purpose Of Appointment</option>
                            <option value="1">Belum Kadaluarsa</option>
                            <option value="2">Sudah Kadaluarsa</option>
                            
                        </select>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="col-12 mt-5">                        
                        <button type="submit" class="btn btn-primary float-end">Book Appointment</button>
                        <button type="button" class="btn btn-outline-secondary float-end me-2">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="container mt-4 rounded">
    <div class="row">
        <div class="col-md-13  border p-4 shadow bg-light">
            <div class="col-12">
                <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Appointment form</h3>
            </div>
            <form action="">
                <div class="row g-3">
                    <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nama Obat" name="nama" id="nama" value="<?= set_value('nama') ?>">
        <?php if(isset($errors) and $errors->getError('nama')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('nama'); ?>
        </div>
        <?php } ?>
    </div>
    <div class="md-6">
        <input type="date" name="tanggal" id="tanggal" class="form-contol" value="<?= set_value('tanggal') ?>">
        <?php if(isset($errors) and $errors->getError('tanggal')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('tanggal'); ?>
        </div>
        <?php } ?>
    </div>
    <div class="mb-3">
    <label for="staff" class="form-label">Status</label>
        <select name="staff" class="form-control" id="staff">
            <option value="Kasir">Kasir </option>
            <option value="Penjaga toko">Penjaga toko</option>
        </select>
        </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" name="harga" id="harga" class="form-contol" value="<?= set_value('harga') ?>">
        <?php if(isset($errors) and $errors->getError('harga')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('harga'); ?>
        </div>
        <?php } ?>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" name="stock" id="stock" class="form-contol" value="<?= set_value('stock') ?>">
        <?php if(isset($errors) and $errors->getError('stock')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('stock'); ?>
        </div>
        <?php } ?>
    </div>

    <div class="mb-3">
        <label for="image_upload" class="form-label">Image</label>
        <input type="file" name="image_upload" id="image_upload" class="form-contol" value="<?= set_value('image_upload') ?>">
        <?php if(isset($errors) and $errors->getError('image_upload')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('image_upload'); ?>
        </div>
        <?php } ?>
    </div>

    <div class="mb-3">
    <label for="expired" class="form-label">Expired</label>
        <select name="expired" class="form-control" id="expired">
            <option value="Belum kadaluarsa">Belum kadaluarsa</option>
            <option value="Sudah kadaluarsa">Sudah kadaluarsa</option>
        </select>
        </div>
    <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
        </form>  

</form>
</div>

<script>
  $('#tanggal').datetimepicker();
</script>
