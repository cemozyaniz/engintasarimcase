<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yazar Ekle
        </h4>
    </div>

    <div class="col-md-12">

        <div class="widget">

            <div class="widget-body">
                <form action="<?php echo base_url("writers/save");?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Adı</label>
                        <input class="form-control" placeholder="Yazar Adı" name="title">
                        <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("title");?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Hakkında Yazısı</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="form-group image_upload_container">
                        <label>Profil Fotoğrafı</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("writers");?>" class="btn btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>