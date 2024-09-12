<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === "index.php" ? "active":null ?>" aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === "sign-up.php" ? "active":null ?>" href="./sign-up.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sign In</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item" href="#">Update Profile</a></li>
            <li><a class="dropdown-item" href="#">Profile Image</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link">Contact</a>
        </li>
      </ul>
      <div>
          <form class="input-group" role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
          </form>
      </div>
    </div>
  </div>
</nav>