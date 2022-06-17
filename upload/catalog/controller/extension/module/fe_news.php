<?php

class ControllerExtensionModuleFeNews extends Controller {

    public function getNewsList()
    {
        $data = [];
        return $this->load->view('extension/module/fe_news', $data);
    }

    public function index()
    {
        $this->response->setOutput($this->getNewsList());
    }

}
