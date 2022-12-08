$(document).ready(function (){

   $(".news_type_select").change(function (){

      if ($(this).val() === "image"){
          $(".image_upload_container").fadeIn();
          $(".video_url_container").hide();
      }else if($(this).val() === "video"){
          $(".image_upload_container").hide();
          $(".video_url_container").fadeIn();
      }
   });

});