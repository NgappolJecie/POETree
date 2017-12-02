<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
	<small class="post-name">Distributor: <?php echo $post['Shared_by']; ?></small><br><br>
	<strong><?php echo $post['body']; ?></strong>
	<p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['Shared_by']); ?>">Read</a></p>
<?php endforeach; ?>