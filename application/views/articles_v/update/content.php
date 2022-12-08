

<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo"<b> $item->title </b> " . " kaydını düzenliyorsunuz";?>
    </div>

    <div class="col-md-12">

        <div class="widget">

            <div class="widget-body">
                <form action="<?php echo base_url("articles/update/$item->id");?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label>Konu Başlığı</label>
                        <select name="t_id" class="form-control">
                            <?php foreach ($topics as $topic) { ?>
                                <?php isset($form_error) ? set_value("t_id") : $item->t_id; ?>
                                <option
                                    <?php echo ($topic->id == $item->t_id) ? "selected" : ""; ?>
                                        value="<?php echo $topic->id; ?>"><?php echo $topic->title; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("t_id"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Yazarlar</label>
                        <select name="w_id" class="form-control">
                            <?php foreach ($writers as $writer) { ?>
                                <?php isset($form_error) ? set_value("w_id") : $item->w_id; ?>
                                <option
                                    <?php echo ($writer->id == $item->w_id) ? "selected" : ""; ?>
                                        value="<?php echo $writer->id; ?>"><?php echo $writer->title; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("t_id"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Makale Başlığı</label>
                        <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title;?>">
                        <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("title");?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Makale Yazısı</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description;?></textarea>
                    </div>
                    <div class="row mx-0 px-0">
                        <?php if (!empty($item->file_url)) { ?>
                        <div class="col-md-3 form-group">
                            <a href="<?php echo get_article_pdf($item->id); ?>" download>
                            Makaleyi İndir
                        </a>
                        </div>
                        <?php } ?>
                        <div class="form-group col-md-12">
                            <label>Makale PDF</label>
                            <input type="file" name="file_url" class="form-control">
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("articles");?>" class="btn btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>