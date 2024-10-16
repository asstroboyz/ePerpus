<?= $this->extend('front/templates/index') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block text-center mt-5 ml-3">
                        <figure><img src="<?php echo base_url() ?>/assets/img/polda.ico" alt="" width="80%" height="80%"></figure>
                    </div>
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
                            </div>

                            <?php if (session()->getFlashdata('msg-auth')) : ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('msg-auth'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('msg-failed')) : ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= session()->getFlashdata('msg-failed'); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= route_to('register') ?>" method="post" class="user">
                                <?= csrf_field() ?>

                                <div class="form-group">
                                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?> " id="exampleInputEmail" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control
                             <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?> " value="<?= old('email') ?>">
                                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="password"><?= lang('Auth.password') ?></label>
                                    <input type="password" name="password" class="form-control
                                 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                    <input type="password" name="pass_confirm" class="form-control
                                 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?>
                                </button>
                            </form>
                            <hr>
                            <?php if ($config->activeResetter) : ?>

                                <div class="text-center">
                                    <a class="small" href="<?= route_to('forgot') ?>">
                                        <?= lang('Auth.forgotYourPassword') ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if ($config->allowRegistration) : ?>
                                <div class="text-center">
                                    <?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>