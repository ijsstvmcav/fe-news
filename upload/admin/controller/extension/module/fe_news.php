<?php

class ControllerExtensionModuleFeNews extends Controller {

    public function index() {
    }

    public function install() {
        $table = DB_PREFIX . "information_news";
        $sql = "CREATE TABLE IF NOT EXISTS {$table} (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY
        );";
        $this->db->query($sql);

        $this->load->model('setting/event');
        $this->model_setting_event->addEvent(
            'fe_news_add_check_for_information_after',
            'admin/view/catalog/information_form/after',
            'extension/module/fe_news/addCheckForInformation'
        );
    }

    public function uninstall() {
        $this->load->model('setting/event');
        $this->model_setting_event->deleteEventByCode('fe_news_add_check_for_information_after');
    }

    public function addCheckForInformation(&$route, &$args, &$output)
    {
        $content = $this->load->view('extension/module/fe_news_add_check_for_information');

        $pattern = '/(.*)(<\/header>)(.*)/';
        $replacement = '${1}' . $content . '${2}${3}';
        $output = preg_replace($pattern, $replacement, $output);

    }

}
