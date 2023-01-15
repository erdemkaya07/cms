<?php 
class Product extends CI_Controller
{
	public $viewFolder = "";
	
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "product_v";
		$this->load->model("product_model");
		$this->load->model("product_image_model");
	}

	public function index()
	{
		$viewData = new stdClass();

		//All data come here
		$items = $this->product_model->get_all(
			array(), "rank ASC"
		);

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
				$alert = array(
					"title" => "Hej",
					"text" => "Bra jobbat!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"title" => "Hej",
					"text" => "Något fel!",
					"type" => "error"
				);
			}
			//Visa/skriva resultat i session.... set_flashdata ->codeigneter
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("product"));

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
				$alert = array(
					"title" => "Hej",
					"text" => "Bra jobbat!",
					"type" => "success"
				);
				
			} else {
				$alert = array(
					"title" => "Hej",
					"text" => "Hopps! Något fel!",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("product"));


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
			$alert = array(
				"title" => "Hej",
				"text" => "Bra jobbat! Raderat!",
				"type" => "success"
			);
			
		} else {
			$alert = array(
				"title" => "Hej",
				"text" => "Hopps! Jag kan inte radera.Något fel!",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert", $alert);
		redirect(base_url("product"));

	}

	public function imageDelete($id, $parent_id)
	{
		$fileName = $this->product_image_model->get(
			array(
				"id" => $id
			)
		);

		$delete = $this->product_image_model->delete(
			array(
				"id"	=> $id
			)
		);

		if ($delete) {
			unlink("uploads/{$this->viewFolder}/$file_name->img_url");

			redirect(base_url("product/imageForm/$parent_id"));
		} else {
			redirect(base_url("product/imageForm/$parent_id"));
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

	public function rankSet()
	{
		$data = $this->input->post("data");

		/* 
		parse_str(TR) => parse_str(string $dizge, array &$sonuç): void
		Bir URL üzerinden aktarılan bir sorgu dizgesindeki değişkenleri çözümler ve bunları geçerli etki alanında (veya sonuç belirtilmişse dizi içinde) tanımlı hale getirir.

		parse_str(EN) =>Parses string as if it were the query string passed via a URL and sets variables in the current scope (or in the array if result is provided)
		*/
		parse_str($data, $order);

		/* ["ord"] kommer från list/content.php 27 => id="ord" */
		$items = $order["ord"];

		foreach($items as $rank => $id){
			$this->product_model->update(
				array(
					"id" => $id,
					//om byttade inte position
					"rank !=" => $rank
				),
				array(
					"rank" => $rank
				)
			);
		}
	}

	public function imageRankSet()
	{
		$data = $this->input->post("data");
		parse_str($data, $order);

		/* ["ord"] kommer från list/content.php 27 => id="ord" */
		$items = $order["ord"];

		foreach($items as $rank => $id){
			$this->product_image_model->update(
				array(
					"id" => $id,
					//om byttade inte position
					"rank !=" => $rank
				),
				array(
					"rank" => $rank
				)
			);
		}
	}

	public function imageForm($id)
	{
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "image";

		$viewData->item = $this->product_model->get(
			array(
				"id"	=> $id
			)
		);

		$viewData->item_images = $this->product_image_model->get_all(
			array(
				"product_id" => $id
			),	"rank ASC"
		);

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function imageUpload($id)
	{
		/*Bilder namn SEO convert*/
        //$file_name = convertToSEO($_FILES['file']['name']);
		/*TA BORT .JPG .PNG .JPEG FOR URL*/
		$file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

		$config["allowed_types"] = "jpg|jpeg|png";
		$config["upload_path"]   = "uploads/$this->viewFolder/";
		$config["file_name"] = $file_name;

		$this->load->library("upload", $config);

		$upload = $this->upload->do_upload("file");

		if($upload){

			$uploaded_file = $this->upload->data("file_name");

			$this->product_image_model->add(
				array(
					"img_url"       => $uploaded_file,
					"rank"          => 0,
					"isActive"      => 1,
					"isCover"       => 0,
					"createdAt"     => date("Y-m-d H:i:s"),
					"product_id"    => $id
				)
			);
		} else {
			echo "Fannnn!";
		}

	}

	public function refreshImageList($id)
	{
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "image";

		$viewData->item_images = $this->product_image_model->get_all(
			array(
				"product_id" => $id
			)
		);

		$render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/renderElements/image_list_v", $viewData, true);

		echo $render_html;
	}

	public function isCoverSet($id, $parent_id)
	{
		if($id && $parent_id){
			//=== "true" colum isCover TINYINT
			$isCover = ($this->input->post("data") === "true") ? 1 : 0;
			//huvud bild ID
			$this->product_image_model->update(
				array(
					"id" => $id,
					"product_id" => $parent_id
				),
				array(
					"isCover" => $isCover
				)
			);
			//Annan bilder
			$this->product_image_model->update(
				array(
					"id !=" => $id,
					"product_id" => $parent_id
				),
				array(
					"isCover" => 0
				)
			);

			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "image";

			$viewData->item_images = $this->product_image_model->get_all(
				array(
					"product_id" => $parent_id
				),	"rank ASC"
			);

			$render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/renderElements/image_list_v", $viewData, true);

			echo $render_html;
		}
	}

	public function imageIsActiveSet($id)
	{
		if($id){
			//=== "true" colum isActive TINYINT
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;

			$this->product_image_model->update(
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