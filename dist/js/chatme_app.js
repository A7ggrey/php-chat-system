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
function signupForm() {}

//full name, email and username authentication
function updateProfile() {}

//education, skills, work, location and bios
function updateAboutMe() {}

//message input authentication
function sendMessage() {}