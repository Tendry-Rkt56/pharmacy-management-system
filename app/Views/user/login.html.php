<!doctype html>
<html lang="en">

<head>
     <title>Login 04</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="assets/styles/login.css">
     <link rel="stylesheet" href="assets/styles/index.css">
     <link rel="stylesheet" href="assets/styles/bootstrap.min.css">

</head>

<body style="background:whitesmoke;">
     <?php  require_once 'components/header.php' ?>
     <section class="ftco-section">
          <div class="container">
               <?php var_dump($_SESSION['danger'])?>
               <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                         <h2 class="heading-section">Connexion</h2>
                    </div>
               </div>
               <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10">
                         <div class="wrap d-md-flex">
                              <div class="img" style="background-image: url(/image/fond/fond-1.jpg);">
                              </div>
                              <div class="login-wrap p-4 p-md-5">
                                   <div class="d-flex">
                                        <div class="w-100">
                                             <h3 class="mb-4">Sign In</h3>
                                        </div>
                                        <div class="w-100">
                                             <p class="social-media d-flex justify-content-end">
                                                  <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                                  <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                             </p>
                                        </div>
                                   </div>
                                   <form action="" method="POST" class="signin-form">
                                        <div class="form-group mb-3">
                                             <label class="label" for="name">Username</label>
                                             <input type="email" class="form-control" placeholder="Email..." name="email" required>
                                        </div>
                                        <div class="form-group mb-3">
                                             <label class="label" for="password">Password</label>
                                             <input type="password" class="form-control" placeholder="Password..." name="password" required>
                                        </div>
                                        <div class="form-group">
                                             <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                        </div>
                                        <!-- <div class="form-group d-md-flex">
                                             <div class="w-50 text-left">
                                                  <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                                       <input type="checkbox" checked>
                                                       <span class="checkmark"></span>
                                                  </label>
                                             </div>
                                             <div class="w-50 text-md-right">
                                                  <a href="#">Forgot Password</a>
                                             </div>
                                        </div>
                                   </form>
                                   <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p> #}
                                   -->
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <script src="/assets/script/login/jquery.min.js"></script>
     <script src="/assets/script/login/popper.js"></script>
     <script src="/assets/script/login/bootstrap.min.js"></script>
     <script src="/assets/script/login/main.js"></script>

</body>

</html>