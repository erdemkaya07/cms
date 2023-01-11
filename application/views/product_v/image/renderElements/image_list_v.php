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
			<th>Huvud Bild</th>
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
						data-url="<?php echo base_url("product/imageIsActiveSet/$image->id"); ?>"
						class="isActive"
						type="checkbox"
						data-switchery
						data-color="#10c469"
						<?php echo ($image->isActive) ? "checked" : ""; ?>
						/>
					</td>
					<td>
						<input
						data-url="<?php echo base_url("product/isCoverSet/$image->id/$image->product_id"); ?>"
						class="isCover"
						type="checkbox"
						data-switchery
						data-color="#ff5b5b"
						<?php echo ($image->isCover) ? "checked" : ""; ?>
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