<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Register</title>

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
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <form action="<?= base_url('auth/register') ?>" method="post">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input class="form-control" name="name" type="text">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                    <input class="form-control" name="email" type="text">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input class="form-control" name="password1" type="text">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Confirm Password</label>
                                    <input class="form-control" name="password2" type="text">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-lg btn-block btn-primary w-100"
                                        type="submit">Register</button>
                                </div>
                            </form>

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            <div class="text-center dont-have">Already have an account? <a
                                    href="<?= base_url('auth') ?>">Login</a>
                            </div>
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