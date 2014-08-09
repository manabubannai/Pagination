<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<div id="container">
<h1>ページネーションの作成</h1>

<?php

	echo $this->table->generate($records);
	echo $this->pagination->create_links();

?>

</div>
</body>
</html>