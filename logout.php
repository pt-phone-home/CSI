<?php
require 'components/init.php';

Auth::logout();

header('Location:/csi/admin-page.php');

