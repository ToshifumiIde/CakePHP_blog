<?php

class PostsController extends AppController{
  //デフォルトで用意されているhelpersメソッドの使用
  public $helpers = array("Html" , "Form");
  
  //posts/indexへのアクセスに必要なメソッド
  public function index(){
    //set()メソッドで変数を用意
    $this->set("posts" , $this->Post->find("all"));
  }
}