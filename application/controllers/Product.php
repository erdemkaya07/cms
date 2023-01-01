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
}
?>