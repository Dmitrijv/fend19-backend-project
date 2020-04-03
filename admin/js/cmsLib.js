cmsLib = (function() {
  const info = "This library contains functions that trigger PHP routines asynchronously.";
  const version = "0.1";

  let cmsLib = {
    toggleBlogPost: function(event) {
      const button = event.target;
      const postId = button.dataset.postId;
      const isPublished = event.target.checked;

      // console.log(event);
      console.log({ button, postId, isPublished });

      // TODO
      // const xmlhttp = new XMLHttpRequest();
      // xmlhttp.onreadystatechange = function() {
      //   if (this.readyState == 4 && this.status == 200) {

      //   }
      // };
      // xmlhttp.open("POST", "php-routines/toggleBlogPost.php?postId=" + postId, true);
      // xmlhttp.send();

      event.preventDefault();
    },
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
  };
  return cmsLib;
})();
