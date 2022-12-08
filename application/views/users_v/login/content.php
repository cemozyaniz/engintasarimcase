<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="<?php echo base_url();?>">
            <span><img src="<?php echo base_url("uploads/settings_v/{$logo}")?>"></span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-xl text-center">Kullanıcı Bilgilerinizle Giriş Yapın</h4>
        <form action="<?php echo base_url("userop/do_login");?>" method="post">
            <div class="form-group">
                <input id="sign-in-email" name="user_email" type="email" class="form-control" placeholder="Email">
                <?php if (isset($form_error)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("user_email"); ?></small>
                <?php } ?>
            </div>

            <div class="form-group">
                <input id="sign-in-password" type="password" name="user_password" class="form-control" placeholder="Şifre">
                <?php if (isset($form_error)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("user_password"); ?></small>
                <?php } ?>
            </div>

            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div><!-- #login-form -->

    <div class="simple-page-footer">
        <p><a href="<?php echo base_url("sifremi-unuttum");?>">Şifremi Unuttum</a></p>
    </div><!-- .simple-page-footer -->


</div>