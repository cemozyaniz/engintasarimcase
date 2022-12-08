<!DOCTYPE html>
<html lang="tr">

<?php $this->load->view("includes/head");?>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_style");?>

<body class="simple-page">
<!--============= start main area -->



<!-- APP MAIN ==========-->


            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

    <!-- .wrap -->


<!--========== END app main -->

<!-- SIDE PANEL -->

<?php $this->load->view("includes/include_script");?>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_script");?>

</body>
</html>