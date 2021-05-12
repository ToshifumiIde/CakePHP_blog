<?php

class Post extends AppModel {
  public $hasMany = "Comment";
  //Comment ModelとPost Modelの両方に書くことで
  //Comment ModelとPost Modelが結びつく。
  //Post Modelを引っ張ってくるとPostに紐づいたCommentも同時に引っ張ることが可能

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