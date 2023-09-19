
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StrikingDash</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="{{ asset('form_files/plugin.min.css') }}">

<link rel="stylesheet"  href="{{ asset('form_files/style.css') }}">

    <!-- endinject -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('form_files/favicon.png') }}">
</head>
<style>
    .background-div {
        width: 100%;
    background-image: url({{ asset('form_files/login-bg.jpg') }}); /* Arka plan resmi */
    background-repeat: no-repeat; /* Tekrar etmemesi için */
    background-position: right center; /* Sağa hizalama, dikey merkez hizalama */
    /* Diğer stil özellikleri */
    
}
.signUP-admin {
     background-color: inherit !important; 
}
</style>

<body>
    <main class="main-content background-div">

        <div class="signUP-admin" >
            <div class="container-fluid " >
                <div class="row justify-content-center">
                    <!-- <div class="col-xl-4 col-lg-5 col-md-5 p-0">
                        <div class="signUP-admin-left signIn-admin-left position-relative ">
                          
                        
                        </div>
                    </div> -->
                    <div class="col-xl-8 col-lg-7 col-md-7 col-sm-8">
                        <div class="signUp-admin-right signIn-admin-right  p-md-40 p-10">
                           
                            <div class="row justify-content-center">
                                <div class="col-xl-7 col-lg-8 col-md-12">
                                    <div class="edit-profile mt-md-25 mt-0" style=" opacity: 0.9;">
                                        <div class="card border-0">
                                            <div class="card-header border-0  pb-md-15 pb-10 pt-md-20 pt-10 ">
                                                <div class="edit-profile__title" style="
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                    ">
                                                    <img class="dark" style='max-width: 166px;' src="{{ asset('form_files/logo.jpg') }}" alt="svg">
                  
                                                </div>
                                            </div>
                                            <div class="card-body">
                                             <form method="POST" action="{{ route('genel.login') }}" enctype="multipart/form-data">
                                              @csrf <!-- Cross-Site Request Forgery (CSRF) koruması -->
                                                <div class="edit-profile__body">
                                                    <div class="form-group mb-20">
                                                        <label for="username">Kullanıcı Adı</label>
                                                        <input type="text" class="form-control" name="username" id="username" value="sinanbedir" placeholder="Kullanıcı adı giriniz.">
                                                    </div>
                                                    <div class="form-group mb-15">
                                                        <label for="password-field">Şifre</label>
                                                        <div class="position-relative">
                                                            <input id="password-field" type="password" class="form-control" name="password" value="12345678">
                                                            <div class="fa fa-fw fa-eye-slash text-light fs-16 field-icon toggle-password2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="signUp-condition signIn-condition">
                                                        <div class="checkbox-theme-default custom-checkbox ">
                                                            <!-- <input class="checkbox" type="checkbox" id="check-1"> -->
                                                            <label for="check-1">
                                                                <!-- <span class="checkbox-text">Keep me logged in</span> -->
                                                            </label>
                                                        </div>
                                                        <a href="forget-password.html">Şifremi Unuttum</a>
                                                    </div>
                                                    @if (Session::has('success'))
                                                        <div class="alert alert-success" >
                                                            {{ Session::get('success') }}
                                                        </div>
                                                    @endif

                                                    @if (Session::has('error'))
                                                        <div class="alert alert-danger">
                                                            {{ Session::get('error') }}
                                                        </div>
                                                    @endif
                                                    <div class="button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                        <button type="submit" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize lh-normal px-50 py-15 signIn-createBtn ">
                                                            Giriş
                                                        </button>
                                                    </div>
                                                    
                                                </div>
                                             </form>
                                            </div><!-- End: .card-body -->
                                        </div><!-- End: .card -->
                                    </div><!-- End: .edit-profile -->
                                </div><!-- End: .col-xl-5 -->
                            </div>
                        </div><!-- End: .signUp-admin-right  -->
                    </div><!-- End: .col-xl-8  -->
                </div>
            </div>
        </div><!-- End: .signUP-admin  -->

    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>

    <!-- inject:js-->

      <!-- inject:js-->
      <script src="{{ asset('form_files/plugins.min.js.download') }}"></script>
    <script src="{{ asset('form_files/script.min.js.download') }}"></script>
    
    <!-- endinject-->
</body>

</html>