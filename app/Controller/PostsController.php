<?php

class PostsController extends AppController{
  //各コントローラーにデフォルトで用意されている$helpersプロパティを用意。プロパティ内にはViewで使用できるヘルパーの一覧が保持されている。
  //Viewでhelperを使用するには、helperの名前をコントローラーの$helpers配列に追加する。
  public $helpers = array("Html" , "Form", "Flash");
  public $components = array("Flash");

  //posts/indexへのアクセスに必要なメソッド
  public function index(){
    //set()メソッドで変数を用意
    //"posts"に対し「（自分で作成した）Postモデル」のfind()メソッドを用いて"all"を指定することで、dbの全ての情報を取得する。
    $params = array("order"=>"modified desc");

    $this->set("posts" , $this->Post->find("all" , $params));
    $this->set("title_for_layout" , "記事一覧");
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

  public function add(){
    //httpリクエストがpostなら
    if($this->request->is("post")){
      //（自分で作成した）Postモデルを使ってデータの保存を試みる。
      $this->Post->create();
      //ユーザーがフォームを使ってデータをPOSTした場合、その情報は$this->request->dataの中に入る。
      if($this->Post->save($this->request->data)){
        $this->Flash->success(__("Your post has been saved"));
        return $this->redirect(array("action" => "index"));
      }
      $this->Flash->error(__("Unable to add your post."));
    }
  }
  public function edit($id = null){
    //idが存在するか確認
    if(!$id){
      throw new NotFoundException(__("Invalid post"));
    }

    //リクエストがPOSTかPUTか確認
    $post = $this->Post->findById($id);
    if(!$post){
      throw new NotFoundException(__("Invalid post"));
    }

    if($this->request->is(array("post","put"))){
      $this->Post->id = $id;
      if($this->Post->save($this->request->data)){
        $this->Flash->success(("Your post has been updated"));
        return $this->redirect(array("action" => "index"));
      }
      $this->Flash->error(__("Unable to update your post."));
    }

    if(!$this->request->data){
      $this->request->data = $post;
    }
  }

  public function delete($id){
    if($this->request->is("get")){
      throw new MethodNotAllowedException();
    }
    if($this->Post->delete($id)){
      $this->Flash->success(__("The post with id %s has been deleted."  , h($id)));
    } else {
      $this->Flash->error(__("The post with id %s could not be deleted." ,h($id)));
    }
    return $this->redirect(array("action" => "index"));
  }

  
}