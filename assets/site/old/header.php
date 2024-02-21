<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Tales of Joy</title>
    <!-- ====================== Css file ================== -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/fontawesome.css">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">

    <link type="text/css" rel="stylesheet" href="css/style.css">

    <!-- main fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/all.css">

</head>

<body>

    <!----------- header start ----------->
    <header>
        <div class="container-fluid d-flex align-items-center justify-content-between p-0">
            <div class="header-logo">
                <a href="index.php"><img src="images/tales-of-joy-round-logo.png" alt=""></a>
            </div>
            <div class="header-content">
                <div class="top-content d-flex align-items-center justify-content-between gap-20">
                    <div class="logo-caption">
                        <a href="index.php"><img src="images/tales-of-joy-caption.png" alt=""></a>
                    </div>
                    <div class="header-search">
                        <input type="text" class="form-control" placeholder="Search for products" aria-label="Search for products " aria-describedby="button-addon2">
                        <button class="btn" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="d-flex align-items-center gap-20">
                        <div class="dropdown header-support-dropdown d-none">
                            <button class="header-support dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Support
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <!-- <div class="header-support"><a href="">Support +</a></div> -->
                        <div class="header-social">
                            <ul class="d-flex gap-10">
                                <li><a href="" class="rounded-circle"><i class="fa-brands fa-google"></i></a></li>
                                <li><a href="" class="rounded-circle"><i class="fa-solid fa-location-dot"></i></a></li>
                                <li><a href=""><i class="fa-solid fa-user"></i></a></li>
                                <li><a href=""><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bottom-content">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid p-0">
                            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button> -->
                            <div class="collapse navbar-collapse collapse-menu justify-content-center" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Dogs</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Cats</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Birds</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Fish & aquatics</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Best selling</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">New arrivals</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Brand</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li> <a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
                                            <li> <a class="dropdown-item" href="#"> Dropdown item 2 <span>&raquo;</span> </a>
                                            <ul class="submenu dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
                                                <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
                                                <li><a class="dropdown-item" href="#">Submenu item 3</a></li>
                                                <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
                                            </ul>
                                            </li>
                                            <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                                            <li><a class="dropdown-item" href="#"> Dropdown item 4 </a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Offer</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Contact us</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#">Blog</a>
                                    </li>
                                </ul>
                                <div class="colapse-close">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>

                        <div class="menu-overlay"></div>
                        <div class="hamburger-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!----------- header End ----------->
