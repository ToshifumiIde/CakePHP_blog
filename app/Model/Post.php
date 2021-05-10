<?php

class Post extends AppModel {
  //$validate配列を用いてsave()メソッドが呼ばれた際、どのようにvalidateするかCakePHPに教える。
  //ここでは、titleとbodyが空ではNGという設定を実施。
  public $validate = array(
    "title" => array(
      "rule" => "notBlank",
    ),
    "body" =>array(
      "rule" => "notBlank",
    ),
  );
}