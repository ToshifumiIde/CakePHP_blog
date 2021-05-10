<?php

class PostsController extends AppController{
  //各コントローラーにデフォルトで用意されている$helpersプロパティを用意。プロパティ内にはViewで使用できるヘルパーの一覧が保持されている。
  //Viewでhelperを使用するには、helperの名前をコントローラーの$helpers配列に追加する。
  public $helpers = array("Html" , "Form");

  //posts/indexへのアクセスに必要なメソッド
  public function index(){
    //set()メソッドで変数を用意
    $this->set("posts" , $this->Post->find("all"));
  }
}