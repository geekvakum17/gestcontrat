<?php

function user_connected() {
    return (isset($_SESSION['login']) && !empty($_SESSION['login']) && $_SESSION['login']==true) ? true : false;
}
