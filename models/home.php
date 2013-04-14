<?php
    include "/config.php";

    class HomeModel
    {
        public function __construct()
        {
        }
        
        public function getRandomKana()
        {
            include "/helpers/kana.php";
            return array_rand($kana);
        }
    }
?>
