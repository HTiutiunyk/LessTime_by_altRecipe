<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="wrapper">
        <div class="row">
            <div class="about-item col-md-4 col-sm-6 col-lg-4 col-xs-12">
                <h2>For the people</h2>
                <p>Designed for anyone who works with projects: project managers, performers and product owners. Smart service with big ambitions.</p>
            </div>
            <div class="about-item col-md-4 col-sm-6 col-lg-4 col-xs-12">
                <h2>By the team</h2>
                <p>We have made this product for yourself. We - a team of developers, which is constantly evolving and developing this product.</p>
            </div>
            <div class="about-item col-md-4 col-sm-6 col-lg-4 col-xs-12">
                <h2>Product evolution</h2>
                <p>Every day, when something changes: we are improving every detail, automating workflow and saving time of all project participants.</p>
            </div>
        </div>
    </div>
</div>
