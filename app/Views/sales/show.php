<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Sales <i class="fa-solid fa-store"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    <?= current_user() == NULL ? "-" : current_user()['name'] ?>
    </div>

    <div class="table-responsive container shadow-lg rounded mt-3">
<table class="table shadow-lg">
  <table class="table caption-top">
    <tbody>
        <tr>
            <th width="30%">ID</th>
            <td><?= $sale["id"] ?></td>
        </tr>
        <tr>
            <th width="30%">Invoice No</th>
            <td><?= $sale["invoice_no"] ?></td>
        </tr>
        <tr>
            <th width="30%">Invoice Date</th>
            <td><?= $sale["invoice_date"] ?></td>
        </tr>
        <tr>
            <th width="30%">Supplier Id</th>
            <td><?= $sale["supplier_id"] ?></td>
        </tr>
        <tr>
            <th width="30%">Grand Total</th>
            <td><?= thousand_separator($sale['grand_total']) ?></td>
        </tr>
        <tr>
            <th width="30%">User Id</th>
            <td><?= $sale["user_id"] ?></td>
        </tr>
    </tbody>
</table>
</table>
</div>

<br>
<div class="float-md-none">
      <div class="container pt-2">
   <button class="btn btn-dark button1 mb-4" data-bs-toggle="modal" data-bs-target="#modal-add-sale-item">
  Tambah Sale Item <i class="fa-solid fa-shop"></i>
</button>
</div>
</div>


<div class="table-responsive container shadow-lg rounded">
<table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Sale Item</caption>
        <thead class="table-dark text-light rounded">
    <th>No</th>
    <th>Item</th>
    <th>Qty</th>
    <th>Price</th>
    <th>Subtotal</th>
  </thead>
  <tbody>
    <?php foreach($sale_items as $index => $sale_item): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $sale_item->medicine_name ?></td>
        <td><?= $sale_item->quantity ?></td>
        <td><?= thousand_separator($sale_item->price) ?></td>
        <td><?= thousand_separator($sale_item->subtotal) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
    </div>
<div class="modal fade" tabindex="-1" id="modal-add-sale-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Sale Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/saleitems" method="post">
          <div class="mb-3">
            <label for="medicine_id" class="form-label">Item ID</label>
            <input type="text" name="search_item" id="search_item" class="form-control">
            <input type="hidden" name="medicine_id" id="medicine_id" class="form-control" value="<?= set_value('medicine_id') ?>">
            <input type="hidden" name="sale_id" id="sale_id" class="form-control" value="<?= $sale['id'] ?>">
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" name="quantity" id="quantity" class="form-control" value="<?= set_value('quantity') ?>">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="<?= set_value('price') ?>">
          </div>
          <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="text" name="subtotal" id="subtotal" class="form-control" value="<?= set_value('subtotal') ?>" readonly>
          </div>
          <div class="mb-3">
            <input type="submit" value="Simpan" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function(){
    $('#search_item').autocomplete({
      source: "<?= site_url('medicine/get_autocomplete') ?>",
      select: function(event, ui){
        $('#medicine_id').val(ui.item.id);
      }
    })

    $('#quantity, #price').on('keyup', function(e){
      var $subtotal = $('#subtotal')
      var $quantity = $('#quantity')
      var $price = $('#price')
      var subtotal = parseInt($quantity.val()) * parseInt($price.val())
      $subtotal.val(subtotal)
    })
  })
</script>