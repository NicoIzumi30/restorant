<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>

    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('auth/index') ?>" method="post">
                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                    <input type="email" name="email" class="form-control">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cb1">
                                                <label class="custom-control-label" for="cb1">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                <div class="text-center dont-have">Don't have an account yet? <a
                                        href="<?= base_url('auth/register') ?>">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/js/feather.min.js"></script>

    <script src="<?= base_url() ?>assets/js/script.js"></script>
</body>

</html>