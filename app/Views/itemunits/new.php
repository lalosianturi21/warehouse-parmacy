<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Item Units <i class="fa-solid fa-tag"></i><div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>


<form action="/itemunits" method="post" enctype="multipart/form-data">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Add Item Units <i class="fa-solid fa-folder-plus"></i></h3>
            </div>
                <div class="row g-3 pt-2" >
                    <div class="col-md-12">
                    <label for="name" class="form-label">Name    <i class="fa-solid fa-capsules"></i></i></label> 
                    <input type="text" class="form-control" placeholder="Enter Name Unit"  name="name" id="name"  value="<?= set_value('name') ?>" >
                    <?php if(isset($errors) and $errors->getError('name')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('name'); ?>
                        </div>
                        <?php } ?>
                    </div>
    <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
        </form>  

</form>
</div>

