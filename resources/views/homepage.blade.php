<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="scrolling.js"></script>
<link href="{{ asset('cssfile/style.css') }}" rel="stylesheet">

<script type="text/javascript">

$(document).on('click','.navbar-collapse.in', function(e) {

if( $(e.target).is('a') && ( $(e.target).attr('class') != 'dropdown-toggle') ) {

$(this).collapse('hide');

}

});

</script>

    <title>Landing page</title>
</head>


<!-- ---------------------------------body----------------------------- -->



<body class="mt-4 bg-light" >
<!-- <img src="img/dorm-o.png" alt="none" height="650px" width="100%px">
   -->
<div class="has-bg-img container-fluid">

   <!-- ... (previous code) ... -->

<nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
   <div class="container-fluid px-5">
      <h1><a href="#" class="navbar-brand">
         <img src="img/logo2.png" alt="none" height="60px" width="185px">
      </a></h1>
      
      <button class="navbar-toggler" data-toggle="collapse" data-target="#mynav">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mynav">
         <ul class="navbar-nav ml-auto text-left">
            <li class="nav-item"><a class="nav-link active" href="#home"><h5>Home</h5></a></li>
            <li class="nav-item"><a class="nav-link active" href="#about"><h5>About</h5></a></li>
            <li class="nav-item"><a class="nav-link active" href="#module"><h5>Module</h5></a></li>
            <!-- <li class="nav-item"><a class="nav-link active" href="#features"><h5>Features</h5></a></li> -->

            <!-- Add login and signup buttons here -->
            <li class="nav-item">
               <a class="btn btn-outline-primary" href="/admin">Login</a>
            </li>
            <li class="nav-item">
               <a class="btn btn-outline-primary ml-2" href="#signup">Signup</a>
            </li>
         </ul>
      </div>
   </div>
</nav>

<!-- ... (remaining code) ... -->

   
</div><!-- ----------------------end of nav bar--------------------- -->
<!-- -------------------bg-image--------- -->
 <div id="home" class="conteiner-fluid text-center pt-3">

   <img src="img/dorm-o.png" alt="none" height="650px" width="90%px">
    <!-- <img src="img/dms.home.jpg" alt="none"  width="100%px" class="banner"> -->

 </div>

  <br><br>
  <br><br>

 

   <!-- ############################## About ################################# -->
    <div id="about" class="conteiner-fluid text-center">
      <!-- <img src="img/dorm-o.png" alt="none" height="650px" width="1000px"> -->
     
      <h1>welcome to cozyhome</h1>
      <br><br>
      
    </div>
    <div class="row container-fluid">
         
      <div class="col-sm-6">
       <img src="img/welcome.png" alt="none" height="400px" width="400px">
      </div>
     <div class="col-md-6 text-center mt-2 pt-3">
         <h4 class="pt-3">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias maiores officiis quasi iure aperiam unde porro incidunt maxime dolorem est. Magnam dolorum a laboriosam aperiam cum illo nostrum ad odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit veniam alias odit porro vitae optio mollitia quas a. Laboriosam dolores repellat voluptatibus voluptate culpa, aspernatur aliquam perferendis possimus deserunt tempora?
         </h4>
      </div>
      
   </div><!-- end of section about -->
   <br><br>
   <br><br>


   <!-- ----------------section-Module----------- -->
   <div id="module" class="container-fluid text-center mt-2"> <!---strat of modulr-->
     <h2>Get to know our Modules</h2>
     <br>
      <div class="row">
         <div class="col-sm-3">
             <img src="img/studentblue.png" alt="student" height="200px" width="200px">
             <h4>student management</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, magni ab quaerat illo, sapiente cumque deserunt dicta dolores veritatis rerum enim. Illum a ipsa quisquam non. Vero placeat asperiores tenetur. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore voluptates sit delectus quos, suscipit non velit nisi quas cum nostrum ipsa. Assumenda quam rerum perspiciatis commodi maiores, eum cumque a. </p>
         </div>

         <div class="col-sm-3">
             <img src="img/roomblue.png" alt="student" height="200px" width="200px">
             <h4>room management</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, magni ab quaerat illo, sapiente cumque deserunt dicta dolores veritatis rerum enim. Illum a ipsa quisquam non. Vero placeat asperiores tenetur.</p>
         </div>

         <div class="col-sm-3">
             <img src="img/mealblue.png" alt="student" height="200px" width="200px">
             <h4>meal management</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, magni ab quaerat illo, sapiente cumque deserunt dicta dolores veritatis rerum enim. Illum a ipsa quisquam non. Vero placeat asperiores tenetur.</p>
         </div>

         <div class="col-sm-3">
             <img src="img/reportblue.png" alt="student" height="200px" width="200px">
             <h4>report management</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, magni ab quaerat illo, sapiente cumque deserunt dicta dolores veritatis rerum enim. Illum a ipsa quisquam non. Vero placeat asperiores tenetur.</p>
         </div>
         
         <!-- <div class="col-sm-3">
             <img src="img/paymentblue.png" alt="student" height="200px" width="200px">
             <h4>payment management</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, magni ab quaerat illo, sapiente cumque deserunt dicta dolores veritatis rerum enim. Illum a ipsa quisquam non. Vero placeat asperiores tenetur.</p>
         </div> -->
      </div> <!-- end of row -->

   </div> <!---end of modulr-->


   <!-- ---------------------------footer Section---------------------------- -->

   <footer id="footer" class="container-fluid text-center bg-dark">
           <h4>Find Us On</h4>
           <br>
      <div class="row" >
         <div class="col-md-4">
             <img src="img/facebook.png" alt="student" height="50px" width="50px">
         </div>
         <div class="col-md-4">
             <img src="img/instagram.png" alt="student" height="50px" width="50px">
         </div>
         <div class="col-md-4">
             <img src="img/youtube.png" alt="student" height="50px" width="50px">
         </div>

         </div>
         
      </div>  <!---end of row-->

   </footer> <!---end of container-->





</body>
</html>