<h1>登入頁面</h1>
<?php

if(isset($_GET['error'])){
    echo "<span style='color:red'>";
    echo $_GET['error'];
    echo "</span>";
}

?>
<form action="check.php" method="post">
    <div>
        <label for="acc">帳號:</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="pw">密碼:</label>
        <input type="password" name="pw" id="pw">
    </div>
    <div>
        <input type="submit" value="登入">
    </div>


</form>