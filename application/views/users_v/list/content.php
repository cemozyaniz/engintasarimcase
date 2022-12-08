<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            Kullanıcı Listesi
            <a href="<?php echo base_url("users/add_new_form");?>" class="btn btn-outline btn-xs btn-primary pull-right"><i class="fa fa-plus"></i>Yeni Ekle</a>
        </h4>
    </div>

    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) {?>

            <div class="alert alert-info text-center">
                <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("users/add_new_form");?>">tıklayınız</a></p>
            </div>
            <?php } else { ?>
            <table class="table table-hover table-striped content-conatiner table-bordered">
                <thead>
                <th>#id</th>
                <th>Kullanıcı Adı</th>
                <th>Ad Soyad</th>
                <th>E-posta</th>
                <th>Durum</th>
                <th>İşlem</th>
                </thead>
                <tbody class="" data-url="<?php echo base_url("users/rankSetter");?>">
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td>#<?php echo $item->id?></td>
                        <td><?php echo $item->user_name?></td>
                        <td><?php echo $item->full_name?></td>
                        <td><?php echo $item->email?></td>
                        <td>
                            <input
                                    data-url="<?php echo base_url("users/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox"
                                    data-switchery
                                    data-color="#10c469"
                                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                            />
                        </td>
                        <td>
                            <button data-url="<?php echo base_url("users/delete/$item->id");?>" class="btn btn-outline btn-block btn-sm btn-danger remove-btn"><i class="fa fa-trash"></i>Sil</button>
                            <a href="<?php echo base_url("users/update_form/$item->id");?>" class="btn btn-outline btn-block btn-sm btn-info"><i class="fa fa-pencil-square-o"></i>Düzenle</a>
                            <a href="<?php echo base_url("users/update_password_form/$item->id");?>" class="btn btn-outline btn-block btn-sm btn-dark"><i class="fa fa-key"></i>Şifre Değiştir</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div>
</div>