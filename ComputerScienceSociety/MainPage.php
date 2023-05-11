<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Computer Science Society</title>
        <link href="topbtn.css" rel="stylesheet" type="text/css" />
        <script src="topbtn.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="mainStyle.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
      </head>
    <body>
      
    <button onclick="topFunction()" id="upButton" title="Go to top">Top</button>
    <header  class="p-3 text-bg-dark">
        <div class="container">
            <div class=" d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li> 
                <a class="nav-link fs-5 pe-4 text-white link-primary" href="MainPage.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                  </svg>
                </a>
                </li>
                <li> <a class="nav-link fs-5 px-2 text-white link-primary" href="event.php">Event</a></li>
                <li> <a class="nav-link fs-5 px-2 text-white link-primary" href="volunteer.php">Volunteer</a></li>  
             </ul>
             
             <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-4" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
              </form>

             <div class="text-end">
                <a class="nav-link px-2 text-white link-primary" href="login.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                </a>
              </div>

            </div>
        </div>
    </header>

    


<div class="container">
    <div class="title-1 text-white pt-4">
        <p>Welcome to</p>
     </div>
    
     <div class="title-2 text-white">
      <h1 text-white>Computer Science Society <h1> 
     </div>

     <div class="title-3 text-white">
      <p text-white>TARUC Penang<p> 
     </div>
      
  
     <div class="img-slider fill">
      <div class="slide active">
        <img src="Slide1.png" alt="">
        <div class="caption">
          <p>Welcome to Computer Science Society</p>
        </div>
        </div>
        <div class="slide">
          <img src="Slide2.png" alt="">
          <div class="caption-link a-1">
            <a class="text-white link-primary" href="volunteer.php">Join Us Now</a>
          </div>
          <div class="caption-reg">
            <p class="">Register to be a society member now</p>
          </div>
        </div>
        <div class="slide">
          <img src="Slide3.png" alt="">
          <div class="caption">
            <p class="">Computer Science Society TARUC Penang Social Media</p>
          </div>
        </div>
        <div class="navigation">
          <div class="btn active"></div>
          <div class="btn"></div>
          <div class="btn"></div>

  
        </div>
      </div>
  </div>

    <script type="text/javascript">
      var slides = document.querySelectorAll('.slide');
      var btns = document.querySelectorAll('.btn');
      let currentSlide = 1;
  
      var manualNav = function(manual){
        slides.forEach((slide) => {
          slide.classList.remove('active');
  
          btns.forEach((btn) => {
            btn.classList.remove('active');
          });
        });
  
        slides[manual].classList.add('active');
        btns[manual].classList.add('active');
      }
  
      btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
          manualNav(i);
          currentSlide = i;
        });
      });
  
      var repeat = function(activeClass){
        let active = document.getElementsByClassName('active');
        let i = 1;
  
        var repeater = () => {
          setTimeout(function(){
            [...active].forEach((activeSlide) => {
              activeSlide.classList.remove('active');
            });
  
          slides[i].classList.add('active');
          btns[i].classList.add('active');
          i++;
  
          if(slides.length == i){
            i = 0;
          }
          if(i >= slides.length){
            return;
          }
          repeater();
        }, 10000);
        }
        repeater();
      }
      repeat();
      </script>


<hr class="pt-5">

<div class="container pb-5">
    <hr class="pt-3">

    <div class="row align-items-center">
      <div class="col-md-7 order-md-2 pt-4">
        <h2 class="text-white">About Computer Science Society</span></h2>
        <p class="text-white pt-3" style="font-size: 20px;">We are the Computer Science Society from TARUC Penang Branch Campus, Faculty of Computer Science (FOCS) students. Our society and yearly events involves various diversified leading IT & Business companies to share the outside world to our community. As we share latest IT & business industry news (knowledge) to groom students of TAR UMT so that they are well prepared and equipped with knowledge when they step out to the wilderness after their tertiary education.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="about.png" width="500" height="500">
      </div>
    </div>
</div>

<hr class="pt-5">

<div class=" container ">
  <div class="row align-items-center ">
     <div class="column-1 col-lg-6">
       <a href="event.php">
         <img src="event.png" class="img-thumbnail">
       </a>
       <div class="img-a-text">
         <a href="event.php">
          <h3>Event</h3>
         </a>
       </div>
     </div>
     
     <div class="column-1 col-lg-6 ">
       <a href="volunteer.php">
         <img src="volunteer.png">
       </a>
       <div class="img-a-text">
        <a href="volunteer.php">
          <h3>Volunteer</h3>
        </a>
       </div>
     </div>
  </div> 
</div>

<hr class="p-5">

<footer class="bg-dark text-center text-white">

  <div class="container pt-4">

    <footer class="bg-dark text-center text-white">
    <section class="mb-2">

      <div class="row">

        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="event.php" class="nav-link text-white link-primary ">Event</a>
            </li>
            <li>
              <a href="volunteer.php" class="nav-link text-white link-primary">Volunteer</a>
            </li>
          </ul>
        </div>


        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Contact Us</h5>

          <ul class="list-unstyled">
            <p>TARUC Penang Branch Campus</p>
            <p>Publicity Committee</p>
            <li>
              <a class="text-white link-primary" href="mailto:ooizh-pm21@student.tarc.edu.my">ooizh-pm21@student.tarc.edu.my</a>
            </li>
          </ul>
        </div>


        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
                <a class="btn btn-outline-primary btn-floating m-2" href="https://www.facebook.com/TARUCPBCSS" role="button">
                  <i class="fab fa-facebook-f"></i>
                </a>

                <a class="btn btn-outline-primary btn-floating m-2" style="width:39px; text-align: center;" href="https://www.instagram.com/cs_taruc/?hl=en" role="button">
                  <i class="fab fa-instagram"></i>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>

  <hr style="color:rgb(97, 97, 97);background-color:rgb(37, 37, 37)">
  <div class="text-center pb-2 text-bg-dark">
    <p class="text-white"><small>@Computer Science Society Taruc Penang</small></p>
  </div>
</footer>
    </body>
</html>