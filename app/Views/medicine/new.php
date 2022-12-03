<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Medicine <i class="fa-solid fa-pills"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>

<form action="/medicine" method="post" enctype="multipart/form-data">

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Tambah Medicine <i class="fa-solid fa-tablets"></i></h3>
            </div>
                <div class="row g-3 pt-2" >
                    <div class="col-md-6">
                    <label for="code" class="form-label">Code    <i class="fa-solid fa-list-ol"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name code"  name="code" id="code"  value="<?= set_value('code') ?>" >
                    <?php if(isset($errors) and $errors->getError('code')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('code'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    
                    <div class="col-md-6">
                    <label for="name" class="form-label">Name Medicine <i class="fa-solid fa-pills"></i></label>
                    <input type="text" name="name" id="name"  class="form-control" placeholder="Enter name" value="<?= set_value('name') ?>">
                        <?php if(isset($errors) and $errors->getError('name')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('name'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="min-stock" class="form-label">Min Stock <i class="fa-solid fa-circle-minus"></i></label>
                    <input type="text" name="min-stock" id="min-stock"  class="form-control" placeholder="Enter min stock" value="<?= set_value('min-stock') ?>">
                        <?php if(isset($errors) and $errors->getError('min-stock')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('min-stock'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="max-stock" class="form-label">Max Stock <i class="fa-solid fa-circle-plus"></i></label>
                    <input type="text" name="max-stock" id="max-stock"  class="form-control" placeholder="Enter max stock" value="<?= set_value('max-stock') ?>">
                        <?php if(isset($errors) and $errors->getError('max-stock')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('max-stock'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="current_stock" class="form-label">Current Stock <i class="fa-solid fa-bolt"></i></label>
                    <input type="text" name="current_stock" id="current_stock"  class="form-control" placeholder="Enter current stock" value="<?= set_value('current_stock') ?>">
                        <?php if(isset($errors) and $errors->getError('current_stock')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('current_stock'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    
                    <div class="col-md-6">
                    <label for="item_unit_id" class="form-label">Price <i class="fa-solid fa-tag"></i></label>
                    <input type="text" name="price" id="price"  class="form-control" placeholder="Enter price" value="<?= set_value('price') ?>">
                        <?php if(isset($errors) and $errors->getError('price')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('price'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="item_unit_id" class="form-label">Item Unit <i class="fa-solid fa-rectangle-list"></i></i></label>
                    <input type="text" name="item_unit_id" id="item_unit_id"  class="form-control" placeholder="Enter item unit" value="<?= set_value('item_unit_id') ?>">
                        <?php if(isset($errors) and $errors->getError('item_unit_id')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('item_unit_id'); ?>
                        </div>
                        <?php } ?>
                    </div>

                   <div class="col-md-6">
                    <label for="status_id" class="form-label">Status <i class="fa-solid fa-signal"></i></label>
                        <select class="form-select" name="status_id" id="status_id">
                            <option value="1">Tersedia</option>
                            <option value="2">Tidak Tersedia</option>
                            
                        </select>
                    </div>


                    
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Image Upload <i class="fa-solid fa-images"></i></label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple name="image_upload" id="image_upload" value="<?= set_value('image_upload') ?>">
                        </div>
                        <?php if(isset($errors) and $errors->getError('image_upload')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('image_upload'); ?>
                        </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description <i class="fa-solid fa-pen"></i></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" id="description" value="<?= set_value('description') ?>"></textarea>
                            </div>
                        <?php if(isset($errors) and $errors->getError('description')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('description'); ?>
                        </div>
                        <?php } ?>
                    </div>

                        <div class="mb-3">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>

    </div>


</form>
</div>

