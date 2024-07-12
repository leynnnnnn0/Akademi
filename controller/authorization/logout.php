<?php

session_unset();
session_destroy();
session_start();

header("location: /akademi/index.php/signin");
