<?php

print_r($_POST);

?>
<form action="" method="post" name="form1">
    <input name="test[]" type="text" size="20" value="123">
    <input name="test[]" type="text" size="20" value="1233">
    <input name="test[]" type="text" size="20" value="123444">
    <input name="test[]" type="text" size="20" value="12553">

    <input name="submit" type="submit" value="Передать">
</form>
