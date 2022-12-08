<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="<?php echo base_url();?>">
            <span><img src="<?php echo base_url("uploads/settings_v/{$logo}")?>"></span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="reset-password-form">
        <h4 class="form-title m-b-xl text-center">Şifrenizi mi unuttunuz ? ?</h4>

        <form action="<?php echo base_url("reset-password");?>" method="post">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="E-Posta Adresi" name="email"
                       value="<?php isset($form_error) ? set_value("email") : "";?>">
                <?php if (isset($form_error)) { ?>
                    <small class="input-form-error pull-right"><?php echo form_error("email"); ?></small>
                <?php } ?>
            </div>
            <button class="btn btn-primary">Şifremi Sıfırla</button>
        </form>
    </div><!-- #reset-password-form -->

</div><!-- .simple-page-wrap -->




