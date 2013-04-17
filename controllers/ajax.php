<?php
    class AjaxController
    {

        function __construct() {
        }

        public function main(array $getVars)
        {
            $model = new AjaxModel();
            if (isset($getVars['ajax']))
                {
                    if ($getVars['ajax'] == 'getRandomKanji')
                    {
                        if(isset($_SESSION['weighted']))
                        {
                            $this->getRandomKanji($model, $_SESSION['weighted']);
                        }
                        else
                        {
                            $this->getRandomKanji($model, 0);
                        }
                    }
            }
        }

        public function post(array $post)
        {
            $model = new AjaxModel();
            if (isset($post['ajax']))
            {
                if ($post['ajax'] == "checkKanji")
                {
                    if(isset($_SESSION['weighted']))
                    {
                        $this->checkKanji($post, $model, $_SESSION['weighted']);
                    }
                    else
                    {
                        $this->checkKanji($post, $model, 0);
                    }
                }
            }
        }

        public function getRandomKanji($model, $weighted)
        {
            include '/helpers/kana.php';
            if ($weighted)
            {
                $key = $model->getRandomWeightedKanji($_SESSION['id']);
            }
            else
            {
                $key = array_rand($kana);
            }
            header('Content-Type: application/json');
            echo json_encode(array('kanji' => "&#" . $key . ";", 'romanji' => $kana[$key][0], 'key' => $key));
        }

        public function checkKanji($post, $model, $weighted)
        {
            include "/helpers/kana.php";
            if (isset($post['romanji']) && isset($post['kanji']))
            {
                $romanji = $post['romanji'];
                $kanji = $post['kanji'];
                if (isset($kana[$kanji]))
                {
                    if (in_array($romanji, $kana[$kanji]))
                    {
                        if ($weighted)
                        {
                            $model->updateScore($_SESSION['id'], $kanji, TRUE);
                        }
                        echo TRUE;
                        exit;
                    }
                    else
                    {
                        if ($weighted)
                        {
                            $model->updateScore($_SESSION['id'], $kanji, FALSE);
                        }
                    }

                }
            }
            echo FALSE;
        }
    }
?>
