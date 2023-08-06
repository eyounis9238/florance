// Function to post a discussion to the admin panel
function sendPostToAdminPanel() {
    // ... (same code as in the previous answer, unchanged)
  }
  
  // Add an event listener to the submit button of the form for posting a new discussion
  document.getElementById("post-form").addEventListener("submit", function (event) {
    event.preventDefault();
    sendPostToAdminPanel();
  });
  