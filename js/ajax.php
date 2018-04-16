<?php

/**
 * Written by INOVEA-CONSEIL <info@inovea-conseil.com>
 * Copyright 2017
 * */
$res = 0;
if (!$res && file_exists("../main.inc.php"))
    $res = @include '../main.inc.php';     // to work if your module directory is into dolibarr root htdocs directory
if (!$res && file_exists("../../main.inc.php"))
    $res = @include '../../main.inc.php';   // to work if your module directory is into a subdir of root htdocs directory
if (!$res && file_exists("../../../main.inc.php"))
    $res = @include '../../../main.inc.php';   // to work if your module directory is into a subdir of root htdocs directory
if (!$res && file_exists("../../../dolibarr/htdocs/main.inc.php"))
    $res = @include '../../../dolibarr/htdocs/main.inc.php';     // Used on dev env only
if (!$res && file_exists("../../../../dolibarr/htdocs/main.inc.php"))
    $res = @include '../../../../dolibarr/htdocs/main.inc.php';   // Used on dev env only
if (!$res)
    die("Include of main fails");
global $conf, $db, $langs, $user;
$langs->load("closeandclone@closeandclone");
require_once(DOL_DOCUMENT_ROOT . '/comm/propal/class/propal.class.php');


$propal = new Propal($db);
$propal->fetch($_POST['idpropal']);
$propal->cloture($user, "3", $langs->trans("PropalCloned"));


