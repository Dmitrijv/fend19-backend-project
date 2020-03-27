cmsLib = (function() {
  const info = "This library contains functions that asynchronously trigger PHP routines.";
  const version = "0.1";

  let cmsLib = {
    deleteBlogPost: function(event) {
      if (confirm("Are you sure?")) {
        const postId = event.submitter.dataset.postId;
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
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
