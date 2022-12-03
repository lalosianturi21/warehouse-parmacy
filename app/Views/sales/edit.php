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
        <h1 >Sales <i class="fa-solid fa-store"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
        </div>
        <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>

<form action="/sales/<?= $sale['id'] ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Edit Sales <i class="fa-solid fa-store"></i></h3>
            </div>
            <div class="row g-3 pt-2" >
                    <div class="col-md-6">
                    <label for="invoice_no" class="form-label">Invoice No    <i class="fa-solid fa-list-ol"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter invoice no"  name="invoice_no" id="invoice_no"  value="<?= $sale['invoice_no'] ?>" >
                    <?php if(isset($errors) and $errors->getError('invoice_no')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('invoice_no'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                    <label for="invoice_date" class="form-label">Invoice Date    <i class="fa-solid fa-calendar-day"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter invoice date"  name="invoice_date" id="invoice_date"  value="<?= $sale['invoice_date'] ?>" >
                    <?php if(isset($errors) and $errors->getError('invoice_date')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('invoice_date'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    
                    <div class="col-md-6">
                    <label for="supplier_id" class="form-label">Supplier id   <i class="fa-solid fa-truck-field"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name supplier_id"  name="supplier_id" id="supplier_id"  value="<?= $sale['supplier_id'] ?>" >
                    <?php if(isset($errors) and $errors->getError('supplier_id')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('supplier_id'); ?>
                        </div>
                        <?php } ?>
                    </div>


                    <div class="col-md-6">
                    <label for="user_id" class="form-label">User Id  <i class="fa-solid fa-user"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter name user_id"  name="user_id" id="user_id"  value="<?= $sale['user_id'] ?>" >
                    <?php if(isset($errors) and $errors->getError('user_id')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('user_id'); ?>
                        </div>
                        <?php } ?>
                    </div>
<div class="mb-3">
    <input type="submit" value="Perbarui" class="btn btn-primary">
</div>
    </form>
        </div>
</body>
</html>