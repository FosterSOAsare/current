import { menuSlide, closeMenuOnResize } from "./imports/header.js";

// Form validation
$(document).ready(() => {
	let err = $("p.err");
	$("form").submit(function (e) {
		e.preventDefault();
		let formData = new FormData($("form")[0]);
		let password = formData.get("password");
		let passwordRepeat = formData.get("confirmpassword");
		let firstname = formData.get("firstname");
		let lastname = formData.get("lastname");
		let email = formData.get("email");
		let profile = formData.get("profile");

		if (!password || !email || !firstname || !lastname || !passwordRepeat) {
			err.text("Please fill in all credentials");
			err.show();
			return;
		}
		if (!profile) {
			err.text("Please choose a profile picture");
			err.show();
			return;
		}
		if (!/^[A-Za-z]+$/.test(firstname) || !/^[A-Za-z]+$/.test(lastname)) {
			err.text("Please enter valid name formats");
			err.show();
			return;
		}
		if (password.length < 8) {
			err.text("Password is too short ");
			err.show();
			return;
		}
		if (password != confirmPassword) {
			err.text("Passwords do not match");
			err.show();
			return;
		}
		if (!/^[\w][\w\._-]+[\w]@[\w]+\.[\w]{2,3}$/.test(email)) {
			err.text("Please enter a valid email address");
			err.show();
			return;
		}

		// formData.append("file", file_data);
		// Post to ajax
		$.ajax({
			type: "POST",
			url: "ajax/register.php",
			data: formData,
			cache: false,
			processData: false,
			dataType: "script",
			contentType: false,
			success: (data) => {
				if (data == "success") {
					window.location.href = "./dashboard";
				} else {
					err.text(data);
					err.show();
				}
			},
		});
	});

	$("form input").focus(() => {
		err.hide();
	});
});
