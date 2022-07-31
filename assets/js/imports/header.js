export function menuSlide() {
	$(document).ready(() => {
		$(".menu_btn").click(() => {
			$("aside").animate(
				{
					left: "0",
				},
				500
			);
		});
		$(".closeMenu").click(() => {
			$("aside").animate(
				{
					left: "-100%",
				},
				500
			);
		});
	});
}
menuSlide();

// Close menu when the page is resized to a larger screen
export function closeMenuOnResize() {
	$(document).ready(() => {
		$(window).resize(() => {
			if ($(window).width() > 1240) {
				if ($("aside").css("left") == "0px") {
					$("aside").animate(
						{
							left: "-100%",
						},
						500
					);
				}
			}
		});
	});
}

closeMenuOnResize();
