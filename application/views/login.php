<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login E-Arsip</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/vendor/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- css tambahan -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">

    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <?= $this->session->flashdata('info'); ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di<br>
                                            <center class="font-weight-bold">E-Arsip</center>
                                        </h1>
                                    </div>
                                    <?= form_open(base_url('auth/getlogin')) ?>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required oninvalid="this.setCustomValidity('Input Usernamenya Sayang')" oninput="setCustomValidity('')" autofocus>
                                    </div>

                                    <div class="form-group">

                                        <input id="password-field" type="password" name="password" class="form-control form-control-user" placeholder="Password" required oninvalid="this.setCustomValidity('Input Passwordnya Sayang')" oninput="setCustomValidity('')" value="">
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="form-control btn-primary form-control-user">Login</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
 
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/js/sb-admin-2.min.js"></script>

</body>

</html>