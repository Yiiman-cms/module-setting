<?php

namespace system\settings\tests;

use system\settings\models\SettingSearch;

class SettingSearchTest extends TestCase
{
    public function testSearch()
    {
        $this->model->value = "i am value";
        $this->model->section = "testUpdate";
        $this->model->type = 'string';
        $this->model->key = "testUpdate";
        $this->model->active = "1";
        $this->model->save();
        $params = ['SettingSearch' => ['active' => 1]];
        $model = new SettingSearch();
        $res = $model->search($params);
        $this->assertTrue($res->count == 1);
        $res1 = $model->search(['SettingSearch'=>[]]);
        $this->assertTrue($res1->count == 1);
    }
}
