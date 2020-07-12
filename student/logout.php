<?php

session_start();

session_unset();

session_destroy();

header("Location: /lib/student/student_login.php");