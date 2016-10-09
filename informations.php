<?php
/*phpinfo();*/
/*Version de php: 5.6.14
Thu Jun 18 00:27:10 UTC 2015
   $_SERVER*/
include 'entete.php';
include 'array_to_table.php';
echo entete('$_SERVER');
echo "<body>";
echo array_to_table($_SERVER, 'Variable superglobale');
?>
</body>
</html>
