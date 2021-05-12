<?php

class CategoryShell extends AppShell{
  //shellからアプリケーションで作成したモデルを参照するには、コントローラーと同じく$usesプロパティを使用する。
  public $uses = array("Category");

  // //一覧表示するにはコンソールへの出力が必要。
  // //shellから出力する場合、echoではなく$this->out()メソッドを使用する。
  public function index(){
    $this->out("id\tname");
    foreach($this->Category->find("All") as $category){
      $this->out($category["Category"]["id"]."\t".$category["Category"]["name"]);
    }
  }

  public function add(){
    $this->Category->create();
    $this->Category->save(array("name" => $this->args[0]));
    $this->out("登録しました");
  }

  public function delete(){
    $category = $this->Category->findById($this->args[0]);
    $this->out($category["Category"]["id"]."\t".$category["Category"]["name"]);
    if(strtolower($this->in("本当に削除してもよろしいですか？" , array("y","n") , "n")) == "n"){
      $this->out("終了します");
      return;
    }
    $this->Category->delete($this->args[0]);
    $this->out("削除しました");
  }

  public function main(){
    $parser = parent::getOptionParser();
    return $parser->description(
      "カテゴリ管理プログラム"
    )->addSubcommand("index",array(
      "help" =>"カテゴリの一覧表示",
      "parser" => array("description" =>array("登録されているカテゴリを全て一覧表示します"))
    ))->addSubcommand("add",array(
    "help"=>"カテゴリ追加",
    "parser"=>array("description"=>array(
      "指定されたカテゴリ名のレコードを追加します。"),
      "arguments"=>array(
        "name"=>array(
          "help"=>"カテゴリ名",
          "required" =>true)))
  ))->addSubcommand("delete",array(
    "help"=>"カテゴリ削除",
    "parser"=>array("description"=>array(
      "指定されたカテゴリのIDレコードを削除します。"),
      "arguments"=>array(
        "id"=>array(
          "help"=>"カテゴリID",
          "required"=> true))
    )
  ));
  }
}