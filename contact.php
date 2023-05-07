<!-- connect the server database and send form info -->
<?php
// mysqli_connect('server','username','password','database name') هنا البراميتر كل جهاز له قيم مختلفه
$conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

if(isset($_POST['name'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM contact_ WHERE name = '$name' AND email = '$email'  AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'Message Sent Already!';
    
   }else{
      mysqli_query($conn, "INSERT INTO contact_(name, email, message) VALUES('$name', '$email', '$msg')") or die('query failed');
      $message[] = 'msg sent  Successfully!';
   }
  
   

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mark</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;700;900&family=Quicksand:wght@400;500;600;700&display=swap"
    rel="stylesheet">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- aos css link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- aos js link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
       AOS.init({
          duration:800,
          delay:300
       });
    </script>

</head>

<body>
<?php

  if(isset($message)){
     foreach($message as $message){
        echo '
        <div class="message" >
           <span>'.$message.'</span>
           <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
     }
  }

  ?>

  <!--
    - HEADER
  -->

  <header class="header" data-header>

    <div class="container">



      <button class="menu-toggle-btn" data-nav-toggle-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar">
        <ul class="navbar-list">

          <li>
            <a href="./index.html" class="navbar-link">Home</a>
          </li>
          <li>
            <a href="./skills.html" class="navbar-link">Skills</a>
          </li>
          <li>
            <a href="./apps.html" class="navbar-link">Apps</a>
          </li>

          <li>
            <a href="./metaverse.html" class="navbar-link">Metaverse</a>
          </li>

          <li>
            <a href="./contact.php" class="navbar-link">Contact Info</a>
          </li>

        </ul>

      </nav>

    </div>
  </header>





  <main>
    <article>

      <!--
        - CONTACT
      -->

      <section class="contact" id="contact">
        <div class="container">

          <h2 class="h2 section-title">Contact Info</h2>

          <p class="section-text">
            I would love to hear from you! <br>
            Have questions about our programing, features, or Need a demo?
          </p>



          <div class="contact-wrapper">

            <form id="contact_form" action="" class="contact-form" method="post">

              <div class="wrapper-flex">

                <div class="input-wrapper">
                  <label for="name">Name*</label>

                  <input type="text" name="name" id="name" placeholder="Enter Your Name" class="input-field">
                </div>

                <div class="input-wrapper">
                  <label for="emai">Email*</label>

                  <input type="text" name="email" id="email" placeholder="Enter Your Email"
                    class="input-field">
                </div>

              </div>

              <label for="message">Message*</label>

              <textarea name="message" id="message" placeholder="Type Your Message"
                class="input-field"></textarea>

              <button type="button" class="btn btn-primary" onclick="msg()">
                <span>Send Message</span>
                <ion-icon name="paper-plane-outline"></ion-icon>
              </button>

            </form>

            <ul class="contact-list">

              <li>
                <a href="mailto:support@website.com" class="contact-link">
                  <ion-icon name="mail-outline"></ion-icon>

                  <span>: MarkZuckerberg@gmail.com</span>
                </a>
              </li>

              <li>
                <a href="#" class="contact-link">
                  <ion-icon name="globe-outline"></ion-icon>

                  <span>: www.website.com</span>
                </a>
              </li>

              <li>
                <a href="tel:+0011234567890" class="contact-link">
                  <ion-icon name="call-outline"></ion-icon>

                  <span>: 001-000-000-000</span>
                </a>
              </li>

              <li>
                <div class="contact-link">
                  <ion-icon name="time-outline"></ion-icon>

                  <span>: 9:00 AM - 6:00 PM</span>
                </div>
              </li>

              <li>
                <a href="#" class="contact-link">
                  <ion-icon name="location-outline"></ion-icon>

                  <address>: Works at Chan Zuckerberg Initiative.</address>
                </a>
              </li>

            </ul>
            <div></div>
            <div class="list-icon">

              <a href="https://www.instagram.com/zuck/" target="_blank" class="a-list">
                <!-- Instgram -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"
                style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                  stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                  font-family="none" font-weight="none" font-size="none" text-anchor="none"
                  style="mix-blend-mode: normal">
                  <path d="M0,172v-172h172v172z" fill="none"></path>
                  <g fill="#5c50dc">
                    <path
                      d="M57.33333,21.5c-19.7585,0 -35.83333,16.07483 -35.83333,35.83333v57.33333c0,19.7585 16.07483,35.83333 35.83333,35.83333h57.33333c19.7585,0 35.83333,-16.07483 35.83333,-35.83333v-57.33333c0,-19.7585 -16.07483,-35.83333 -35.83333,-35.83333zM57.33333,35.83333h57.33333c11.85367,0 21.5,9.64633 21.5,21.5v57.33333c0,11.85367 -9.64633,21.5 -21.5,21.5h-57.33333c-11.85367,0 -21.5,-9.64633 -21.5,-21.5v-57.33333c0,-11.85367 9.64633,-21.5 21.5,-21.5zM121.83333,43c-3.95804,0 -7.16667,3.20863 -7.16667,7.16667c0,3.95804 3.20863,7.16667 7.16667,7.16667c3.95804,0 7.16667,-3.20863 7.16667,-7.16667c0,-3.95804 -3.20863,-7.16667 -7.16667,-7.16667zM86,50.16667c-19.7585,0 -35.83333,16.07483 -35.83333,35.83333c0,19.7585 16.07483,35.83333 35.83333,35.83333c19.7585,0 35.83333,-16.07483 35.83333,-35.83333c0,-19.7585 -16.07483,-35.83333 -35.83333,-35.83333zM86,64.5c11.85367,0 21.5,9.64633 21.5,21.5c0,11.85367 -9.64633,21.5 -21.5,21.5c-11.85367,0 -21.5,-9.64633 -21.5,-21.5c0,-11.85367 9.64633,-21.5 21.5,-21.5z">
                    </path>
                  </g>
                </g>
              </svg>
              </a>

              <a href="https://www.facebook.com/zuck" target="_blank" class="a-list">
                  <!-- Facebook -->
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"
                    style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                      stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                      font-family="none" font-weight="none" font-size="none" text-anchor="none"
                      style="mix-blend-mode: normal">
                      <path d="M0,172v-172h172v172z" fill="none"></path>
                      <g fill="#5c50dc">
                        <path
                          d="M86,14.33333c-39.49552,0 -71.66667,32.17115 -71.66667,71.66667c0,39.49552 32.17115,71.66667 71.66667,71.66667c39.49552,0 71.66667,-32.17115 71.66667,-71.66667c0,-39.49552 -32.17115,-71.66667 -71.66667,-71.66667zM86,28.66667c31.74921,0 57.33333,25.58412 57.33333,57.33333c0,28.77035 -21.03186,52.40996 -48.59896,56.60547v-39.51465h16.6849l2.61751,-16.95085h-19.30241v-9.26628c0,-7.04483 2.29501,-13.29752 8.88834,-13.29752h10.58203v-14.79525c-1.86333,-0.25083 -5.7957,-0.79785 -13.22754,-0.79785c-15.523,0 -24.62142,8.19867 -24.62142,26.875v11.2819h-15.95703v16.95085h15.95703v39.37467c-27.11871,-4.57277 -47.68913,-28.01213 -47.68913,-56.46549c0,-31.74921 25.58412,-57.33333 57.33333,-57.33333z">
                        </path>
                      </g>
                    </g>
                  </svg>
              </a>

              <a href="https://twitter.com/finkd" target="_blank" class="a-list">
                <!-- Twitter -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"
                  style=" fill:#000000;">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                    style="mix-blend-mode: normal">
                    <path d="M0,172v-172h172v172z" fill="none"></path>
                    <g fill="#5c50dc">
                      <path
                        d="M150.5,46.00244c-4.74511,2.09961 -9.84717,3.52734 -15.20117,4.15722c5.45898,-3.27539 9.6582,-8.46142 11.63184,-14.63428c-5.10205,3.02344 -10.771,5.22803 -16.79687,6.42481c-4.8291,-5.14405 -11.71582,-8.37744 -19.31641,-8.37744c-14.61328,0 -26.47608,11.86279 -26.47608,26.47607c0,2.07861 0.23096,4.09424 0.69288,6.02588c-22.00391,-1.0918 -41.50928,-11.63184 -54.54785,-27.65185c-2.28857,3.90527 -3.59033,8.46142 -3.59033,13.31152c0,9.17529 4.66114,17.27979 11.77881,22.0249c-4.34619,-0.14697 -8.41944,-1.32275 -11.98877,-3.31738c0,0.12597 0,0.23096 0,0.33594c0,12.82861 9.1123,23.53662 21.22705,25.95117c-2.22559,0.60889 -4.55616,0.94482 -6.9707,0.94482c-1.70069,0 -3.38038,-0.16797 -4.97608,-0.48291c3.35938,10.51905 13.14356,18.16163 24.71241,18.39258c-9.04932,7.09668 -20.47119,11.3169 -32.85889,11.3169c-2.1416,0 -4.24121,-0.12597 -6.31982,-0.37793c11.71582,7.5166 25.61523,11.90478 40.56445,11.90478c48.68994,0 75.31299,-40.33349 75.31299,-75.31298c0,-1.13379 -0.04199,-2.28858 -0.08398,-3.42236c5.16504,-3.73731 9.6582,-8.39844 13.20654,-13.68945z">
                      </path>
                    </g>
                  </g>
                </svg>
              </a>

            </div>

          </div>

        </div>
      </section>

    </article>
  </main>





  <!--
    - FOOTER
  -->

  <footer>

    <div class="footer-top">
      <div class="container">

  </footer>





  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
