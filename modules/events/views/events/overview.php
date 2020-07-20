<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $globalCount */
/* @var $users array */

use yii\helpers\Html;

//\app\modules\community\assets\communityOverview\CommunityOverviewAsset::register($this);

//$this->title = \app\modules\community\Module::t('overview', 'overview_header');

?>

<div class="site-communityOverview">
    <!-- *************** Header *************** -->
    <div class="hero">
        <div class="hero-image">
            <picture>
                <source media="(min-width: 1200px)"
                        srcset="https://via.placeholder.com/1920x500"
                        type="image/jpeg">
                <source media="(min-width: 300px)"
                        srcset="https://via.placeholder.com/400x250"
                        type="image/jpeg">
                <img src="https://via.placeholder.com/1920x500" aria-label="News Header" class="img-fluid"/>
                <!--<img src="assets/images/hero/herobackground.png" aria-label="News Header" class="img-fluid"/>-->
            </picture>
        </div>
        <div class="hero-container row">
            <div class="hero-text col-lg-8">
                <h1 class="hero-title">
                    Events
                </h1>
                <p class="description" >
                    Weit hinten, hinter den Wortbergen, fern der L�nder Vokalien und Konsonantien.
                </p>
            </div>
        </div>
    </div>
</div>