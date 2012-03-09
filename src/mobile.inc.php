<?php
if (isset($_SESSION['setting_vmode']) && ($_SESSION['setting_vmode'] == "0")) { /* 0 is main */ }
else { if (isset($_SERVER['HTTP_X_PSP_BROWSER'])) header('location: m_index.php'); }
?>