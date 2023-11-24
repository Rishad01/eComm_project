<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a class="navbar-brand" href="#"><img height="50px" width="50px" src="<?= base_url('assets/logo.svg'); ?>" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="<?= base_url('admin/category') ?>" class="nav-link px-2 link-body-emphasis">Categories</a></li>
          <li><a href="<?= base_url('admin/product') ?>" class="nav-link px-2 link-body-emphasis">Products</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Status of Orders</a></li>
          <li><a href="<?= base_url('admin/service_area') ?>" class="nav-link px-2 link-body-emphasis">Availability</a></li>
        </ul>

        

        <div class="dropdown text-end">
        <a href="#" class="nav-link px-2 link-body-emphasis">Log Out</a>
        </div>
      </div>
    </div>
  </header>