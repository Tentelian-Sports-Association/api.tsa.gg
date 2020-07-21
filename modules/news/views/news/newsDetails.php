<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View
 * @var $selectedNews array
 */

\app\modules\news\assets\NewsDetailsAsset::register($this);

$this->title = \app\modules\news\Module::t('overview', 'overview_header');

?>

<div class="news-block">
    <!-- *************** Header *************** -->
    <div class="hero">
        <div class="hero-image">
            <picture>
                <source media="(min-width: 1200px)"
                        srcset=<?php echo Yii::$app->HelperClass->checkImage('/images/banner/', 'news') . '.webp' ?>
                        type="image/jpeg">
                <source media="(min-width: 300px)"
                        srcset=<?php echo Yii::$app->HelperClass->checkImage('/images/banner/', 'news') . '.webp' ?>
                        type="image/jpeg">
                <img src="https://via.placeholder.com/1920x500" aria-label="News Header" class="img-fluid"/>
            </picture>
        </div>
        <div class="hero-container row">
            <div class="hero-text col-lg-8">
                <h1 class="hero-title">
					News
                </h1>
                <p class="description" >
                    Weit hinten, hinter den Wortbergen, fern der L�nder Vokalien und Konsonantien.
                </p>
            </div>
        </div>
    </div>

    <!-- *************** Detailed News Bereich *************** -->

    $selectedNews['ID']
    $selectedNews['CategorieID']
    $selectedNews['SubCategorieID']
    
    $selectedNews['AuthorID']
    $selectedNews['Author']
    
    $selectedNews['Headline']
    $selectedNews['ShortBody']
    $selectedNews['LongBody']
    
    $selectedNews['previewImage']
    $selectedNews['Date']
    $selectedNews['Time']

</div>