<?php

class ControllerExtensionModuleFeNews extends Controller {

    public function getNewsList() {
        $this->load->model('extension/module/fe_news_information');
        $informations = $this->model_extension_module_fe_news_information->getNewsInformations();

        $data = [];
        $data['informations'] = $informations;
        return $this->load->view('extension/module/fe_news', $data);
    }

    public function index() {
        $this->response->setOutput($this->getNewsList());
    }

}
