<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body">
				<form action="<?php echo base_url("product/imageUpload/$item->id"); ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/imageUpload/$item->id"); ?>'}">
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
			<div class="widget-body">
				<div class="widget p-lg">
					<?php if(empty($item_images)) { ?>
						<div class="alert alert-info text-center">
							<p>OPS! Jag hittar inte bild!</p>
						</div>
					<?php } else { ?>
						<table class="table table-hover table-striped pictures_list">
							<thead>
								<th>ID</th>
								<th>Bilder</th>
								<th>Bildnamn</th>
								<th>Status</th>
								<th></th>
							</thead>
							<tbody>
								<?php foreach($item_images as $image) { ?>
									<tr>
										<td class="w50 text-center"><?php echo $image->id; ?></td>
										<td class="w100 text-center">
											<img width="50" src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>" alt="<?php echo $image->img_url; ?>" class="img-responsive">
										</td>
										<td><?php echo $image->img_url; ?></td>
										<td>
											<input
											data-url="<?php echo base_url("product/isActiveSet/"); ?>"
											class="isActive"
											type="checkbox"
											data-switchery
											data-color="#10c469"
											<?php echo ($image->id) ? "checked" : ""; ?>
											/>
										</td>
										<td class="w100 text-center">
											<button 
											data-url="<?php echo base_url("product/delete/"); ?>"
											class="btn btn-sm btn-danger btn-outline remove-btn">
											<i class="fa fa-trash"></i> Radera 
										</button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>
		</div>
	</div>
</div>