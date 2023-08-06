function login() {
  var username = document.getElementsByName("username")[0].value;
  var password = document.getElementsByName("password")[0].value;

  // for demonstration,assuming successful login
  if (username === "example" && password === "password") {
    // it will redirect it to the main index.html page
    window.location.href = "index.html";
  } else {
    // Error message displays if entered wrong details
    alert("Invalid username or password. Please try again.");
  }
}

function signUp() {
  var username = document.getElementsByName("username")[0].value;
  var password = document.getElementsByName("password")[0].value;
  var confirmPassword = document.getElementsByName("confirm_password")[0].value;

  // for demonstration, show's a success message when the form is submitted
  if (password === confirmPassword) {
    alert("Account created successfully!");
  } else {
    alert("Passwords do not match. Please try again.");
  }
}
