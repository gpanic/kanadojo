<?php
    class SettingsController
    {
        public $template = 'settings';
        public $title = 'Kana Dojo - Settings';

        public function main(array $getVars)
        {
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);
        }
    }
?>
