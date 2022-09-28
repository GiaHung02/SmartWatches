<div class="hero_area">
    <div class="hero_social">
        <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a>
        <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
    </div>
    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span>
                        Smart Watches
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('CATEGORY') }}"> CATEGORY </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html"> About </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <div class="user_option-box">
                        
                        <a href="{{ route('viewCart') }}">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        </a>





                    </div>
                    
                </div>
                <div>
                  
                </div>
                <div class="dropdown  dropstart text-end">
               
                    <i class="fa fa-user" aria-hidden="true" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"> LOGIN</i>
                 
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('login') }}">Login As User</a></li>
                    <li><a class="dropdown-item " href="{{ route('adminlogin') }}">Login As Admin</a></li>
                    <li><a class="dropdown-item Disable" href="#"></a></li>
                  </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
