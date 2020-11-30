<!DOCTYPE html>
<!-- saved from url=(0024)https://movie.ge/sign_in -->
<html lang="en">
<head>
    <title>ავტორიზაცია - Movie.Ge</title>
    <link rel="stylesheet" href="./ავტორიზაცია - Movie.Ge_files/swiper.min.css">
    <link rel="stylesheet" href="./ავტორიზაცია - Movie.Ge_files/fonts.min.css">
    <link rel="stylesheet" href="./ავტორიზაცია - Movie.Ge_files/fontawesome.min.css">
    <link rel="stylesheet" href="./ავტორიზაცია - Movie.Ge_files/styles.css">
</head>
<body class="body p-0 sign_body" style="background: #0e0e0e url(https://movie.ge/theme/img/authorization-cover.png); background-size: cover; background-repeat: no-repeat;">
      <div class="overlay authrozation-overlay" style="position: fixed;"></div>
      <!-- ავტორიზაცია -->
      <div class="container-fluid authorization mr-0 p-0">
         <div class="row authorization-container no-gutters">
            <div class="col-lg-10 col-12 h-100 position-relative d-flex">
               <div class="d-flex flex-column align-items-end position-absolute top right w-100 h-100">
                  <ul class="nav nav-tabs float-right mt-4 d-none d-md-flex">
                     <li class="nav-item">
                        <a class="nav-link arial" href="{{ route('movies') }}" title="ფილმები">ფილმები</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link arial" href="{{ route('serial') }}" title="სერიალები">სერიალები</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link arial" href="{{ route('collections') }}" title="კოლექციები">კოლექციები</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link arial" href="{{ route('actors') }}" title="მსახიობები">მსახიობები</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link arial" href="{{ route('trilers') }}" title="თრეილერები">თრეილერები</a>
                     </li>
                  </ul>
                  <div class="flex-grow-1"></div>
                  

                  <div class="authorization-popup flex-column rounded-10 d-none d-md-flex">
                    <div class="d-flex">
                        <h1 class="font-size-20 arial text-gray pt-2">ავტორიზაცია</h1>
                        <div class="flex-grow-1"></div>
                    </div>
                    <form class="mt-5 d-flex flex-column" action="{{ route('login') }}" method="POST">
                        @csrf
                    <input id="email" class="{{ $errors->has('email') ? ' has-error' : '' }}authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="ელ. ფოსტა" value="{{ old('email') }}" type="email" name="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>                        
                        </span>
                    @endif
                    <input id="password" class="{{ $errors->has('password') ? ' has-error' : '' }}authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="პაროლი" type="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>                        
                        </span>
                    @endif
                    
                    <div class="d-flex align-items-center mb-5">
                        <label class="remember-btn m-0 py-2 overflow-hidden d-flex align-items-center" for="rememberChkBox" title="დამახსოვრება">
                            <input class="filter-radio" type="checkbox" id="rememberChkBox" value="დამახსოვრება">
                            <div class="filter-custom-radio float-left mr-3"></div>
                            <div class="text-gray arial font-size-14 float-left">დამახსოვრება</div>
                        </label>

                        <div class="flex-grow-1"></div>
                        <a href="{{ route('password.request') }}" class="reset-btn btn text-gray font-size-14 arial" title="პაროლის აღდგენა">პაროლის აღდგენა</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{ route('register') }}" class="register-btn btn rounded-10 arial font-size-14 text-gray mr-3" title="რეგისტრაცია">რეგისტრაცია</a>

                        <button class="login-btn btn btn-primary rounded-38 arial font-size-14 text-main" onclick="lsRememberMe()" title="შესვლა" type="submit">შესვლა</button>
                    </div>
                </form>
            </div>
                  
                  
                  <div class="flex-grow-1"></div>
                  
               </div>
            </div>
            <div class="col-lg-2 h-100 d-none d-lg-flex"></div>
         </div>
      </div>
      
      <!-- ფუტერი -->
      <div class="container-fluid authorization mr-0 p-0 d-none d-md-block">
         <footer class="footer d-flex align-items-center" style="position: relative;">
            <div class="container d-flex align-items-center">
               <div class="arial font-size-14 text-main order-3 order-sm-1">2017-2020 © ყველა უფლება დაცულია.</div>
               <div class="flex-grow-1 order-2"></div>
               <ul class="nav nav-tabs order-1 order-sm-3">
                  <li class="nav-item">
                     <a class="nav-link arial font-size-14-imp" href="https://movie.ge/" title="მთავარი">მთავარი</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link arial font-size-14-imp" href="https://movie.ge/sign_in#" title="რეკლამა">რეკლამა</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link arial font-size-14-imp" href="https://movie.ge/sign_in#" title="კონტაქტი">კონტაქტი</a>
                  </li>
               </ul>
            </div>
         </footer>
      </div>
      <!-- /ფუტერი -->
   
   <script>
      if( window.innerWidth > 790 ){
          const rmCheck = document.getElementById("rememberChkBox"),
              emailInput = document.getElementById("regEmail");
              passwordInput = document.getElementById("regPass");
      
          if (localStorage.checkbox && localStorage.checkbox !== "") {
            rmCheck.setAttribute("checked", "checked");
            emailInput.value = localStorage.username;
            passwordInput.value = localStorage.password;
          } else {
            rmCheck.removeAttribute("checked");
            emailInput.value = "";
            passwordInput.value = "";
          }
      
      
          function lsRememberMe() {
            if (rmCheck.checked && emailInput.value !== "") {
              localStorage.username = emailInput.value;
              localStorage.password = passwordInput.value;
              localStorage.checkbox = rmCheck.value;
            } else {
              localStorage.username = "";
              localStorage.password = "";
              localStorage.checkbox = "";
            }
          }    
      }else{
              const rmCheck = document.getElementById("rememberChkBoxMob"),
                  emailInput = document.getElementById("regEmailMOB");
                  passwordInput = document.getElementById("regPassMOB");
      
              if (localStorage.checkbox && localStorage.checkbox !== "") {
                rmCheck.setAttribute("checked", "checked");
                emailInput.value = localStorage.username;
                passwordInput.value = localStorage.password;
              } else {
                rmCheck.removeAttribute("checked");
                emailInput.value = "";
                passwordInput.value = "";
              }
      
      
              function lsRememberMe() {
                if (rmCheck.checked && emailInput.value !== "") {
                  localStorage.username = emailInput.value;
                  localStorage.password = passwordInput.value;
                  localStorage.checkbox = rmCheck.value;
                } else {
                  localStorage.username = "";
                  localStorage.password = "";
                  localStorage.checkbox = "";
                }
              }
      }
      
   </script>
</body></html>