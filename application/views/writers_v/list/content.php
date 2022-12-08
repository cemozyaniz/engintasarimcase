<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yazar Listesi
            <a href="<?php echo base_url("writers/add_new_form"); ?>"
               class="btn btn-outline btn-xs btn-primary pull-right"><i class="fa fa-plus"></i>Yeni Ekle</a>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a
                                href="<?php echo base_url("writers/add_new_form"); ?>">tıklayınız</a></p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped content-conatiner table-bordered">
                    <thead>
                    <th class="order w100"><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Başlık</th>
                    <th>url</th>
                    <th>Görsel</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("writers/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id; ?>" class="order">
                            <td><i class="fa fa-reorder"></i></td>
                            <td>#<?php echo $item->id ?></td>
                            <td><?php echo $item->title ?></td>
                            <td><?php echo $item->url ?></td>
                            <td>
                                <img class="img-responsive" style="width: 100px"
                                     src="<?php echo get_picture($viewFolder,$item->img_url,"200x100"); ?>"
                            </td>
                            <td>
                                <input
                                        data-url="<?php echo base_url("writers/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                                />
                            </td>
                            <td>
                                <button data-url="<?php echo base_url("writers/delete/$item->id"); ?>"
                                        class="btn btn-outline btn-block btn-sm btn-danger remove-btn"><i
                                            class="fa fa-trash"></i>Sil
                                </button>
                                <a href="<?php echo base_url("writers/update_form/$item->id"); ?>"
                                   class="btn btn-outline btn-block btn-sm btn-info"><i
                                            class="fa fa-pencil-square-o"></i>Düzenle</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>