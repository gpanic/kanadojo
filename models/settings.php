<?php
	include "/config.php";

    class SettingsModel
    {
        public function __construct()
        {
        }

        public function getSettings($id)
        {
            $settings = DB::queryFirstRow("SELECT * FROM settings WHERE id_user=%s", $id);
            return $settings;
        }

        public function setSettings($id, $settings)
        {
            DB::update('settings', array(
                'weighted' => $settings['weighted']
                ), 'id_user=%s', $id
            );

            $_SESSION['weighted'] = $settings['weighted'];
        }
    }
?>
