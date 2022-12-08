<?php

class Articles extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->viewFolder = "articles_v";

        $this->load->model("article_model");
        $this->load->model("article_image_model");
        $this->load->model("topic_model");
        $this->load->model("writer_model");

        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $viewData = new stdClass();


        /* Tablodan verilerin getirilmesi */

        $items = $this->article_model->get_all(
            array(), "rank ASC"
        );

        /** View'e gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_form()
    {

        $viewData = new stdClass();

        $viewData->topics = $this->topic_model->get_all(
            array(
                "isActive" => 1,
            )
        );

        $viewData->writers = $this->writer_model->get_all(
            array(
                "isActive" => 1,
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save()
    {

        $this->load->library("form_validation");

        //Kurallar


        $this->form_validation->set_rules("title", "Makale Başlığı", "required|trim");
        $this->form_validation->set_rules("w_id", "Yazar", "required|trim");
        $this->form_validation->set_rules("t_id", "Konu Başlığı", "required|trim");
        $this->form_validation->set_rules("description", "Makale Yazısı", "required|trim");
        
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz",

            )
        );

        

        //Form Validation Çalışır
        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "w_id" => $this->input->post("w_id"),
                "t_id" => $this->input->post("t_id"),
                "url" => convertToSEO($this->input->post("title")),
                "rank" => 0,
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:i:s")
            );

            if ($_FILES['file_url']['name'] != '') {

                $config['upload_path'] = './uploads/articles_v/files/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 10000;

                $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_url')) {
            $alert = array(
                "text" => "Kayıt Başarısız! PDF Yüklenirken bir hata oluştu.",
                "title" => "İşlem Başarısız",
                "type" => "error"
            );

        }
                $data['file_url'] = $_FILES['file_url']['name'];
        }

            $insert = $this->article_model->add(
                $data
            );

            //TODO Alert Sistemi
            if ($insert) {
                $alert = array(
                    "text" => "Kayıt Başarılı",
                    "title" => "İşlem Başarılı",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "text" => "Kayıt Başarısız",
                    "title" => "İşlem Başarısız",
                    "type" => "error"
                );

            }
            // İşlem sonucunu session'a yazmak
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("articles"));

        } else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id)
    {
        $viewData = new stdClass();


        $viewData->topics = $this->topic_model->get_all(
            array(
                "isActive" => 1,
            )
        );

        $viewData->writers = $this->writer_model->get_all(
            array(
                "isActive" => 1,
            )
        );

        //Database'den itemi çekmek

        $item = $this->article_model->get(
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

        $this->load->library("form_validation");

        //Kurallar

        $this->form_validation->set_rules("title", "Makale Başlığı", "required|trim");
        $this->form_validation->set_rules("w_id", "Yazar", "required|trim");
        $this->form_validation->set_rules("t_id", "Konu Başlığı", "required|trim");
        $this->form_validation->set_rules("description", "Makale Yazısı", "required|trim");


        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz",
            )
        );

        //Form Validation Çalışır
        $validate = $this->form_validation->run();
        $data = array(
            "title" => $this->input->post("title"),
            "description" => $this->input->post("description"),
            'w_id' => $this->input->post('w_id'),
            't_id' => $this->input->post('t_id'),
            "url" => convertToSEO($this->input->post("title")),
        );
        if ($validate) {

            if ($_FILES['file_url']['name'] != '') {

                $config['upload_path'] = './uploads/articles_v/files/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 10000;

                $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_url')) {
            $alert = array(
                "text" => "Kayıt Başarısız! PDF Yüklenirken bir hata oluştu.",
                "title" => "İşlem Başarısız",
                "type" => "error"
            );

        }
                $data['file_url'] = $_FILES['file_url']['name'];
        }
            
            $update = $this->article_model->update(
                array(
                    "id" => $id,
                ),

               $data
            );

            //TODO Alert Sistemi
            if ($update) {
                $alert = array(
                    "text" => "Güncelleme Başarılı",
                    "title" => "İşlem Başarılı",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "text" => "Güncelleme Başarısız",
                    "title" => "İşlem Başarısız",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("articles"));
        } else {
            $viewData = new stdClass();

            $item = $this->article_model->get(
                array(
                    "id" => $id,
                )
            );

            $viewData->services = $this->service_model->get_all(
                array(
                    "isActive" => 1,
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
        $delete = $this->article_model->delete(
            array(
                "id" => $id,
            )
        );

        if ($delete) {
            $alert = array(
                "text" => "Silme Başarılı",
                "title" => "İşlem Başarılı",
                "type" => "success"
            );
        } else {
            $alert = array(
                "text" => "Silme Başarısız",
                "title" => "İşlem Başarısız",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("articles"));
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data")) === "true" ? 1 : 0;

            $this->article_model->update(
                array(
                    "id" => $id,
                ),
                array(
                    "isActive" => $isActive,
                )
            );

        }
    }

    public function rankSetter()
    {
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {
            $this->article_model->update(
                array(
                    "id" => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }

    public function image_form($id)
    {

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->article_model->get(
            array(
                "id" => $id,

            )
        );

        $viewData->item_images = $this->article_image_model->get_all(array("article_id" => $id), "rank ASC");


        $render = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData, true);

        echo $render;
    }

    public function image_upload($id)
    {
        $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME));
        $file_name = $file_name . "." . $ext;


        $image_570x570 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder", 570, 570, $file_name);
        $image_271x271 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder", 271, 271, $file_name);





        if ($image_570x570 && $image_271x271 ) {


            $this->article_image_model->add(
                array(
                    "img_url" => $file_name,
                    "rank" => 0,
                    "isCover" => 0,
                    "isActive" => 1,
                    "createdAt" => date("Y-m-d H:i:s"),
                    "article_id" => $id
                )
            );
        } else {
            echo "Başarısız";
        }

    }

    public function refresh_image_list($id)
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->article_image_model->get(
            array(
                "article_id" => $id
            )
        );

        $viewData->item_images = $this->article_image_model->get_all(array("article_id" => $id));


        $render = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

        echo $render;
    }

    public function isCoverSetter($id, $parent_id)
    {
        if ($id && $parent_id) {
            $isCover = ($this->input->post("data")) === "true" ? 1 : 0;

            $this->article_image_model->update(
                array(
                    "id" => $id,
                    "article_id" => $parent_id,
                ),
                array(
                    "isCover" => $isCover,
                )
            );

            $this->article_image_model->update(
                array(
                    "id !=" => $id,
                    "article_id" => $parent_id,
                ),
                array(
                    "isCover" => ($isCover) ? 0 : 0,
                )
            );

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item = $this->article_image_model->get(
                array(
                    "article_id" => $parent_id
                )
            );

            $viewData->item_images = $this->article_image_model->get_all(array("article_id" => $parent_id), "rank ASC");


            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;

        }
    }

    public function imageIsActiveSetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data")) === "true" ? 1 : 0;

            $this->article_image_model->update(
                array(
                    "id" => $id,
                ),
                array(
                    "isActive" => $isActive,
                )
            );

        }
    }

    public function imageRankSetter()
    {
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {
            $this->article_image_model->update(
                array(
                    "id" => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }

    public function imageDelete($id, $parent_id)
    {

        $fileName = $this->article_image_model->get(
            array(
                "id" => $id,
            )
        );

        $delete = $this->article_image_model->delete(
            array(
                "id" => $id,
            )
        );

        if ($delete) {

            deletePicture($this->viewFolder, "570", "570", $fileName->img_url);
            deletePicture($this->viewFolder, "271", "271", $fileName->img_url);

            redirect(base_url("articles/image_form/$parent_id"));
        } else {
            redirect(base_url("articles/image_form/$parent_id"));
        }
    }
}
