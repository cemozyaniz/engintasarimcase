<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Makale Ekle
        </h4>
    </div>

    <div class="col-md-12">

        <div class="widget">

            <div class="widget-body">
                <form action="<?php echo base_url("articles/save");?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label>Konu Başlığı</label>
                        <select name="t_id" class="form-control">
                            <?php foreach ($topics as $topic) { ?>
                                <option value="<?php echo $topic->id; ?>"><?php echo $topic->title; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Yazarlar</label>
                        <select name="w_id" class="form-control">
                            <?php foreach ($writers as $writer) { ?>
                                <option value="<?php echo $writer->id; ?>"><?php echo $writer->title; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Makale Başlığı</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                        <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("title");?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Makale Yazısı</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Makale PDF</label>
                            <input type="file" name="file_url" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("articles");?>" class="btn btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>