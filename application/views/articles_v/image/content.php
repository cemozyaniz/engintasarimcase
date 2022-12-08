<div class="row">


    <div class="col-md-12">

        <div class="widget">

            <div class="widget-body">
                <form action="<?php echo base_url("articles/image_upload/$item->id"); ?>" class="dropzone"
                      data-url="<?php echo base_url("articles/refresh_image_list/$item->id");?>"
                      id="dropzone"
                      data-plugin="dropzone"
                      data-options="{ url: '<?php echo base_url("articles/image_upload/$item->id"); ?>'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Fotoğrafları yüklemek için sürükleyin veya tıklayın.</h3>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>

<div class="row">

    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo $item->title; ?>
        </h4>
    </div>

    <div class="col-md-12">

        <div class="widget">

            <div class="widget-body image_list_conatiner">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/image_list_v");?>
            </div><!-- .widget-body -->
        </div>

    </div>
</div>