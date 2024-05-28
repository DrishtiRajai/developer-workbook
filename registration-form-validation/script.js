function validation(event) {
  var name = document.getElementById("name");
  var nameValue = name.value.trim();
  var email = document.getElementById("email");
  var emailValue = email.value.trim();
  var password = document.getElementById("password");
  var passwordValue = password.value;
  var phone = document.getElementById("phone");
  var phoneValue = phone.value.trim();
  var zipcode = document.getElementById("zip");
  var zipValue = zipcode.value;
  var genderSelected = false;
  var radios = document.getElementsByName("gender");
  event.preventDefault();

  // Validate name field
  if (nameValue === "") {
    name.classList.add("error");

    // Create error message if it doesn't exist
    if (
      !name.nextElementSibling ||
      !name.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Name cannot be empty";
      errorMessage.classList.add("error-message");
      name.parentNode.insertBefore(errorMessage, name.nextSibling);
    }
  } else {
    // Remove error styling and message if name is not empty
    name.classList.remove("error");
    var errorMessage = name.nextElementSibling;
    if (errorMessage && errorMessage.classList.contains("error-message")) {
      errorMessage.parentNode.removeChild(errorMessage);
    }
  }

  // Validate email field
  if (emailValue === "") {
    email.classList.add("error");
    if (
      !email.nextElementSibling ||
      !email.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Email cannot be empty";
      errorMessage.classList.add("error-message");
      email.parentNode.insertBefore(errorMessage, email.nextSibling);
    }
  } else if (!validateEmail(emailValue)) {
    // Check if email format is valid
    event.preventDefault(); // Prevent form submission
    email.classList.add("error");
    if (
      !email.nextElementSibling ||
      !email.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Please enter a valid email address";
      errorMessage.classList.add("error-message");
      email.parentNode.insertBefore(errorMessage, email.nextSibling);
    }
  } else {
    // Remove error styling and message if email is not empty and valid
    email.classList.remove("error");
    var errorMessage = email.nextElementSibling;
    if (errorMessage && errorMessage.classList.contains("error-message")) {
      errorMessage.parentNode.removeChild(errorMessage);
    }
  }

  // Validate password field
  if (passwordValue === "") {
    password.classList.add("error");
    if (
      !password.nextElementSibling ||
      !password.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Password cannot be empty";
      errorMessage.classList.add("error-message");
      password.parentNode.insertBefore(errorMessage, password.nextSibling);
    }
  } else if (passwordValue.length < 6) {
    event.preventDefault(); // Prevent form submission
    password.classList.add("error");
    if (
      !password.nextElementSibling ||
      !password.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Password must be at least 6 characters long";
      errorMessage.classList.add("error-message");
      password.parentNode.insertBefore(errorMessage, password.nextSibling);
    }
  } else {
    // Remove error styling and message if password is not empty and valid
    password.classList.remove("error");
    var errorMessage = password.nextElementSibling;
    if (errorMessage && errorMessage.classList.contains("error-message")) {
      errorMessage.parentNode.removeChild(errorMessage);
    }
  }
  if (phoneValue === "") {
    phone.classList.add("error");
    if (
      !phone.nextElementSibling ||
      !phone.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Phone number cannot be empty";
      errorMessage.classList.add("error-message");
      phone.parentNode.insertBefore(errorMessage, phone.nextSibling);
    }
  } else if (!/^\d{10}$/.test(phoneValue)) {
    // Check if phone number contains exactly 10 digits
    event.preventDefault(); // Prevent form submission
    phone.classList.add("error");
    if (
      !phone.nextElementSibling ||
      !phone.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Phone number must be 10 digits";
      errorMessage.classList.add("error-message");
      phone.parentNode.insertBefore(errorMessage, phone.nextSibling);
    }
  } else {
    // Remove error styling and message if phone number is valid
    phone.classList.remove("error");
    var errorMessage = phone.nextElementSibling;
    if (errorMessage && errorMessage.classList.contains("error-message")) {
      errorMessage.parentNode.removeChild(errorMessage);
    }
  }

  //Checking for zipcode

  if (zipValue === "") {
    zipcode.classList.add("error");
    if (
      !zipcode.nextElementSibling ||
      !zipcode.nextElementSibling.classList.contains("error-message")
    ) {
      var errorMessage = document.createElement("p");
      errorMessage.textContent = "Zipcode cannot be empty";
      errorMessage.classList.add("error-message");
      zipcode.parentNode.insertBefore(errorMessage, zipcode.nextSibling);
    }
  } else {
    // Remove error styling and message if zipcode is not empty
    zipcode.classList.remove("error");
    var errorMessage = zipcode.nextElementSibling;
    if (errorMessage && errorMessage.classList.contains("error-message")) {
      errorMessage.parentNode.removeChild(errorMessage);
    }
  }

  for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
      genderSelected = true;
      break;
    }
  }

  if (!genderSelected) {
    var genderLabel = document.querySelector("label[for='gender']");
    genderLabel.classList.add("error"); // Add error class to label
    isValid = false;
  } else {
    var genderLabel = document.querySelector("label[for='gender']");
    genderLabel.classList.remove("error"); // Remove error class from label if selected
  }
}

// Function to validate email format
function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

// Listen for input events on the name input element
document.getElementById("name").addEventListener("input", validation);

// Listen for input events on the email input element
document.getElementById("email").addEventListener("input", validation);

// Listen for input events on the password input element
document.getElementById("password").addEventListener("input", validation);

var form = document.getElementById("myform");
form.addEventListener("submit", validation);
