<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	Here is your AD Code: {{ $id }}
	Here is a link to your ad: {{ url("user/dashboard/ads/" . $id) }}

	If you want to edit or delete your ad, log in to your account.

	---
	Thanks for using {{ url() }}
	{{ url() }}
</body>
</html>