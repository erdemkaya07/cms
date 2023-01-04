<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			<?php echo "<b>$item->title</b> - Redigera Produkt" ?>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body">
				<form action="<?php echo base_url("product/update/$item->id"); ?>" method="post">
					<div class="form-group col-sm-6">
						<label>Produkt Namn</label>
						<input class="form-control" placeholder="ProduktNamn" name="title" value="<?php echo $item->title; ?>">
						<?php if(isset($form_error)) { ?>
							<small class="pull-right input-form-error"><?php echo form_error("title") ?></small>
						<?php } ?>
					</div>
					<div class="form-group col-sm-6">
						<label>Pris - SEK</label>
						<input class="form-control" placeholder="Pris - SEK" name="pris" value="<?php echo $item->pris; ?> SEK">
						<?php if(isset($form_error)) { ?>
							<small class="pull-right input-form-error"><?php echo form_error("pris") ?></</small>
						<?php } ?>
					</div>
					<div class="form-group">
						<label>Beskrivning</label>
						<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
					</div>
					<button type="submit" class="btn btn-primary btn-md btn-outline">Updatera</button>
					<a href="<?php echo base_url("product"); ?>" class="btn btn-md btn-reply btn-danger btn-outline">Product page</a>
				</form>
			</div>
		</div>
	</div>
</div>
