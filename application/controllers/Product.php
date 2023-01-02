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
					"url" 			=> "test",
					"rank"			=> 0,
					"isAcrive"		=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s"),
				)
			);

			if($insert){
				echo "string";
			} else {
				echo "något fel";
			}

		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}
}
?>