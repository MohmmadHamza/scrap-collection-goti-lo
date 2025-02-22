<!DOCTYPE html>


<!-- =========================================================
* Vuexy - Bootstrap Admin Template | v2.0.0
==============================================================

* Product Page: https://1.envato.market/vuexy_admin
* Created by: Pixinvent
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright Pixinvent (https://pixinvent.com)

=========================================================
 -->
<!-- beautify ignore:start -->


<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Cover - Pages | Zoilo Admin</title>

    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/letter-z.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    
    <link rel="stylesheet" href="assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />
    
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
<link rel="stylesheet" href="assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">


    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    
    
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    
  </head>

  <body>

    
    <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <!-- Logo -->
  <a href="index.html" class="app-brand auth-cover-brand">
    <img src="/assets/img/zoilologo.png" alt="">
    
  </a>
  <!-- /Logo -->
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-8 p-0">
      <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
        <img src="assets/img/illustrations/auth-login-illustration-light.png" alt="auth-login-cover" class="my-5 auth-illustration" data-app-light-img="illustrations/auth-login-illustration-light.png" data-app-dark-img="illustrations/auth-login-illustration-dark.png">

        <img src="assets/img/illustrations/bg-shape-image-light.png" alt="auth-login-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
      <div class="w-px-400 mx-auto mt-12 pt-5">
        <h4 class="mb-1">Welcome to Zoilo! 👋</h4>
        <p class="mb-6">Please sign-in to your account and start the adventure</p>

        <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Email or Username -->
            <div class="mb-6">
                <label for="email" class="form-label">Email or Username</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        
            <!-- Password -->
            <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required autocomplete="current-password" aria-describedby="password">
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        
            <!-- Remember Me and Forgot Password -->
            <div class="my-8">
                <div class="d-flex justify-content-between">
                    <div class="form-check mb-0 ms-2">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">
                            Remember Me
                        </label>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            <p class="mb-0">Forgot Password?</p>
                        </a> @endif
                </div>
            </div>
        
            <!-- Submit Button -->
            <button class="btn btn-primary d-grid w-100">
                Sign in
            </button>
        </form>
        

        <p class="text-center">
          <span>New on our platform?</span>
          <a href="{{ route('register') }}">
            <span>Create an account</span>
          </a>
        </p>
        <div class="divider my-6">
            <div class="divider-text">or</div>
          </div>

          <div class="d-flex justify-content-center">
            <a href="{{ url('auth/facebook') }}"  class="btn btn-sm btn-icon rounded-pill btn-text-facebook me-1_5 waves-effect waves-light">
              <i class="tf-icons ti ti-brand-facebook-filled"></i>
            </a>
  
            <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-twitter me-1_5 waves-effect waves-light">
              <i class="tf-icons ti ti-brand-twitter-filled"></i>
            </a>
  
            <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-github me-1_5 waves-effect waves-light">
              <i class="tf-icons ti ti-brand-github-filled"></i>
            </a>
  
            <a href="{{ url('auth/google') }}" class="btn btn-sm btn-icon rounded-pill btn-text-google-plus waves-effect waves-light">
                <i class="tf-icons ti ti-brand-google-filled"></i>
            </a>
            
          </div>
       
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>

<!-- / Content -->

   
    

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
      <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/@form-validation/popular.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script>
        "use strict";
        const formAuthentication = document.querySelector("#formAuthentication");
        document.addEventListener("DOMContentLoaded", function(e) {
            var t;
            formAuthentication && FormValidation.formValidation(formAuthentication, {
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Please enter username"
                            },
                            stringLength: {
                                min: 6,
                                message: "Username must be more than 6 characters"
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Please enter your email"
                            },
                            emailAddress: {
                                message: "Please enter valid email address"
                            }
                        }
                    },
                    "email-username": {
                        validators: {
                            notEmpty: {
                                message: "Please enter email / username"
                            },
                            stringLength: {
                                min: 6,
                                message: "Username must be more than 6 characters"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Please enter your password"
                            },
                            stringLength: {
                                min: 8,
                                message: "Password must be more than 8 characters"
                            }
                        }
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "Please confirm password"
                            },
                            identical: {
                                compare: function() {
                                    return formAuthentication.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            },
                            stringLength: {
                                min: 6,
                                message: "Password must be more than 6 characters"
                            }
                        }
                    },
                    terms: {
                        validators: {
                            notEmpty: {
                                message: "Please agree terms & conditions"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".mb-6"
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton,
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit,
                    autoFocus: new FormValidation.plugins.AutoFocus
                },
                init: e => {
                    e.on("plugins.message.placed", function(e) {
                        e.element.parentElement.classList.contains("input-group") && e.element
                            .parentElement.insertAdjacentElement("afterend", e.messageElement)
                    })
                }
            }), (t = document.querySelectorAll(".numeral-mask")).length && t.forEach(e => {
                new Cleave(e, {
                    numeral: !0
                })
            })
        });
    </script>
    
  </body>

</html>

<!-- beautify ignore:end -->
