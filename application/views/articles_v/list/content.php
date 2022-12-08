<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            Makale Listesi
            <a href="<?php echo base_url("articles/add_new_form");?>" class="btn btn-outline btn-xs btn-primary pull-right"><i class="fa fa-plus"></i>Yeni Ekle</a>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) {?>

            <div class="alert alert-info text-center">
                <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("articles/add_new_form");?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
            <table class="table table-hover table-striped content-conatiner table-bordered">
                <thead>
                <th class="order w100"><i class="fa fa-reorder"></i></th>
                <th>#id</th>
                <th>Makale Başlığı</th>
                <th>Konu Başlığı</th>
                <th>Yazar</th>
                <th>Makale Yazısı</th>
                <th>url</th>
                <th>Durum</th>
                <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("articles/rankSetter");?>">
                <?php foreach ($items as $item) { ?>
                    <tr id="ord-<?php echo $item->id;?>" class="order">
                        <td><i class="fa fa-reorder"></i></td>
                        <td>#<?php echo $item->id?></td>
                        <td><?php echo $item->title?></td>
                        <td><?php echo get_topic($item->t_id)?></td>
                        <td><?php echo get_writer($item->w_id)?></td>
                        <td><?php echo $item->description?></td>
                        <td><?php echo $item->url?></td>
                        <td>
                            <input
                                    data-url="<?php echo base_url("articles/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                            />
                        </td>
                        <td>
                            <button data-url="<?php echo base_url("articles/delete/$item->id");?>" class="btn btn-outline btn-block btn-sm btn-danger remove-btn"><i class="fa fa-trash"></i>Sil</button>
                            <a href="<?php echo base_url("articles/update_form/$item->id");?>" class="btn btn-outline btn-block btn-sm btn-info"><i class="fa fa-pencil-square-o"></i>Düzenle</a>
                            <a href="<?php echo base_url("articles/image_form/$item->id");?>" class="btn btn-outline btn-block btn-sm btn-dark"><i class="fa fa-image"></i>Fotoğraflar</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>