<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Skapa sida
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body">
				<form action="<?php echo base_url("sidor/save"); ?>" method="post">
					<div class="form-group">
						<label>Sida Namn</label>
						<input class="form-control" placeholder="Sida Namn" name="title">
						<?php if(isset($form_error)) { ?>
							<small class="pull-right input-form-error"><?php echo form_error("title") ?></small>
						<?php } ?>
					</div>
					<div class="form-group">
						<label>Beskrivning</label>
						<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">Ange något</textarea>
					</div>
					<div class="form-group">
						<label for="control-demo-6" class="" >Select Media</label>
						<div id="control-demo-6" class="">
							<select class="form-control sidor_type_select" name="sidor_types">
								<option value="image">Image</option>
								<option value="video">Video</option>
							</select>
						</div>
					</div>
					<div class="form-group image_upload_container">
						<label>File input</label>
						<input type="file" name="image_url"class="form-control">
					</div>
					<div class="form-group video_url_container">
						<label>Video URL</label>
						<input class="form-control" placeholder="Video URL" name="video_url">
						<?php if(isset($form_error)) { ?>
							<small class="pull-right input-form-error"><?php echo form_error("video_url") ?></small>
						<?php } ?>
					</div>

					<button type="submit" class="btn btn-primary btn-md btn-outline">Spara</button>
					<a href="<?php echo base_url("sidor"); ?>" class="btn btn-md btn-reply btn-danger btn-outline">sidor page</a>
				</form>
			</div>
		</div>
	</div>
</div>