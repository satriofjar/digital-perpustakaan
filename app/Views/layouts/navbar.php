<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-green">
    <div class="container-fluid container ">
      <a class="navbar-brand text-white" href="/">Digital Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link mx-3 text-white" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3 text-white" href="<?= base_url('user') ?>">My Book</a>
          </li>
          <?php if(in_groups('admin')) :?>
          <li class="nav-item">
            <a class="nav-link mx-3 text-white" href="<?= base_url('admin/books') ?>">Dashboard</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <?php if(logged_in()) :?>
            <a class="nav-link mx-3 text-white" href="<?= base_url('logout') ?>">logout</a>
            <?php else: ?>
              <a class="nav-link mx-3 text-white" href="<?= base_url('/login') ?>">Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>