<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <title>Document</title>
    <style>

        body{
            background-color: #FBF6EE;
        }
        
        .y_choose_us{
            background-color: white;
            margin: 10px;
            padding: 10px;
            border-top-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        

        #cat{
            width: 100%;
            box-shadow: 5px 5px 5px grey;
        }

        .row{
            margin: 10px;
        }

        .catImages{
        max-height: 250px; 
        overflow: hidden;
        transition: 0.75s;
    }   

        .catImages:hover { 
        transform:scale(1.15);
    }  
    
        .testimonial{
            margin-top: 25px;
        }

    
       
    </style>
</head>
<body>

<!---------------------------------------------------------------NAVIGATION BAR--------------------------------------------------------------->
<?= $this->include('partials/user_dashboard') ?>
<!---<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img height="50px" width="50px" src="<?= base_url('assets/logo.svg'); ?>" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Signup</a>
            </li>
        </ul>
        </div>
        </div>
    </div>
    </nav>--->
    <!---------------------------------------------------------------CROUSEL--------------------------------------------------------------->
    <div id="carouselExampleCaptions" class="carousel slide shadow  mb-5 bg-body-tertiary rounded" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img style="height:75vh" src="<?= base_url('assets/angular_stone.jpg'); ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="fw-bold ">Crafting Foundations, Creating Legacies</h5>
        </div>
        </div>
        <div class="carousel-item">
        <img style="height:75vh" src="<?= base_url('assets/brick.jpg'); ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="fw-bold">Discover the Strength of Our Construction Materials</h5>
        </div>
        </div>
        <div class="carousel-item">
        <img style="height:75vh" src="<?= base_url('assets/iron_rod.jpg'); ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="fw-bold">Elevate Your Builds with Our Superior Materials</h5>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    

    <!-----------------------------------------CATEGORIES PICTURE------------------------------------------->
    <div class="container text-center">
        <div class="row gy-5">
            <div  class="col-md-4 align-self-center catImages">
             <img id="cat" src="<?= base_url('assets/Prism Cement _ Champion.jpg') ?>" class="rounded" alt="...">
            </div>
            <div  class="col-md-4 align-self-center catImages">
             <img id="cat" src="<?= base_url('assets/iron_rod2.jpg') ?>" class="rounded" alt="...">
            </div>
            <div  class="col-md-4 align-self-center catImages">
             <img id="cat" src="<?= base_url('assets/sand.jpg') ?>" class="rounded" alt="...">
            </div>
        </div>
        <div class="row gy-10 justify-content-center">
            <div  class="col-4 catImages">
             <a href="#" type="button" class="btn btn-dark">Explore more &rarr;</a>
            </div>
        </div>
    </div>
    

    <!-------------------------------------------TESTIMONIAL-------------------------------------------------->
    <div class="container testimonial text-center">
    <div class="row justify-content-center">
    <div class="col-md-6 align-self-center">
        <h4>
            Listen What Are Customers Say about Us?
        </h4>
    </div>
    </div>  

    <div class="row justify-content-center">
    <div class="col-md-8 align-self-center">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-6 ">
                            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    </div>  
    </div>  

    <!--------------------------------------------Why choose us------------------------------------------------------>

    <div class="y_choose_us bg-secondary bg-gradient bg-opacity-25 shadow  mb-5 bg-body-tertiary">
        <h3>Why choose us?</h3>
            <h5>Wide Range of Products</h5>

            <p>Discover an extensive array of construction materials tailored to meet diverse project needs. 
            Our wide range of high-quality products ensures you find the perfect solutions for any building endeavor.</p>



            <h5>Quality Assurance</h5>

            <p>Our commitment to excellence extends from sourcing to delivery, providing peace of mind and confidence in the superior quality of our construction materials.</p>


            <h5>Competitive Pricing</h5>

            <p>We pride ourselves on offering competitive pricing without compromising on quality.
            Explore our extensive range of products knowing that you're getting the best value for your construction needs.</p>


            <h5>Customer Reviews and Testimonials</h5>

            <p>Discover why our customers trust us read glowing reviews and testimonials praising the durability, quality, and reliability of our construction materials. 
            Join the community of satisfied builders who have chosen excellence with our products.</p>
    </div>

    <!--------------------------------------------FOOTER------------------------------------------------------>
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
            <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
            <img height="50px" width="50px" src="<?= base_url('assets/logo.svg'); ?>" alt="logo">
            </a>
            <p class="text-body-secondary">© 2023</p>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
            </ul>
            </div>

            <div class="col mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
            </ul>
            </div>

            <div class="col mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
            </ul>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>