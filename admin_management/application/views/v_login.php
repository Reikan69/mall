<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $GLOBALS['assets'] ?>img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $GLOBALS['assets'] ?>img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $GLOBALS['assets'] ?>img/favicon-16x16.png">
    <link rel="manifest" href="<?= $GLOBALS['assets'] ?>img/site.webmanifest">
    <link rel="mask-icon" href="<?= $GLOBALS['assets'] ?>img/safari-pinned-tab.svg" color="#5bbad5">
      
    <?php  
    include_once  'layout/header.php';
    ?>
   
  </head>

<body class="dark transition">
    <script>
      if (JSON.parse(localStorage.getItem('darkMode'))) {
        document.body.classList.add("dark");
        document.addEventListener("DOMContentLoaded", function() {
          document.querySelector('#switch-theme-input').checked = true;
        });
      }
    </script>


  <form action="<?= base_url('login/log_in'); ?>" method="post" class="form-horizontal form-label-left">
      <div>
      <div class="sign-up d-flex" style="width: 400px;margin: auto">
        <div class="sign-up-col sign-up-page min-vh-100 w-100">
          <div class="sign-up-body d-flex justify-content-center align-items-center h-100 py-8">
            <div class="sign-up-wrapper"><a class="logo d-block mb-6" href="index.html"><img class="logo-dark" src="<?= $GLOBALS['assets'] ?>img/logo-dark.png"><img class="logo-light" src="<?= $GLOBALS['assets'] ?>img/logo-light.png"></a>
              <div class="h2 mb-6">Sign in</div>
              <div class="sign-up-entry">
                <div class="text-semibold-2 mb-5">Sign up with Open account</div>
                <div class="row gx-2 d-flex flex-nowrap mb-6">
                  <button class="btn-stroke col mx-1">
                    <svg class="icon icon-google me-2"> 
                      <use xlink:href="#icon-google"></use>
                    </svg>Google
                  </button>
                  <button class="btn-stroke col mx-1">
                    <svg class="icon icon-apple me-2">  
                      <use xlink:href="#icon-apple"></use>
                    </svg>Apple ID
                  </button>
                </div>
                <div class="border-bottom border-2 mb-6"></div>
                <div class="text-semibold-2 mb-5">Or continue with email address</div>
                <div class="input-group mb-3">
                  <button class="input-group-text transparent">
                    <svg class="icon icon-mail">  
                      <use xlink:href="#icon-mail"></use>
                    </svg>
                  </button>
                  <input class="form-control rounded-2" type="text" placeholder="Username" name="username" required="required">
                </div>
                <div class="input-group mb-3">
                  <button class="input-group-text transparent">
                    <svg class="icon icon-lock">  
                      <use xlink:href="#icon-lock"></use>
                    </svg>
                  </button>
                  <input class="form-control rounded-2" type="password" placeholder="Password" name="password" required="required">
                </div>
                <input type="submit" name="submit" value="Sign In" class="btn w-100">
                <div class="text-semibold-2 text-shades-1 mt-6">This site is protected by reCAPTCHA and the Google Privacy Policy.</div>
                <div class="mt-6"> <span class="caption text-shades-1 pe-2">Don’t have an account?</span><a class="caption text-reset fw-bold" href="sign-up.html">Sign up</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
 <?php  
    include_once  'layout/modal.php';
    include_once  'layout/footer.php';
    include_once  'layout/symbols.php';
    ?>
    <script type="text/javascript"></script>
  </body>
</html>       