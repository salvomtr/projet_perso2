<?php
if (array_key_exists('msg_info', $_SESSION)) {

    echo $_SESSION['msg_info'];
    $_SESSION['msg_info'] = null;
}
?>


<footer class="p-1 footer__main">Footer</footer>

</body>

</html>