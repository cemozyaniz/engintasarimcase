<?php if (empty($item_images)) { ?>

    <div class="alert alert-info text-center">
        <p>Burada herhangi bir fotoğraf bulunmamaktadır.</p>
    </div>
<?php } else { ?>
    <table class="table table-bordered table-striped table-hover picture_list">
        <thead>
        <th class="order"><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th>Görsel</th>
        <th>Dosya Adı</th>
        <th>Durumu</th>
        <th>Kapak</th>
        <th>İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("articles/imageRankSetter"); ?>">
        <?php foreach ($item_images
                       as $image) { ?>
            <tr id="ord-<?php echo $image->id; ?>">
                <td class="order text-center"><i class="fa fa-reorder"></i></td>
                <td class="w100 text-center">#<?php echo $image->id; ?></td>
                <td class="w100 text-center"><img width="50"
                                                  src="<?php echo get_picture($viewFolder,$image->img_url,"271x271") ;?>"
                                                  alt="<?php echo $image->img_url ?>" class="img-responsive"></td>
                <td><?php echo $image->img_url; ?></td>
                <td class="w100 text-center">
                    <input
                            data-url="<?php echo base_url("articles/imageIsActiveSetter/$image->id"); ?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            data-color="#10c469"
                        <?php echo ($image->isActive) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w100 text-center">
                    <input
                            data-url="<?php echo base_url("articles/isCoverSetter/$image->id/$image->article_id"); ?>"
                            class="isCover"
                            type="checkbox"
                            data-switchery
                            data-color="#ff5b5b"
                        <?php echo ($image->isCover) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w100 text-center">
                    <button data-url="<?php echo base_url("articles/imageDelete/$image->id/$image->article_id"); ?>"
                            class="btn btn-outline btn-sm btn-block btn-danger remove-btn"><i
                                class="fa fa-trash"></i>Sil
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>