<h1><?php echo h($post["Post"]["title"]);?></h1>

<p><small>created: <?php echo $post["Post"]["created"];?></small></p>
<p><?php echo h($post["Post"]["body"]);?></p>

<h2>Comments</h2>

<ul>
<?php foreach($post["Comment"] as $comment) :?>
  <li>
  <?php echo h($comment["body"]);?> by <?php echo h($comment["commenter"]);?>
  </li>
<?php endforeach;?>
</ul>