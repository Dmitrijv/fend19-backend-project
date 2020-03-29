<?php

include_once("db.php");
include_once("utils.php");

class CMS {

  private static $instance = null;
  private function __construct() { }
  public static function getInstance()
  {
    if (self::$instance == null)
    {
        self::$instance = new CMS();
    } 
    return self::$instance;
  }

  public function createBlogPost($post)
  {
    $sql = "INSERT INTO post (id, published, title, body, date_created, date_last_edit, attatched_image, media_iframe)
            VALUES (NULL, ?, ?, ?, ?, NULL, ?, ?)";
    DB::run($sql, [$post['published'], $post['title'], $post['body'], $post['date_created'], $post['attatched_image'], $post['media_iframe']]);
  }

  public function getBlogPost($postId)
  {
    return DB::run("SELECT * FROM post WHERE id = ?", [$postId])->fetch();
  }

  public function updateBlogPost($newPost)
  {
    // delete old cover image before updating fields
    $coverImage = DB::run("SELECT attatched_image FROM post WHERE id = ?", [$newPost["id"]])->fetchColumn();
    if (isset($coverImage)) { UTILS::deleteFile($coverImage); }    
    $stmt = DB::run("UPDATE post SET published=?, title=?, body=?, date_last_edit=?, attatched_image=?, media_iframe=? WHERE id=?",
     [$newPost["published"], $newPost["title"], $newPost["body"], $newPost["date_last_edit"], $newPost["attatched_image"], $newPost["media_iframe"], $newPost["id"]]);
  }

  public function deleteBlogPost($postId)
  {
    // delete cover image
    $coverImage = DB::run("SELECT attatched_image FROM post WHERE id = ?", [$postId])->fetchColumn();
    if (isset($coverImage)) { UTILS::deleteFile($coverImage); }
    // delete database entry
    DB::run("DELETE FROM post WHERE id = ?", [$postId]);
  }  

  public function getNumberOfBlogPosts()
  {
    return DB::run("SELECT count(*) FROM post")->fetchColumn();
  }

  public function getAdminBlogPostsTable()
  {
    $stmt = DB::run("SELECT * FROM post ORDER BY date_created DESC");
    //create table head
    $html = '
      <table class="admin-post-list table table-striped table-hover text-center">
      <tr>
        <th class=" text-center">Title</th>
        <th class=" text-center">Published</th>
        <th class=" text-center">Created</th>
        <th></th>
      </tr>
    ';
    // append table rows
    while ($post = $stmt->fetch(PDO::FETCH_LAZY))
    {
      $published = ( $post['published'] ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' );
      $html .= "
        <tr data-post-id='{$post['id']}' >
          <td class='post-title' >{$post['title']}</td>
          <td>{$published}</td>
          <td>{$post['date_created']}</td>
          <td>
            <form style='display: inline-block;' action='edit.php' method='POST' >
              <input class='btn btn-default' type='submit' name='edit' value='Edit'>
              <input type='hidden' name='postId' value='{$post['id']}'>

            </form>
            <form style='display: inline-block;' onsubmit='cmsLib.deleteBlogPost(event);'>
              <input class='btn btn-danger' data-post-id='{$post['id']}' type='submit' name='delete' value='Delete'>
            </form>
          </td>
        </tr>
      ";
    }
    // close table tag
    $html .= "
    </table>
    ";
    echo $html;
  }

  public function getPublishedBlogPosts()
  {
    $stmt = DB::run("SELECT * FROM post WHERE published = TRUE ORDER BY date_created DESC");
    $html = "";
    while ($post = $stmt->fetch(PDO::FETCH_LAZY))
    {
      $iframe = strlen($post['media_iframe']) > 0 ? "<hr>". $post['media_iframe'] : "";
      $html .= "
        <div class='panel panel-default blogpost'>
          <div class='panel-heading'>
            <h2 class='panel-title'>{$post["title"]}</h2>
          </div>
          <div class='blogpost-dateposted'> 
            <small>posted on {$post["date_created"]}</small>
          </div>
          <div class='blogpost-image'>
            <img class='imgToCheck' src='img/uploads/{$post["attatched_image"]}'>
          </div>
          <div class='panel-body'>{$post['body']}{$iframe}</div>
        </div>
      ";
    }
    echo $html;
  }

}

?>
