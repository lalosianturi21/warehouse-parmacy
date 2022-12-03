<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <title>Bootstrap 5 Side Bar Navigation</title>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a2331dbcf7.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  
  <div class="sidebar">
    <div class="logo-details">
            <img src="/images/contoh1.png" style="height: 50px">
        <div class="logo_name">SIGMA</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="/dashboard">
        <i class="fa-solid fa-gauge"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
     <li>
       <a href="/medicine">
       <i class="fa-solid fa-capsules"></i>
         <span class="links_name">Medicine</span>
       </a>
       <span class="tooltip">Medicine</span>
     </li>
     <li>
       <a href="/categories">
       <i class="fa-solid fa-grip-vertical"></i>
         <span class="links_name">Categories</span>
       </a>
       <span class="tooltip">Categories</span>
     </li>
     <li>
     <a href="/purchases">
     <i class="fa-brands fa-shopify"></i>
         <span class="links_name">Purchases</span>
       </a>
       <span class="tooltip">Purchases</span>
      </li>
      <li>
      <li>
     <a href="/itemunits">
     <i class="fa-solid fa-tag"></i>
         <span class="links_name">Item Units</span>
       </a>
       <span class="tooltip">Item Units</span>
      </li>
      <li>
      <li>
     <a href="/sales">
     <i class="fa-solid fa-shop"></i>
         <span class="links_name">Sales</span>
       </a>
       <span class="tooltip">sales</span>
      </li>
      <li>
     <a href="/suppliers">
     <i class="fa-solid fa-truck-front"></i>
         <span class="links_name">Suppliers</span>
       </a>
       <span class="tooltip">Suppliers</span>
      </li>
      <li>
     <a href="/users">
     <i class="fa-solid fa-users"></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
      </li>
       <li class="profile">
        <form action="/sessions/logout" method="post">
        <button type="submit" class="btn btn-link nav-link">
        <i class='bx bx-log-out' id="log_out"></i>
         </button>
         </form>
     </li>
    </ul>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>