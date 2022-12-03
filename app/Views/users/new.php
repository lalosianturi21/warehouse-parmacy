<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Users <i class="fa-solid fa-users"></i> </h1>
    </div>
    </div>
    
</br>


<form action="/users" method="post" enctype="multipart/form-data">
   
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Add Users <i class="fa-solid fa-user"></i></h3>
            </div>
                <div class="row g-3 pt-2" >
                    <div class="col-md-6">
                    <label for="name" class="form-label">Name Users   <i class="fa-solid fa-user"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name users"  name="name" id="name"  value="<?= set_value('name') ?>" >
                    <?php if(isset($errors) and $errors->getError('name')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('name'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="email" class="form-label">Email   <i class="fa-solid fa-envelope"></i></label> 
                    <input type="email" class="form-control" placeholder="Enter Your Email"  name="email" id="email"  value="<?= set_value('email') ?>" >
                    <?php if(isset($errors) and $errors->getError('email')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('email'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="password" class="form-label">password   <i class="fa-solid fa-lock"></i></label> 
                    <input type="password" class="form-control" placeholder="Enter Your password"  name="password" id="password"  value="<?= set_value('password') ?>" >
                    <?php if(isset($errors) and $errors->getError('password')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('password'); ?>
                        </div>
                        <?php } ?>
                    </div>
   
                    <div class="col-md-6"><i class="fa-solid fa-signal"></i>
                    <label for="status_id" class="form-label">Status </label>
                        <select class="form-select" name="status_id" id="status_id">
                            <option value="1">Aktif</option>
                            <option value="2">Tidak Aktif</option>
                            
                        </select>
                    </div>
    <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
        </form>  
        </div>


        