<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="full1">
    <div class="text-dark p-1 text-center shadow-lg fontbg">
        <div class="title1">
        <h1 >Penjualan  <i class="fa-solid fa-book"></i></i><div class="float-end me-md-2"></div><br></h1>
    </div>
    </div>
    <div class="container p-5">
      <h1>Daftar Barang</h1>
      </div>
      <div class="table-responsive shadow-lg rounded">
  <table class="table">
  <thead class="table-dark text-light rounded">
    <tr class="text-center rounded">
      <th scope="col">No</th>
      <th scope="col">Obat yang dijual</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <th scope="row">1</th>
      <td>Bethadine</td>
      <td>Rp 5.000</td>
      <td>10</td>
      <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
            Edit
        </button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletehapus">
            Delete
        </button>
      </td>
    </tr>
    <tr class="text-center">
      <th scope="row">2</th>
      <td>Obat biru</td>
      <td>Rp 10.000</td>
      <td>5</td>
      <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
            Edit
        </button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletehapus">
            Delete
        </button>
      </td>
    </tr>
  </tbody>
</table>
  </table>
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
            </div>
        </div>
    </div>
    </div>
</div>
        </div>
</div>


    </div>
 <!-- modal edit -->   
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama obat</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan obat yang mau dijual">
          </div>
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan harga">
      </div>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Stok</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan jumlah stok">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="deletehapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda Yakin ingin menghapus Data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>