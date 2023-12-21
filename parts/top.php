
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="assets/img/profile.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Felix Nyabuto</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="github"><i class="bx bxl-github"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#reviews" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Reviews</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav>

      <nav id="loginbar" class="nav-menu loginbar">
        <ul>
          <?php
          session_start();
          if (isset($_SESSION['login']) ) {
            
            echo '<li><button id = "logout" onclick="window.location.href = \'logout/logout.php\'");">Log out</button></li>';
            echo '<li><button id="more" onclick="window.location.href = \'reviews/review.php\'">Give a review</button></li>';
            echo '<li><button id="profile" onclick="window.location.href = \'profile/profile.php\'">Profile</button></li>';
          } else {
            echo '<li><button id = "login"onclick="window.location.href = \'login/login.php\'">Log in</button></li>';
            echo '<li><button id = "signup"onclick="window.location.href = \'signup/signup.php\'">Sign up</button></li>';
          }
          ?>
        </ul>
      </nav>
    </div>
  </header>