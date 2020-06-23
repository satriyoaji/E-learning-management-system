<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>
            <?php
                date_default_timezone_set("Asia/Bangkok");
                $batas_pagi = strtotime('00:00:00');
                $batas_pagi = date('H:i:s', $batas_pagi);

                $batas_siang = strtotime('12:00:00');
                $batas_siang = date('H:i:s', $batas_siang);

                $batas_sore = strtotime('15:00:00');
                $batas_sore = date('H:i:s', $batas_sore);

                $batas_malam = strtotime('18:00:00');
                $batas_malam = date('H:i:s', $batas_malam);

                if((date('H:i:s') >= $batas_pagi) && (date('H:i:s') <= $batas_siang))
                    echo "Selamat Pagi";
                elseif((date('H:i:s') >= $batas_siang) && (date('H:i:s') <= $batas_sore))
                    echo "Selamat Siang";
                elseif((date('H:i:s') >= $batas_sore) && (date('H:i:s') <= $batas_malam))
                    echo "Selamat Sore";
                else
                    echo "Selamat Malam";

                echo " " . Yii::$app->user->identity->username;
            ?>
        </h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

       
    </div>

</div>
