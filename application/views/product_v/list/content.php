<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Products
			<a href="#" class="btn btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Ny</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)) { ?>
				<div class="alert alert-info text-center">
					<p>OPS! Jag hittar inte data! Vill du skapa en ny produkt? <a href="#">Klick</a></p>
				</div>
			<?php } else { ?>
			<table class="table table-hover table-striped">
				<thead>
					<th>#id</th>
					<th>url</th>
					<th>Produkt</th>
					<th>Beskrivning</th>
					<th>Status</th>
					<th> </th>
				</thead>
				<tbody>
					<?php foreach ($items as $item) { ?>
						<tr>
							<td><?php echo $item->id; ?></td>
							<td><?php echo $item->url; ?></td>
							<td><?php echo $item->title; ?></td>
							<td><?php echo $item->description; ?></td>
							<td>
								<input
									type="checkbox" 
									data-switchery data-color="#10c469" 
									<?php echo ($item->isActive) ? "checked" : "";?> 
								/>
							</td>
							<td>
								<a href="#" class="btn btn-sm btn-danger btn-outline"><i class="fa fa-trash"></i> Radera </a>
								<a href="#" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil"></i> Redigera </a>
							</td>
						<?php } ?>
					</tr>
				</tbody>
			</table>
		<?php } ?>
		</div>
	</div>
</div>