<!DOCTYPE html>

<html lang="en" dir="ltr">
    
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/header.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

   <!--Icon-->
   <link rel="icon" href="Image/airbnb.ico" /> 

</head>


<body style="background: linear-gradient(to right,#1F6ED4 , #B9EDF8);" >
    <header>
    <div class="nav-bar">
      <a href="" class="logo">Homify</a>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="Owner/login.php" style= "color: #03254C; text"><i class="uil uil-envelope"></i><b> Rent Out Your House! </b></a>
       </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
      
      
    <div class="scroll-indicator-container">
      <div class="scroll-indicator-bar"></div>
    </div>
      
  </header>
    <br>
    <br>

    

    
    

  <script>
    //Javacript for the scroll indicator bar
    window.addEventListener("scroll", () => {
      const indicatorBar = document.querySelector(".scroll-indicator-bar");

      const pageScroll = document.body.scrollTop || document.documentElement.scrollTop;
      const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      const scrollValue = (pageScroll / height) * 100;

      indicatorBar.style.width = scrollValue + "%";
    });

    //Responsive navigation menu toggle
    const menuBtn = document.querySelector(".nav-menu-btn");
    const closeBtn = document.querySelector(".nav-close-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      navigation.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
      navigation.classList.remove("active");
    });
  </script>

</body>



</html>
 
