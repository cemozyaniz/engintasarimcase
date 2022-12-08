$(document).ready(function () {





    $(".sortable").sortable();

    $(".remove-btn").click(function () {
        $data_url = $(this).data("url");
        swal.fire({
            title: "Silmek istediğinize emin misiniz?",
            text: "Bu işlem kalıcıdır ve geri alınamaz!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet",
            cancelButtonText: "Hayır"
        }).then((result) => {
            if (result.value) {
                window.location.href = $data_url;
            }
        });
    });

    $(".content-conatiner, .image_list_conatiner").on('change','.isActive',function () {
        var $data = ($(this).prop("checked"));
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, {data: $data}, function (response) {

            });
        }
    });

    $(".image_list_conatiner").on('change','.isCover',function () {
        var $data = ($(this).prop("checked"));
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, {data: $data}, function (response) {
                $(".image_list_conatiner").html(response);

                $('[data-switchery]').each(function(){
                    var $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });
                $(".sortable").sortable();
            });
        }
    });

    $(".content-conatiner, .image_list_conatiner").on("sortupdate",".sortable",function (event,ui){

        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url,{data:$data},function (response){

        });

    });

    var uploadSection = Dropzone.forElement("#dropzone");

    uploadSection.on("complete", function (file){
       //console.log(file);

        var $data_url = $("#dropzone").data("url");

        $.post($data_url,{},function (response){
            $(".image_list_conatiner").html(response);

            $('[data-switchery]').each(function(){
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });
            $(".sortable").sortable();
        });
    });




});