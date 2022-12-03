<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/style/login.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<section class="vh-120 inibackground" style="background: linear-gradient(to right, #cc95c0, #dbd4b4, #7aa1d2)">
  <div class="container untukmargin py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card shadow-lg" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="/images/doctor.jpg"
                alt="login form" class="img-fluid pt-4 " style="border-radius: 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <?php foreach (session()->getFlashdata() as $key => $flash) : ?>
                    <div class="alert alert-<?= $key ?>" role="alert">
                    <?= $flash ?>
                </div>
                <?php endforeach; ?>
                <form action="/sessions" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                  <img src="/images/contoh1.png" style="height: 50px">
                    <span class="h1 fw-bold mb-0">Apotek Sigma</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="exampleFormControlInput1"><b>Email address</b></label>
                    <input type="email" name="email" id="exampleFormControlInput1" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="password"><b>Password</b></label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="/users/new"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>