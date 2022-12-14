<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            Konu Başlığı Ekle
        </h4>
    </div>

    <div class="col-md-12">

        <div class="widget">

            <div class="widget-body">
                <form action="<?php echo base_url("topics/save");?>" method="post">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                        <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("title");?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("topics");?>" class="btn btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>