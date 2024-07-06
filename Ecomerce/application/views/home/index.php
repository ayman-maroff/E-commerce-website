
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scroll Website</title>
    <link href="<?php echo URL; ?>public/css/center.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="#home" id="navbar__logo">Ecommerce</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="#home" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <a href="#about" class="navbar__links" id="about-page">About</a>
                </li>
                <li class="navbar__item">
                    <a href="#services" class="navbar__links" id="services-page">Services</a>
                </li>
                <li class="navbar__btn">
                    <form   action="<?php echo URL; ?>user/login" method="post">
                        <input  type="submit" name="btn1" style="cursor: pointer" id="signup" class="button" value="Sign In">
              
                    </form>
                </li>
                <li class="navbar__btn">
                    <form   action="<?php echo URL; ?>user/preparetoRegister" method="post">
                        <input  type="submit" name="btn1" style="cursor: pointer" id="signup" class="button" value="Sign Up">
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" id="home">
        <div class="hero__container">
            <h1 class="hero__heading">Ecommerce WebSite</h1>
            <p class="hero__description">Home Page</p>
            <!-- <button class="main__btn"><a href="#">Explore</a></button> -->
        </div>
    </div>

   <!-- About Section -->
   <div class="main" id="about">
        <div class="main__container">

            <div class="main__img--container">
                <div class="main__img--card">
                <img class="icon" src="<?php echo URL; ?>public/img/pic3.jpeg">    
            </div>
            </div>
            <div class="main__content">
                <h1>What do we do?</h1>
                <h2>We help businesses scale</h2>
                <p>Schedule a call to learn more about our services</p>
                <!-- <button class="main__btn"><a href="#">Schedule Call</a></button> -->
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="services" id="services">
        <h1>Our Services</h1>
        <div class="services__wrapper">
            <div class="services__card" id="card1">
                <h2>Storing</h2>
               
                <!-- <div class="services__btn"><button>Get Started</button></div> -->
                
            </div>
            <div class="services__card" id="card2">
                <h2>Delivery to your home</h2>
           
                <!-- <div class="services__btn"><button>Get Started</button></div> -->
            </div>
            <div class="services__card" id="card3">
                <h2>Sale your products</h2>
           
                <!-- <div class="services__btn"><button>Get Started</button></div> -->
            </div>
            <div class="services__card" id="card4">
                <h2>buy every thing you need</h2>
              
                <!-- <div class="services__btn"><button></button></div> -->
            </div>
        </div>
    </div>

    <div class="footer__container">
        <div class="footer__links">
            
            <div class="footer__link--wrapper">
                
                <div class="footer__link--items">
               
                <h2>About Us</h2>
     <p class="footer__para">
                <a> We aim to expand the spread of distance learning systems,</a></br>
                        <a>  by providing all the required qualifications</a></br>
                        <a>    of cadres and tools for students </a></br>
                        <a>             who wish to do,</a></br>s
                    <a> so make your access to information faster and join us!</a>

</p> 

                </div>
                
            </div>
            
        </div>
        <section class="social__media">
            <div class="social__media--wrap">
                <div class="footer__logo">
                    <a href="/" id="footer__logo">Ecomerce</a>
                </div>
                <p class="website__rights">© Ecomerce 2022. All rights reserved</p>
               
            </div>
        </section>
    </div>

    <script src="../../../public/js/homejs.js"></script>
</body>

</html>