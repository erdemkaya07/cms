<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Produkt bilder
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body">
				<form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
					<div class="dz-message">
						<h3 class="m-h-lg">Drop files here or click to upload.</h3>
						<p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">
			Produkt bilder
		</h4>
	</div>
	<div class="col-md-12">
		<div class="widget">
			<hr class="widget-separator">
			<div class="widget-body">
				<table class="table table-hover table-striped">
					<thead>
						<th>ID</th>
						<th>Bilder</th>
						<th>Bildnamn</th>
						<th>Status</th>
						<th></th>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td>
								<img width="50" src="https://upload.wikimedia.org/wikipedia/en/thumb/3/39/Fenerbah%C3%A7e.svg/1200px-Fenerbah%C3%A7e.svg.png"  class="img-responsive">
							</td>
							<td></td>
							<td>
								<input
								 		data-url="<?php echo base_url("product/isActiveSet/"); ?>"
								 		class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#10c469"
                                        <?php echo (true) ? "checked" : ""; ?>
                                    />
							</td>
							<td>
								<button 
								data-url="<?php echo base_url("product/delete/"); ?>"
								class="btn btn-sm btn-danger btn-outline remove-btn">
								<i class="fa fa-trash"></i> Radera 
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>