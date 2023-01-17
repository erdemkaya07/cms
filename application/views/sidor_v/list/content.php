<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Sidor
			<a href="<?php echo base_url("sidor/new_form");  ?>" class="btn btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Ny</a>
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<?php if(empty($items)) { ?>
				<div class="alert alert-info text-center">
					<p>OPS! Jag hittar inte data! Vill du skapa en ny sida? <a href="<?php echo base_url("sidor/new_form");  ?>">Klick</a></p>
				</div>
			<?php } else { ?>
				<table class="table table-hover table-striped content-container">
					<thead>
						<th><i class="fa fa-reorder"></i></th>
						<th>ID</th>
						<th>Rubrik</th>
						<th>url</th>
						<th>Status</th>
						<th></th>
					</thead>
					<tbody class="sortable" data-url="<?php echo base_url("sidor/rankSet"); ?>">
						<?php foreach ($items as $item) { ?>
							<tr id="ord-<?php echo $item->id;  ?>">
								<td class="w50 text-center"><i class="fa fa-reorder"></td>
									<td class="w50 text-center"><?php echo $item->id; ?></td>
									<td class="w50 text-center"><?php echo $item->title; ?></td>
									<td class="w50 text-center"><?php echo $item->url; ?></td>
									<td class="w50 text-center">
										<input
										data-url="<?php echo base_url("sidor/isActiveSet/$item->id"); ?>"
										class="isActive"
										type="checkbox"
										data-switchery
										data-color="#10c469"
										<?php echo ($item->isActive) ? "checked" : ""; ?>
										/>
									</td>
									<td class="w50 text-center">
										<button 
										data-url="<?php echo base_url("sidor/delete/$item->id"); ?>"
										class="btn btn-sm btn-danger btn-outline remove-btn">
										<i class="fa fa-trash"></i> Radera 
									</button>
									<a href="<?php echo base_url("sidor/updateForm/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil"></i> Redigera </a>
								</td>
							<?php } ?>
						</tr>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>
</div>