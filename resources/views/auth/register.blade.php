<!DOCTYPE html>
<!-- saved from url=(0024)https://movie.ge/sign_in -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>რეგისტრაცია - Movie.Ge</title>
    <link rel="stylesheet" href="./რეგისტრაცია - Movie.Ge_files/swiper.min.css">
    <link rel="stylesheet" href="./რეგისტრაცია - Movie.Ge_files/fonts.min.css">
    <link rel="stylesheet" href="./რეგისტრაცია - Movie.Ge_files/fontawesome.min.css">
    <link rel="stylesheet" href="./რეგისტრაცია - Movie.Ge_files/styles.css">
   </head>
<body class="body p-0 sign_body" style="background: #0e0e0e url(https://movie.ge/theme/img/authorization-cover.png);  background-size: cover; background-repeat: no-repeat;">
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
                        <h1 class="font-size-20 arial-caps text-gray">რეგისტრაცია</h1>
                        <form class="mt-4 d-flex flex-column" action="{{ route('register') }}" method="POST">
                            @csrf

                            <input id="nickname" class="@error('nickname') is-invalid @enderror authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="მეტსახელი" value="{{ old('nickname') }}" name="nickname">
                            @error('nickname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="name" class="@error('name') is-invalid @enderror authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="სახელი" value="{{ old('name') }}" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="surname" class="@error('surname') is-invalid @enderror authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="გვარი" value="{{ old('surname') }}" name="surname">
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <select name="sex" class="@error('sex') is-invalid @enderror authorization-input mb-3 font-size-14 arial text-gray rounded-10">
                               <option value="0" selected="">აირჩიე სქესი</option>
                               <option value="მამრობითი">მამრობითი</option>
                               <option value="მდედრობითი">მდედრობითი</option>
                            </select>
                            @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <input type="file" id="user_img" name="user_img" class="authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid">

                            <input id="email" class="@error('email') is-invalid @enderror authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="ელ. ფოსტა" value="{{ old('email') }}" type="email" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password" class="authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="პაროლი" type="password" name="password">
                           
                            <input id="password-confirm" class="authorization-input mb-3 font-size-14 arial text-gray rounded-10 is-valid" placeholder="გაიმეორე პაროლი" type="password" name="password_confirmation">

                            <div class="d-flex align-items-center justify-content-end mt-5">
                               <a href="{{ route('login') }}" class="log-btn btn rounded-10 arial font-size-14 text-gray mr-3" title="ავტორიზაცია">ავტორიზაცია</a>

                               <button class="reg-btn btn btn-primary rounded-38 arial font-size-14 text-main" title="რეგისტრაცია" type="submit" name="signup" value="signup">რეგისტრაცია</button>
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