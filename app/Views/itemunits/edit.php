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
        <h1 >Item Units <i class="fa-solid fa-user"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>

<form action="/itemunits/<?= $itemunit['id'] ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Edit Medicine <i class="fa-solid fa-tablets"></i></h3>
            </div>
            <div class="row g-3 pt-2" >
                    <div class="col-md-6">
                    <label for="name" class="form-label">name    <i class="fa-solid fa-list-ol"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name name"  name="name" id="name"  value="<?= $itemunit['name'] ?>" >
                    <?php if(isset($errors) and $errors->getError('name')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('name'); ?>
                        </div>
                        <?php } ?>
                    </div>

<div class="mb-3">
    <input type="submit" value="Perbarui" class="btn btn-primary">
</div>
    </form>
</body>
</html>