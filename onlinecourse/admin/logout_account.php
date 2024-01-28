<?php
session_start();
$_SESSION['a_login']=="";
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="account_office_panel.php";
</script>
