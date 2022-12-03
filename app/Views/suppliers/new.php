<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Suppliers <i class="fa-solid fa-truck-field"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>




<form action="/suppliers" method="post" enctype="multipart/form-data">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Add Suppliers <i class="fa-solid fa-truck-field"></i></h3>
            </div>
                <div class="row g-3 pt-2" >
                    <div class="col-md-12">
                    <label for="name" class="form-label">Name Suppliers  <i class="fa-solid fa-user"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name suppliers"  name="name" id="name"  value="<?= set_value('name') ?>" >
                    <?php if(isset($errors) and $errors->getError('name')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('name'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row g-2 pt-2" >
                    <div class="col-md-12">
                    <label for="status_id" class="form-label">Status <i class="fa-solid fa-signal"></i></label>
                        <select class="form-select" name="status_id" id="status_id">
                            <option value="1">Aktif</option>
                            <option value="2">Tidak Aktif</option>
                            
                        </select>
                    </div>


                    
    <div class="mb-3 pt-4">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
        </form>  

</form>
</div>

