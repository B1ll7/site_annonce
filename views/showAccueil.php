<?php
    class VueAccueil
    {
        public function show()
        {
            $url = $_SERVER("URI");
            echo "<a href='$url'></a>";
        }
    }