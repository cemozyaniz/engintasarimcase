<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            E-Posta Hesabı Ekle
        </h4>
    </div>

    <div class="col-md-12">

        <div class="widget">

            <div class="widget-body">
                <form action="<?php echo base_url("emailsettings/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Protokol</label>
                        <input class="form-control" placeholder="Protokol" name="protocol"
                               value="<?php echo isset($form_error) ? set_value("protocol") : "";?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("protocol"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>E-Posta Sunucu Bilgisi</label>
                        <input class="form-control" placeholder="Host" name="host"
                               value="<?php echo isset($form_error) ? set_value("host") : "";?>" >
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("host"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Port Numarası</label>
                        <input type="text" class="form-control" placeholder="Port" name="port"
                               value="<?php echo isset($form_error) ? set_value("port") : "";?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("port"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Adresi</label>
                        <input type="email" class="form-control" placeholder="User" name="user"
                               value="<?php echo isset($form_error) ? set_value("user") : "";?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("user"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="password" class="form-control" placeholder="Şifre" name="password">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kimden</label>
                        <input type="email" class="form-control" placeholder="From" name="from"
                               value="<?php echo isset($form_error) ? set_value("from") : "";?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("from"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Kime Gidecek</label>
                        <input type="email" class="form-control" placeholder="To" name="to"
                               value="<?php echo isset($form_error) ? set_value("to") : "";?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("to"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Posta Başlık</label>
                        <input type="text" class="form-control" placeholder="E-Posta Başlık" name="user_name"
                               value="<?php echo isset($form_error) ? set_value("user_name") : "";?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("emailsettings"); ?>" class="btn btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>