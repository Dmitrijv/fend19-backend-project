# FEND19 - Backend – Project: Content Management System

![preview](readme/cms-preview.jpg)

## Description

The purpose of this project is to develop a simple CMS application that lets you create, read, update and delete blog posts. The system is written in PHP, JavaScript and uses a MySQL database to persist data. The work was performed in a group of two students.

## Implementation

Functions that create, manipulate and help display blog data are collected in CMS class.

```html
<section id="main">
  <div class="container">
    <section class="post-list">
      <?php CMS::getPublishedBlogPostsHtml(); ?>
    </section>
  </div>
</section>
```

Running SQL queries on the database is done with the help of DB class that follows the Singleton pattern. A single PDO connection is created and used through the system to avoid opening and closing new connections unnecessarily.

For example, to get the number of blog posts in the database you can simply run:

```php
  $n = DB::run("SELECT count(*) FROM post")->fetchColumn();
```

User input is collected using HTML forms and is then passed on to php scripts via POST requests. Input data is validated on both Frontend and Backend layers.

```html
<input type="file" name="attatched_image" id="post-attatched_image" accept=".jpg,.jpeg,.png,.gif" required />
```

```php
function isAttatchedImageValid($target_file) {
  // check if format is allowed
  $allowedExtentions = ["gif", "jpeg", "jpg", "png"];
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if(!in_array($imageFileType, $allowedExtentions)) {
```

If input validation fails on the Frontend layer then data can not be submitted at all. If user manages to avoid performing Frontend validation and the Backend validation fails user is redirected to a error page.

### Administrator Area

Blog management is done with Administrator tool which is located in the "admin" subfolder which is protected by a Directory Access lock (grade requirement).

![preview](readme/cms-login.png)

Once correct credentials are entered, the user gets access to the Administrator panel from which you can see a list of all blog posts stored in the database.

![preview](readme/cms-admin.png)

### Creating a new post

If a user's input passes validation a new database entry is then created and the user is redirected back to the admin page where he/she can see the updated list of posts.

```php
  $newBlogPost = [];
  $newBlogPost['date_created'] = date("Y-m-d H:i:s", time());
  // build the rest of the blog post
  CMS::createBlogPost($newBlogPost);
  header("Location: ../index.php");
  die;
```

In order to convert body text in to simple HTML, the input string is segmented into lines by using "new line" symbols as separators. Each line is then wrapped with a < p > tag before being stored in the database.

```php
public static function formStringToParagraphHtml($string) {
    function wrapLineInParagraph($html, $line)  {
      if ($line == "") return $html;
      return $html .= "<p>".$line."</p>";
    }
    $lines = explode("\r\n", $string);
    return array_reduce($lines, "wrapLineInParagraph", "");
}
```

If a post is later edited, the process of wrapping new lines into < p > tags has to be reversed before body text can be filled in the input form. This is done by using simple_html_dom library.

```php
public static function fromParagraphHtmlToString($html) {
  $dom = str_get_html($html);
  $str = "";
  foreach($dom->find('p') as $p) { $str .= $p->innertext . "\n\r"; }
  return $str;
}
```

### Updating a post

The process of updating an existing blog post is essentially the same as creating a new post. An existing db entry is updated rather than creating a new table row.

### Deleting a post

Blog posts can be deleted from the admin page by pressing the corresponding Delete button. This will trigger a JavaScript function that sends an asynchronous POST request to a php script. If HTTP request returns status is OK the deleted blog post row is removed from the admin panel and the total number of posts in the database is decremented.

```js
deleteBlogPost: function(event) {
  if (confirm("Are you sure?")) {
    const button = event.target.elements.delete;
    const postId = button.dataset.postId;
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // update post counter
        let oldCount = Number(document.querySelector(`span.total-post-count`).textContent);
        document.querySelector(`span.total-post-count`).textContent = oldCount - 1;
        // remove deleted row
        document.querySelector(`tr[data-post-id="${postId}"]`).remove();
      }
    };
    xmlhttp.open("POST", "php-routines/deleteBlogPost.php?postId=" + postId, true);
    xmlhttp.send();
  }
  event.preventDefault();
}
```
