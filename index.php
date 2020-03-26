<?php 
  include 'header.php'; 
?>
<section id="main">
  <div class="container">
    <div class="row">

      <section class="post-list">

      </section>
      <?php
      require('php/DBHandler.php');
      $db = new DBHandler();
      $db->connect();
      $posts = $db->getBlogPosts();
      $db->closeConnection();
      ?>

      <?php foreach ($posts as $post) : ?>

        <!-- generated post  -->
        <div class="panel panel-default blogpost">
          <div class="panel-heading">
            <h2 class="panel-title"><?php echo $post['title']; ?></h2>
          </div>
          <div class="panel-body">
            <small class="date-posted-box">Posted <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
            </br>
            <?php echo $post['body']; ?>
          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<!-- Modals -->

<!-- Add Page -->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Page</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Page Title</label>
            <input type="text" class="form-control" placeholder="Page Title">
          </div>
          <div class="form-group">
            <label>Page Body</label>
            <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Published
            </label>
          </div>
          <div class="form-group">
            <label>Meta Tags</label>
            <input type="text" class="form-control" placeholder="Add Some Tags...">
          </div>
          <div class="form-group">
            <label>Meta Description</label>
            <input type="text" class="form-control" placeholder="Add Meta Description...">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  CKEDITOR.replace('editor1');
</script>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>