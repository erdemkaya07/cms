<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Products
			<a href="<?php echo base_url("product/new_form");  ?>" class="btn btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Ny</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)) { ?>
				<div class="alert alert-info text-center">
					<p>OPS! Jag hittar inte data! Vill du skapa en ny produkt? <a href="<?php echo base_url("product/new_form");  ?>">Klick</a></p>
				</div>
			<?php } else { ?>
			<table class="table table-hover table-striped">
				<thead>
					<th>#id</th>
					<th>url</th>
					<th>Produkt</th>
					<th>Pris</th>
					<th>Beskrivning</th>
					<th>Status</th>
					<th></th>
				</thead>
				<tbody>
					<?php foreach ($items as $item) { ?>
						<tr>
							<td><?php echo $item->id; ?></td>
							<td><?php echo $item->url; ?></td>
							<td><?php echo $item->title; ?></td>
							<th><?php echo $item->pris; ?> SEK</th>
							<td><?php echo $item->description; ?></td>
							<td>
								 <input
								 		data-url="<?php echo base_url("product/isActiveSet/$item->id"); ?>"
								 		class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
							</td>
							<td>
								<button 
									data-url="<?php echo base_url("product/delete/$item->id"); ?>"
									class="btn btn-sm btn-danger btn-outline remove-btn">
									<i class="fa fa-trash"></i> Radera 
								</button>
								<a href="<?php echo base_url("product/updateForm/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil"></i> Redigera </a>
							</td>
						<?php } ?>
					</tr>
				</tbody>
			</table>
		<?php } ?>
		</div>
	</div>
</div>