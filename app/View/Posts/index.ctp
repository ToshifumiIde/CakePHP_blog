<h1>Blog posts</h1>

<p>
<?php echo $this->Html->link(
  "Add Post" , 
  array("controller"=>"posts" , "action"=> "add")
);?>
</p>

<table>
<tr>
  <th>Id</th>
  <th>Title</th>
  <th>Action</th>
  <th>Delete</th>
  <th>Created</th>
</tr>
<?php foreach($posts as $post):?>
  <tr>
    <td><?php echo $post["Post"]["id"] ;?></td>
    <td>
    <?php echo $this->Html->link($post["Post"]["title"] , array("controller"=>"posts" , "action"=>"view" , $post["Post"]["id"]));?>
    </td>
    <td>
    <?php echo $this->Html->link("Edit" , array("action"=>"edit" , $post["Post"]["id"]));?>
    </td>
    <td><?php echo $this->Form->postLink("Delete" ,array("action" => "delete" , $post["Post"]["id"]),array("confirm"=>"Are you sure ?")) ;?></td>
    <!-- $this->HtmlはHtmlHelperクラスのインスタンスを生成 -->
    <!-- $this->Html->link("タイトル" , url")にてリンク先を生成 -->
    <td><?php echo $post["Post"]["created"] ;?></td>
  </tr>
<?php endforeach;?>
</table>