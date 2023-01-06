<?php 
class Product extends CI_Controller
{
	public $viewFolder = "";
	
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "product_v";
		$this->load->model("product_model");
	}

	public function index()
	{
		$viewData = new stdClass();

		//All data come here
		$items = $this->product_model->get_all();

		//ViewData variables set
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function new_form()
	{
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function save()
	{
		//Get->Codeigniter library "form_validation"
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "ProduktNamn", "required|trim");

		//validation_errors
		$this->form_validation->set_message(
			array(
				"required" => "Du måste skriva <b>{field}</b>"
			)
		);

		// true or false
		$validate = $this->form_validation->run();
		if($validate){
			$insert = $this->product_model->add(
				array(
					"title" 		=> $this->input->post("title"),
					"description" 	=> $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"pris"			=> $this->input->post("pris"),
					"rank"			=> 0,
					"isActive" 		=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s"),
				)
			);

			if($insert){
				redirect(base_url("product"));
			} else {
				redirect(base_url("product"));
			}

		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}

	public function updateForm($id)
	{
		$viewData = new stdClass();

		//GET Data
		$item = $this->product_model->get(
			array(
				"id" => $id,
			)
		);

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function update($id)
	{
		//Get->Codeigniter library "form_validation"
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "ProduktNamn", "required|trim");

		//validation_errors
		$this->form_validation->set_message(
			array(
				"required" => "Du måste skriva <b>{field}</b>"
			)
		);

		// true or false
		$validate = $this->form_validation->run();
		if($validate){
			$update = $this->product_model->update(
				array(
					"id" => $id
				),
				array(
					"title" 		=> $this->input->post("title"),
					"description" 	=> $this->input->post("description"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"pris"			=> $this->input->post("pris"),
				)
			);

			if($update){
				redirect(base_url("product"));
			} else {
				redirect(base_url("product"));
			}

		} else {
			$viewData = new stdClass();

			$item = $this->product_model->get(
				array(
					"id" => $id,
				)
			);

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $item;

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}

	public function delete($id)
	{
		$delete = $this->product_model->delete(
			array(
				"id"	=> $id
			)
		);

		if ($delete) {
			redirect(base_url("product"));
		} else {
			redirect(base_url("product"));
		}
	}

	public function isActiveSet($id)
	{
		if($id){
			//=== "true" colum isActive TINYINT
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;

			$this->product_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}
}
?>