<?php

class PostsController extends AppController{
  //各コントローラーにデフォルトで用意されている$helpersプロパティを用意。プロパティ内にはViewで使用できるヘルパーの一覧が保持されている。
  //Viewでhelperを使用するには、helperの名前をコントローラーの$helpers配列に追加する。
  public $helpers = array("Html" , "Form");

  //posts/indexへのアクセスに必要なメソッド
  public function index(){
    //set()メソッドで変数を用意
    //"posts"に対し「（自分で作成した）Postモデル」のfind()メソッドを用いて"all"を指定することで、dbの全ての情報を取得する。
    $this->set("posts" , $this->Post->find("all"));
  }

  //posts/viewへのアクセスに必要なメソッド
  //index.ctpにて"action"=>"view"を設定しているため、view()メソッド
  public function view($id = null){
    if(!$id){
      throw new NotFoundException(__("Invalid post"));
    }
    //（自分で作成した）PostモデルのfindById()メソッドを用い、find()メソッドとは異なり、Idでの取得を実施
    $post = $this->Post->findById($id);
    if(!$post){
      throw new NotFoundException(__("Invalid post"));
    }
    $this->set("post" , $post);
  }
}