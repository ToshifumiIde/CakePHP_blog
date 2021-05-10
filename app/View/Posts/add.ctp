<h1>Add Post</h1>

<?php
//FormHelperを用いてHTMLフォームタグを生成
echo $this->Form->create("Post");
echo $this->Form->input("title");
echo $this->Form->input("body" , array("row" => "3"));
echo $this->Form->end("Save Post");
?>
<!-- $this->Form->create()で生成されるHTMLは次の通り -->
<!-- <form action="/posts/add"(Posts/add.ctpのため) method="post" id="PostAddForm"> -->
<!-- $this->Form->input()メソッドは、引数と同名のフォーム要素を作成するのに使用される。 -->
<!-- 第一引数の名前はどのフィールドに対応しているのかをCakePHPに教える。（MySQLと対応している？） -->
<!-- 第二引数にはarray()の連想配列で渡す値で、様々なオプションの配列を設定可能 -->
<!-- $this->Form->end()の呼び出しで、submitボタンとフォームの終了部分が生成される。 -->
<!-- 最初のパラメータに文字列が指定してある場合、submitボタンの名前が付き、終了フォームタグも出力する。 -->