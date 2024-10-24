<?= $this->extend('Auth/Templates/Index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"> e-Posyandu <br>
                                    </h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form
                                    action="<?= url_to('login') ?>"
                                    class="user" method="post">
                                    <?= csrf_field() ?>

                                    <?php if ($config->validFields === ['email']) : ?>
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                name="login"
                                                placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                name="login"
                                                placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            name="password"
                                            placeholder="<?= lang('Auth.password') ?>">
                                    </div>
                                    <?php if ($config->allowRemembering) : ?>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remembering"
                                                    <?php if (old('remember')) : ?>
                                                    checked <?php endif ?>>
                                                <label class="custom-control-label"
                                                    for="customCheck"><?= lang('Auth.rememberMe') ?></label>
                                            </div>
                                        </div>
                                    <?php endif; ?>



                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <?= lang('Auth.loginAction') ?>
                                    </button>
                                    <hr>
                                </form>

                                <?php if ($config->activeResetter) : ?>
                                    <div class="text-center">
                                        <a class="small"
                                            href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($config->allowRegistration) : ?>
                                    <div class="text-center">
                                        <a class="small"
                                            href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                                        <a class="small"
                                            href="<?= base_url('Auth/reset'); ?>">reset
                                            password</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
   


</div>
<div id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto" style="position: fixed; bottom: 0; left: 0; right: 0; background-color: #f8f9fa; padding: 10px 0; border-top: 1px solid #e3e6f0; width: 100%;">
        <div class="container-fluid" style="display: flex; justify-content: center; align-items: center; padding: 0 15px;">
            <div class="text-muted" style="color: #6c757d; font-size: 14px; text-align: center;">
                Copyright &copy; SMPN 6 BATANG 2024
            </div>
        </div>
    </footer>
</div>

<?= $this->endSection(); ?>