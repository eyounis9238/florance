// Add event listener to the form for submission
var postForm = document.getElementById('post-form');
postForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission behavior

  // Get form values
  var title = document.getElementById('title').value;
  var author = document.getElementById('author').value;
  var content = document.getElementById('contentInput').value;

  // Create a new post
  var post = document.createElement('div');
  post.className = 'post';

  // ... (previous code for creating post header and content)

  // Create the post button and add event listener
  var postButton = document.createElement('button');
  postButton.className = 'post-button';
  postButton.textContent = 'Post a Reply';

  postButton.addEventListener('click', function() {
    console.log('Reply button clicked');
  });

  // Append post button to the post element
  post.appendChild(postButton);

  // Append the post element to the discussion container
  var discussionContainer = document.querySelector('.discussion-container');
  discussionContainer.appendChild(post);

  // Clear form values after submission
  document.getElementById('title').value = '';
  document.getElementById('author').value = '';
  document.getElementById('contentInput').value = '';
});
