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

            $model = new SettingsModel();
            $settings = $model->getSettings($_SESSION['id']);
            $view->assign("settings", $settings);
        }

        public function post(array $post)
        {
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);

            $settings = [];
            if (isset($_POST['weighted']))
            {
                $settings['weighted'] = 1;
            }
            else
            {
                $settings['weighted'] = 0;
            }

            $model = new SettingsModel();
            $model->setSettings($_SESSION['id'], $settings);

            $view->assign("settings", $settings);
            $view->assign("updated", TRUE);
        }
    }
?>
