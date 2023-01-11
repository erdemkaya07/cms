<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body">
				<form data-url="<?php echo base_url("product/refreshImageList/$item->id"); ?>" action="<?php echo base_url("product/imageUpload/$item->id"); ?>" id="dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/imageUpload/$item->id"); ?>'}">
					<div class="dz-message">
						<h3 class="m-h-lg">Drop files here or click to upload.</h3>
						<p class="m-b-lg text-muted">-</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo $item->title; ?> - Produkt bilder
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body image_list_container">
				<?php $this->load->view("{$viewFolder}/{$subViewFolder}/renderElements/image_list_v"); ?>
			</div>
		</div>
	</div>