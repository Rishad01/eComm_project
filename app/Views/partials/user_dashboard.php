<header class="p-3 mb-3 border-bottom">
<?php if(session()->has("logged_user")): ?>
    <div class="container-fluid">
      <div class=" navbar navbar-expand-lg d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a class="navbar-brand" href="#"><img height="50px" width="50px" src="<?= base_url('assets/logo.svg'); ?>" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                </button>
        
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= base_url('homepage') ?>" class="nav-link px-2 link-body-emphasis">Home</a></li>
          <li><a href="<?= base_url('user/category_page') ?>" class="nav-link px-2 link-body-emphasis">Product</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Track Order</a></li>
          <li><a href="<?= base_url('user/profile') ?>" class="nav-link px-2 link-body-emphasis">Profile</a></li>
        </ul>

        <div class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
        <li class="nav-item"><a href="<?= base_url('user/show_cart') ?>" class="nav-link px-2 link-body-emphasis">Cart</a></li>
        <li class="nav-item"><a href="<?= base_url('homepage/logout') ?>" class="nav-link px-2 link-body-emphasis">Log Out</a></li>
        </ul>
        </div>
        </div>
    </div>
        <?php else: ?>
            <div class="container-fluid">
            <div class=" navbar navbar-expand-lg d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a class="navbar-brand" href="#"><img height="50px" width="50px" src="<?= base_url('assets/logo.svg'); ?>" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        </button>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item">
                        <a class="nav-link px-2 link-body-emphasis" aria-current="page" href="<?= base_url('homepage') ?>">Home</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link px-2 link-body-emphasis" aria-current="page" href="<?= base_url('user/category_page') ?>">Products</a>
                </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link px-2 link-body-emphasis dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Company
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg> <span>+91 1234567890</span>
                            </li>
                            <li class="dropdown-item" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>  <span>abc@gmail.com</span>
                            </li>
                        </ul>
                        </li>
                </ul>
                <div class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
        <li class="nav-item"><a href="<?= base_url('homepage/login') ?>" class="nav-link px-2 link-body-emphasis">Login</a></li>
        <li class="nav-item"><a href="<?= base_url('homepage/signup') ?>" class="nav-link px-2 link-body-emphasis">Sign Up</a></li>
        </ul>
        </div>
                </div>
            </div>
            </nav>
        <?php endif ?>    
      
  </header>