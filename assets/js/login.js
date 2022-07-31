import { menuSlide, closeMenuOnResize } from "./imports/header.js";

// Form validation
$(document).ready(() => {
	let err = $("p.err");
	$("form").submit(function (e) {
		e.preventDefault();
		let formData = new FormData($("form")[0]);
		let password = formData.get("password");
		let email = formData.get("email");

		if (!password || !email) {
			err.text("Please fill in all credentials");
			err.show();
			return;
		}
		if (!/^[\w][\w\._-]+[\w]@[\w]+\.[\w]{2,3}$/.test(email)) {
			err.text("Please enter a valid email address");
			err.show();
			return;
		}

		// Post to ajax
		$.ajax({
			type: "POST",
			url: "ajax/login.php",
			data: {
				email,
				password,
			},
			success: (data) => {
				if (data == "success") {
					window.location.href = "./dashboard";
				} else if (data == "verify") {
					window.location.href = "./verifications?id=email";
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
