<?php
    class KanaController
    {
        public $template = 'kana';
        public $title = 'Kana Dojo - The Kana';

        public function main(array $getVars)
        {
            $view = new ViewModel($this->template);
            $view->assign("page", $this->template);
            $view->assign("title", $this->title);
        }
    }
?>
