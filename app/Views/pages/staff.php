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
        <h1 >Staff <i class="fa-solid fa-user"></i> <div class="float-end me-md-2"><a href="./home"></a></i></div><br></h1>
    </div>
    </div>

    <?php foreach (session()->getFlashdata() as $key => $flash) : ?>
                    <div class="alert alert-<?= $key ?>" role="alert">
                    <?= $flash ?>
                </div>
                <?php endforeach; ?>
    <div class="float-end me-md-5 p-3">
         <button type="button" class="btn btn-dark button1" data-bs-toggle="modal" data-bs-target="#exampleModal"><h1></h1>
            Add staff <i class="fa-solid fa-user-plus"></i> 
        </button>
    </div>
    <div class="table-responsive container shadow-lg rounded">
  <table class="table shadow-lg">
  <table class="table caption-top">
  <caption>Daftar List Staff</caption>
  <thead class="table-dark text-light rounded">
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col">Nama Pengguna</th>
      <th scope="col">Umur</th>
      <th scope="col">Profesi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
      <th scope="row">1</th>
      <td>Lalo</td>
      <td>19</td>
      <td>Staff</td>
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
      <td>Melky</td>
      <td>20</td>
      <td>Penjaga Toko</td>
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

<!-- Modal Add Staff-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff <i class="fa-solid fa-user-plus"></i>  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <div class="mb-3">
            <label for="nameuser" class="form-label">Nama Staff</label>
            <input type="text" name="nameuser" id="nameuser" class="form-control" placeholder="Masukkan nama" value="<?= set_value('nameuser') ?>">
            <?php if (isset($errors) and $errors->getError('nameuser')) { ?>
              <div class='text-danger mt-2'>
                <?= $error = $errors->getError('nameuser'); ?>
              </div>
            <?php } ?>
    </div>
      <div class="mb-3">
            <label for="umur" class="form-label">Umur </label>
            <input type="text" name="umur" class="form-control" id="umur" placeholder="Masukkan umur" value="<?= set_value('umur') ?>">
            <?php if(isset($errors) and $errors->getError('umur')) { ?>
              <div class='text-danger mt-2'>
                <?= $error = $errors->getError('umur'); ?>
              </div>
            <?php } ?>
    </div>
    <div class="mb-3">
    <label for="profesi" class="form-label">Staff</label>
    <input type="text" name="profesi" class="form-control" id="profesi" placeholder="Masukkan profesi" value="<?= set_value('profesi') ?>">
            <?php if(isset($errors) and $errors->getError('profesi')) { ?>
              <div class='text-danger mt-2'>
                <?= $error = $errors->getError('profesi'); ?>
              </div>
            <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Simpan">
      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Staff</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama">
    </div>
      <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Umur </label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan umur">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Staff</label>
    <select class="form-select" required aria-label="select example">
      <option value="">Profesi Staff</option>
      <option value="1">Kasir</option>
      <option value="1">Penjaga Toko</option>
      </select>
    <div class="invalid-feedback">Example invalid select feedback</div>
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