<?php
	include "/config.php";

    class AjaxModel
    {
        public function __construct()
        {
        }

        public function updateScore($id, $kanji, $success)
        {
            $succededIncrement = 0;
            $kanjiIncrement = 1;
            if ($success)
            {
                $succededIncrement = 1;
                $kanjiIncrement = 0;
            }
            $kanji = 'k' . $kanji;
            DB::update('scores', array(
                    'tests_taken' => DB::sqleval('tests_taken + 1'),
                    'tests_succeeded' => DB::sqleval('tests_succeeded + ' . $succededIncrement),
                    $kanji => DB::sqleval($kanji . ' + ' . $kanjiIncrement)
                ), 'id_user=%d', $id
            );
        }

        public function getRandomWeightedKanji($id)
        {
            $score = DB::queryFirstRow('SELECT * FROM scores WHERE id_user=%s', $id);
            array_shift($score);
            $testsTaken = array_shift($score);
            $testsSucceeded = array_shift($score);


            $values = array_values($score);
            $keys = array_keys($score);
            return substr($keys[$this->getWeightedRandom($values)], 1);
        }

        function getWeightedRandom($weights)
        {
            $total = 0;
            $index = 0;

            foreach ($weights as $weight)
            {
                $total += $weight;
            }
            $rand = (mt_rand(1, 100)/100) * $total;

            foreach ($weights as $weight)
            {
                $rand -= $weight;
                if ($rand > 0)
                {
                    $index++;
                }
                else
                {
                    break;
                }
            }
            return $index;
        }
    }
?>
