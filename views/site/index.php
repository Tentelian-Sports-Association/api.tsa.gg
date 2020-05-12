<?php

/* @var $this yii\web\View
 * @var $upcomingEvents array
 * @var $tournaments array
 * @var $latestNews array
 * @var $ourPartner array
 */

$this->title = 'My Yii Application';
?>

<div class="site-index">
    <!-- *************** Upcoming Events Bereich *************** -->

    <!-- Das N�chste anstehende Event f�r die Gro�e anzeige -->
    <div><?= $upcomingEvents['Next']['Name'] ?></div>
    <div><?= $upcomingEvents['Next']['shortDescription'] ?></div>
    <!-- Background Image, funktion zum laden baue ich wenn design da -->
    <div><?= $upcomingEvents['Next']['previewImage'] ?></div>
    <!-- ID f�r den Button, funktion baue ich wenn design da -->
    <div><?= $upcomingEvents['Next']['ID'] ?></div>

    <!-- Das angepriesene Event f�r die kleine Ecke -->
    <div><?= $upcomingEvents['Preview']['Name'] ?></div>
    <div><?= $upcomingEvents['Preview']['shortDescription'] ?></div>
    <!-- Background Image, funktion zum laden baue ich wenn design da -->
    <div><?= $upcomingEvents['Preview']['previewImage'] ?></div>
    <!-- ID f�r den Button, funktion baue ich wenn design da -->
    <div><?= $upcomingEvents['Preview']['ID'] ?></div>

    <!-- *************** Tournaments Bereich *************** -->
    <?php foreach($tournaments as $tournament) : ?>
        <div><?= $tournament['Name'] ?></div>
        <div><?= $tournament['Mode'] ?></div>
        <?php if($tournament['IsLive']) : ?>
            <!-- ab hier dann die Button geschichte das man direkt auf den  Turnierbaum kommt -->
            <div><?= $tournament['ID'] ?></div>
        <?php else : ?>
            <!-- ab hier dann datum und uhrzeit wenn es nicht live ist -->
            <div><?= $tournament['StartingDate'] ?></div>
            <div><?= $tournament['StartingTime'] ?></div>
        <?php endif; ?>
        <!-- Image f�r Hover Image funktion zum laden baue ich wenn design da -->
        <div><?= $tournament['HoverImage'] ?></div>
    <?php endforeach; ?>

    <!-- *************** Latest News Bereich *************** -->
    <?php foreach($latestNews as $news) : ?>
         <!-- Background Image, funktion zum laden baue ich wenn design da -->
        <div><?= $news['previewImage'] ?></div>
        <div><?= $news['Headline'] ?></div>
        <div><?= $news['StartingDate'] ?></div>
        <!-- ID f�r den Button, funktion baue ich wenn design da -->
        <div><?= $news['ID'] ?></div>
    <?php endforeach; ?>

    <!-- *************** Our Partners Bereich *************** -->
    <?php foreach($ourPartner as $partner) : ?>
        <!-- Background Image, funktion zum laden baue ich wenn design da -->
        <div><?= $partner['previewImage'] ?></div>
        <!-- ID f�r den Button, funktion baue ich wenn design da -->
        <div><?= $partner['ID'] ?></div>
    <?php endforeach; ?>
</div>