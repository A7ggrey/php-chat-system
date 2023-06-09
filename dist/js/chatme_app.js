/*

form validation of all forms contained in this project chat me

*/

//email and password authentication
function loginForm() {
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;

	if (email == '' || email == null) {

		alert('Email is required!');
		return false;
	}

	if (password == '' || password == null) {

		alert('Password is required!');
		return false;
	}
}

//full name, email, username, password and confirm password authentication
function signupForm() {
	var fullName = document.getElementById('fullName').value;
	var email = document.getElementById('email').value;
	var userName = document.getElementById('userName').value;
	var password = document.getElementById('password').value;
	var passwordTwo = document.getElementById('passwordTwo').value;

	if (fullName == '' || fullName == null) {
		alert('Full Name is required!');
		return false;
	}

	if (email == '' || email == null) {
		alert('Email is required!');
		return false;
	}

	if (userName == '' || userName == null) {
		alert('username field is required!');
		return false;
	}

	if (password == '' || password == null) {
		alert('Password is required');
		return false;
	}

	if (password != passwordTwo) {
		alert('Passwords do not match. Try again!');
		return false;
	}
}


//update profile photo authentication
function updateProfilePhoto() {
	var image = document.getElementById('image').value;

	if (image == '' || image == null) {

		alert('Choose a photo!');
		return false;
	}
}

//profile photo, full name, email and username authentication
function updateProfile() {
	var fullName = document.getElementById('inputName').value;
	var email = document.getElementById('inputEmail').value;
	var userName = document.getElementById('inputUserName').value;

	if (fullName == '' || fullName == null) {

		alert('Full Name is required!');
		return false;
	}

	if (email == '' || email == null) {
		alert('Email is required!');
		return false;
	}

	if (userName == '' || userName == null) {
		alert('Username is required!');
		return false;
	}
}

//education, skills, work, location and bios
function updateAboutMe() {}

//message input authentication
function sendMessage() {}