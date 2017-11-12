<?php require 'header.php'; ?>

<?php
require 'dbConnect.php';

$sql = "SELECT posts.post_id, posts.post_name, posts.post_text, posts.date, users.nickname FROM posts INNER JOIN users ON posts.user_id=users.user_id WHERE posts.post_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_GET['post_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	printf ("<b>%s</b> <br> %s <br> ", $row["post_name"], $row["post_text"]);
 	printf("Створено користувачем %s, %s <br><br>", $row["nickname"], date("d.m.Y", strtotime($row["date"])));
 }
?>

<?php if (isset($_SESSION['id'])) { ?>
<a href="bla.php">Додати коментар</a>
<?php } ?>

<!-- <a href="#openModal">Открыть модальное окно</a>
<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Закрыть" class="close">X</a>
		<h2>Модальное окно</h2>
		<p>Пример простого модального окна, которое может быть создано с использованием CSS3.</p>
		<p>Его можно использовать в широком диапазоне, начиная от вывода сообщений и заканчивая формой регистрации.</p>
	</div>
</div> -->



<?php
echo "<p><b>Коментарі:</b></p>";
$sql = "SELECT users.nickname, users.user_id, users.group_id, comments.comment, comments.date, comments.post_id FROM comments INNER JOIN users ON comments.user_id=users.user_id WHERE comments.post_id=?";
$stmt = mysqli_stmt_init($dbLink);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_GET['post_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	printf ("<p><b>%s</b> %s <br> %s </p> ", $row["nickname"], date("d.m.Y H:m:s", strtotime($row["date"])), $row["comment"]);
 	if (isset($_SESSION['id']) AND $_SESSION['group_id'] == '1') {
 		echo "редагувати ";
 		echo "видалити";
 	} elseif (isset($_SESSION['id']) AND $_SESSION['id'] == $row['user_id']) {
 		echo "редагувати ";
 		echo "видалити";
 	}
 }

mysqli_stmt_close($stmt);
mysqli_close($dbLink);
?>

<!-- <textarea id="input" name="input"></textarea> -->

<?php require 'footer.php'; ?>