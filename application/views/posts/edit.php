<p><?= $title; ?></p>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title"<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Distributor</label>
    <input type="text" class="form-control" name="Shared_by" placeholder="Add Name"<?php echo $post['Shared_by']; ?>">
   </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>