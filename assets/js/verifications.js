// Form validation and ajax post
$(document).ready(() => {
	$(".submit").click((e) => {
		e.preventDefault();
		let code = $("input[name='code'").val();

		if (!/^[A-Za-z0-9]{8}$/.test(code)) {
			$(".err").text("Please enter a valid code format");
			$(".err").show();
			return;
		}

		$.ajax({
			type: "POST",
			url: "ajax/register.php",
			data: {
				code,
				verifyEmail: true,
			},
			success: (data) => {
				if (data == "success") {
					setTimeout(() => {
						window.location.href = "./login";
					}, 2000);
				} else {
					$(".err").text(data);
					$(".err").show();
				}
			},
		});
	});

	$("form input").focus(() => {
		$(".err").text("");
		$(".err").hide();
	});
});

// Resend Code

function formatTime(number) {
	let minutes = Math.floor(number / 60);
	let seconds = number % 60;
	return `${formatNumber(minutes)}:${formatNumber(seconds)}`;
}

function formatNumber(number) {
	if (number < 10) {
		return `0${number}`;
	}
	return number;
}

function countDown(start, element) {
	let count = setInterval(() => {
		if (start == 0) {
			clearInterval(count);
			element.removeAttr("disabled");
			return;
		}
		element.text(formatTime(start - 1));
		start -= 1;

		localStorage.setItem("emailVerificationTime", start);
	}, 1000);
}
$(document).ready(() => {
	let resendCode = $(".resendCode");
	resendCode.click((e) => {
		e.preventDefault();
		let eligible = true;
		if (!localStorage.getItem("emailVerificationTime")) {
			localStorage.setItem("emailVerificationTime", 200);
			eligible = true;
		} else {
			if (+localStorage.getItem("emailVerificationTime") == 0) {
				let rand = Math.ceil(Math.random() * (5 * 60));
				localStorage.setItem("emailVerificationTime", rand);
				eligible = true;
			} else {
				eligible = false;
			}
		}

		let timeLeft = +localStorage.getItem("emailVerificationTime");

		resendCode.text(formatTime(timeLeft));
		resendCode.attr("disabled", "disabled");

		if (eligible) {
			$.ajax({
				type: "POST",
				url: "ajax/register.php",
				data: {
					resendCode: true,
				},
				success: (data) => {
					if (data == "success") {
						setTimeout(() => {
							// window.location.href = "./login";
							// Show alert that email has been sent
						}, 2000);
					} else if (data == "resent") {
						// Alert here
					} else {
						$(".err").text(data);
						$(".err").show();
					}
				},
			});
		}

		countDown(timeLeft, resendCode);
	});
});
