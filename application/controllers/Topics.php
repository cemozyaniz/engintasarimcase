<?php

class Topics extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "topics_v";

        $this->load->model("topic_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }

    }

    public function index()
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->topic_model->get_all(
            array()
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_form()
    {

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save()
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..


        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if ($validate) {


            // Upload Süreci...

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);


            $data = array(
                "title" => $this->input->post("title"),
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:i:s")
            );


            $insert = $this->topic_model->add($data);

            // TODO Alert sistemi eklenecek...
            if ($insert) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type" => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type" => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("topics"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id)
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->topic_model->get(
            array(
                "id" => $id,
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }


    public function update($id)
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..


        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if ($validate) {


            // Upload Süreci...


            $data = array(
                "title" => $this->input->post("title"),
            );


            $update = $this->topic_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
            if ($update) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type" => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type" => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("topics"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->topic_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id)
    {

        $delete = $this->topic_model->delete(
            array(
                "id" => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if ($delete) {

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type" => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type" => "error"
            );


        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("topics"));


    }

    public function isActiveSetter($id)
    {

        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->topic_model->update(
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
