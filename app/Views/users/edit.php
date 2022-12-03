<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Users <i class="fa-solid fa-users"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>


<form action="/users/<?= $user['id'] ?>" method="post">
<input type="hidden" name="_method" value="PUT"/>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Edit Users <i class="fa-solid fa-user"></i></h3>
            </div>
            <div class="row g-3 pt-2" >
                    <div class="col-md-6">
                    <label for="name" class="form-label">Name Users    <i class="fa-solid fa-user"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name users"  name="name" id="name"  value="<?= $user['name'] ?>" >
                    <?php if(isset($errors) and $errors->getError('name')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('name'); ?>
                        </div>
                        <?php } ?>
                    </div>
    
                    <div class="col-md-6">
                    <label for="email" class="form-label">Email     <i class="fa-solid fa-envelope"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter email"  name="email" id="email"  value="<?= $user['email'] ?>" >
                    <?php if(isset($errors) and $errors->getError('email')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('email'); ?>
                        </div>
                        <?php } ?>
                    </div>
                        
                    <div class="col-md-6">
                    <label for="password" class="form-label">Password     <i class="fa-solid fa-lock"></i></label> 
                    <input type="password" class="form-control" placeholder="Enter password"  name="password" id="password"  value="<?= $user['password'] ?>" >
                    <?php if(isset($errors) and $errors->getError('password')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('password'); ?>
                        </div>
                        <?php } ?>
                    </div>
                        
                    <div class="col-md-6">
                    <label for="status_id" class="form-label">Status  <i class="fa-solid fa-signal"></i></label>
                        <select class="form-select" name="status_id" id="status_id">
                        <option value="1" <?= $user['status_id'] == 1 ? 'selected' : '' ?>>Aktif </option>
                        <option value="2" <?= $user['status_id'] == 1 ? 'selected' : '' ?>>Tidak Aktif</option>
                            
                        </select>
                    </div>

    <div class="mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
    </div>
        </form>  