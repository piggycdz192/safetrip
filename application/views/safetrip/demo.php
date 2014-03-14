<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Autocomplete - Default functionality</title>

<link rel="stylesheet" href="<?php echo(CSS.'jquery-ui-1.10.4.custom.css'); ?>">

	</head>
	<body>
			<input id="other">

<script src="<?php echo(JS.'jquery-1.10.2.js'); ?>"></script>
<script src="<?php echo(JS.'jquery-ui-1.10.4.custom.js'); ?>"></script>
		<script>
		$(function() {
		var availableTags = [
		"ActionScript",
		"AppleScript",
		"Asp",
		"BASIC",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
			];
			$( "#other" ).autocomplete({
			source: availableTags
});
});
</script>
	</body>
</html>