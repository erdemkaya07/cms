<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("includes/head"); ?>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

    <!-- APP NAVBAR ==========-->

    <!--========== END app navbar -->
    <?php $this->load->view("includes/navbar"); ?>
    <!-- APP ASIDE ==========-->
    <?php $this->load->view("includes/aside"); ?>
    <!--========== END app aside -->

    <!-- navbar search -->
    <?php $this->load->view("includes/navbar-search"); ?>
    <!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
      <div class="wrap">
    	<section class="app-content">
    	   <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
    	</section><!-- #dash-content -->
    </div><!-- .wrap -->
      <!-- APP FOOTER -->
      <?php $this->load->view("includes/app-footer"); ?>
      <!-- /#app-footer -->
    </main>
    <!--========== END app main -->
    	<!-- SIDE PANEL -->
        <?php $this->load->view("includes/side-panel"); ?>
    	<!-- /#side-panel -->

<?php $this->load->view("includes/include_script"); ?>

</body>
</html>