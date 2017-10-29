<?php

class m171029_074406_init extends \yii\mongodb\Migration
{
    public function up()
    {
        $this->createCollection('user');
        $this->createCollection('request');
        $this->createCollection('video');
    }

    public function down()
    {
        $this->dropCollection('user');
        $this->dropCollection('request');
        $this->dropCollection('video');
    }
}
