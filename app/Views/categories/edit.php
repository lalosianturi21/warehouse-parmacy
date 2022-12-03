<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/categorie$categorie.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Categories <i class="fa-solid fa-grip-vertical"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    </div>

<form action="/categories/<?= $categorie['id'] ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Edit Categories <i class="fa-solid fa-grip"></i></h3>
            </div>
            <div class="row g-3 pt-2" >
                    <div class="col-md-6">
                    <label for="name" class="form-label">Name Categorie   <i class="fa-solid fa-tablets"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name name"  name="name" id="name"  value="<?= $categorie['name'] ?>" >
                    <?php if(isset($errors) and $errors->getError('name')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('name'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="status_id" class="form-label">Status <i class="fa-solid fa-signal"></i></label>
                        <select class="form-select" name="status_id" id="status_id">
                        <option value="1" <?= $categorie['status_id'] == 1 ? 'selected' : '' ?>>Aktif </option>
                        <option value="2" <?= $categorie['status_id'] == 1 ? 'selected' : '' ?>>Tidak Aktif</option>
                            
                        </select>
                    </div> 

                    <div class="col-md-13">
        <label for="description" class="form-label">Description <i class="fa-solid fa-pen"></i></label>
        <input type="text" class="form-control" placeholder="Enter Description "   name="description" id="description"  value="<?= $categorie['description'] ?>" >
        <?php if(isset($errors) and $errors->getError('description')) { ?>
        <div class="text-danger mt-2">
            <?= $error = $errors->getError('description'); ?>
        </div>
        <?php } ?>
    </div>
   
<div class="mb-3">
    <input type="submit" value="Perbarui" class="btn btn-primary">
</div>
    </form>
</body>
</html>