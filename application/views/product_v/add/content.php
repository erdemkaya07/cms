<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Skapa produkt
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body">
				<form action="<?php echo base_url("product/save"); ?>" method="post">
					<div class="form-group">
						<label>Produkt Namn</label>
						<input class="form-control" placeholder="ProduktNamn" name="title">
						<?php if(isset($form_error)) { ?>
							<small class="pull-right input-form-error"><?php echo form_error("title") ?></small>
						<?php } ?>
					</div>
					<div class="form-group">
						<label>Beskrivning</label>
						<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">Ange något</textarea>
					</div>
					<button type="submit" class="btn btn-primary btn-md btn-outline">Spara produkt</button>
					<a href="<?php echo base_url("product"); ?>" class="btn btn-md btn-reply btn-danger btn-outline">Product page</a>
				</form>
			</div>
		</div>
	</div>
</div>