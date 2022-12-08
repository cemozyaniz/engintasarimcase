<?php

class Userop extends CI_Controller
{

    public $viewFolder = "";


    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";
        $this->load->model("user_model");
    }


    public function login()
    {

        if (get_active_user()) {
            redirect(base_url());
        }
        $viewData = new stdClass();

        $logo = get_settings()->logo;

        $viewData->logo = $logo;

        $this->load->library("form_validation");
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login()
    {
        if (get_active_user()) {
            redirect(base_url());
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("user_email", "E-posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Şifre", "required|trim|min_length[6]");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz",
                "is_unique" => "<b>{field}</b> alanı daha önce kullanılmış",
                "matches" => "Şifreler birbirlerini tutmuyor",
                "min_length" => "Şifreniz minimum 6 karakterden oluşmalıdır.",
            )
        );

        $validate = $this->form_validation->run();

        if (!$validate) {
            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $user = $this->user_model->get(
                array(
                    "email" => $this->input->post("user_email"),
                    "isActive" => 1,
                    "password" => md5($this->input->post("user_password")),
                )
            );
            if ($user) {

                $this->session->set_userdata("user", $user);

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "$user->full_name hoşgeldiniz",
                    "type" => "success"
                );
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Lütfen Giriş Bilgileriniz Kontrol Ediniz",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));
            }
        }

    }

    public function logout()
    {

        $this->session->unset_userdata("user");
        redirect(base_url("login"));
    }

    public function send_email()
    {

        $config = array(
            "protocol" => "smtp",
            "smtp_host" => "ssl://mail.cosasoftworks.com",
            "smtp_port" => "465",
            "smtp_user" => "social@cosasoftworks.com",
            "smtp_pass" => "021021Social",
            "starttls" => "true",
            "charset" => "utf-8",
            "mailtype" => "html",
            "wordwrap" => "true",
            "newline" => "\r\n",
        );

        $this->load->library("email", $config);

        $this->email->from("social@cosasoftworks.com", "CMS");
        $this->email->to("cozyaniz@gmail.com");
        $this->email->subject("Boş Konu");
        $this->email->message("Deneme e postası");

        $send = $this->email->send();

        if ($send) {
            echo "EPosta gönderildi";
        } else {
            echo $this->email->print_debugger();
        }
    }

    public function forget_password()
    {

        if (get_active_user()) {
            redirect(base_url());
        }
        $viewData = new stdClass();

        $logo = get_settings()->logo;

        $viewData->logo = $logo;

        $this->load->library("form_validation");
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function reset_password()
    {

        $this->load->library("form_validation");



        // Kurallar yazilir..
        $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>e-posta</b> adresi giriniz",
            )
        );

        if ($this->form_validation->run() === FALSE) {

            $viewData = new stdClass();

            $logo = get_settings()->logo;

            $viewData->logo = $logo;

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            $user = $this->user_model->get(
                array(
                    "isActive" => 1,
                    "email" => $this->input->post("email")
                )
            );

            if ($user) {

                $this->load->helper("string");
                $temp_password = random_string();

                $send = send_email($user->email, "Şifremi Unuttum", "COSA Softworks CMS'e <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz");

                if ($send) {
                    echo "E-posta başarılı bir şekilde gonderilmiştir..";

                    $this->user_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );


                    $alert = array(
                        "title" => "İşlem Başarılı",
                        "text" => "Şifreniz başarılı bir şekilde resetlendi. Lütfen E-postanızı kontrol ediniz!",
                        "type" => "success"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("login"));

                    die();


                } else {

//                    echo $this->email->print_debugger();
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "E-posta gönderilirken bir problem oluştu!!",
                        "type" => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("sifremi-unuttum"));

                    die();

                }

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Böyle bir kullanıcı bulunamadı!!!",
                    "type" => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("sifremi-unuttum"));


            }


        }
    }
}
