$(document).ready(function() {
	$("#check_available").html(""); // clear it first

	$("#username").blur(function() {
		var un = $("#username").val();
		if (un.length > 2) {
			if (un == "nox") {
				fade_check("images/available.png");
			} else {
				fade_check("images/not_available.png");
			}
		} else {
			$("#check_available").html(""); // clear it
		}
	});
});

function fade_check(src) {
	$("#check_available").fadeOut();
	$("#check_available").html('<img class="signup_check" src=' + src + '>');
	$("#check_available").fadeIn(1000);
}
