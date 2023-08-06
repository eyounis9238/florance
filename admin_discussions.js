// Function to handle post approval in the admin panel
function approvePost(button) {
    const row = button.parentNode.parentNode;
    const postTitle = row.querySelector(".post-title").innerHTML;
    const postAuthor = row.querySelector(".post-author").innerHTML;
    const postContent = row.querySelector(".post-content").innerHTML;
  
    // Perform any additional logic here to process the approved post
    // For example, you can send the approved post data to the server using AJAX
  
    // Remove the row from the table
    row.remove();
  }
  