<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Purchases <i class="fa-brands fa-shopify"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>
    
<form action="/purchases" method="post" enctype="multipart/form-data">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12  border p-4 shadow bg-light rounded">
            <div class="col-12">
                <h3 >Add Purchases <i class="fa-solid fa-cart-shopping"></i></h3>
            </div>
                <div class="row g-3 pt-2" >
                    <div class="col-md-12">
                    <label for="invoice_date" class="form-label">Invoice Date    <i class="fa-solid fa-list-ol"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter Invoice date"  name="invoice_date" id="invoice_date"  value="<?= set_value('invoice_date') ?>" >
                    <?php if(isset($errors) and $errors->getError('invoice_date')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('invoice_date'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="row g-2 " >
                    <div class="col-md-12">
                    <label for="supplier_id" class="form-label">Supplier Id    <i class="fa-solid fa-truck-field"></i></label> 
                    <input type="text" class="form-control" placeholder="Enter Supplier id"  name="supplier_id" id="supplier_id"  value="<?= set_value('supplier_id') ?>" >
                    <?php if(isset($errors) and $errors->getError('supplier_id')) { ?>
                        <div class="text-danger mt-2">
                            <?= $error = $errors->getError('supplier_id'); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                        </form>  

        </form>
    </div>

<script>
  $('#invoice_date').datetimepicker();
</script>