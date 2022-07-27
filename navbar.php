<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PxB SHOP </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="member_data.php">ข้อมูลของฉัน</a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?')">ออกจากระบบ</a>
        </li>
        
      </ul>
      <form class="form-inline my-2 my-lg-0" action="home.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
