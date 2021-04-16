<?php
    include_once 'snippets/session.php';
    session_destroy();
    header('Location: index.php');