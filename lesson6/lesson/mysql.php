<?php

require_once "./config.php";

$dblink;

/**
 * подключение к БД с проверкой на ошибки
 */
function dbconnect(){
	global $dblink;

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	extract(DB, EXTR_PREFIX_ALL, 'db');
	$dblink = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

	if (!$dblink)
			die('Ошибка при подключении: ' . mysqli_connect_error());

	return $dblink;
}

/**
 * обработка ошибки БД
 */
function dberror(){
	global $dblink;

	$err = mysqli_error($dblink);

	if ($err)
		die("Ошибка БД: $err");
	else
		return;
}

/**
 * получаем результат запроса к БД
 * передаем признак закрытия соединения, если необходимо
 */
function dbquery($sql, $connection_close = false){
	global $dblink;

	if (!$dblink) dbconnect();

    $sql = strtr(
        mysqli_real_escape_string($dblink, $sql)
        ,array(
            "\r"=>''
            ,"\n"=>''
            ,'\r'=>''
            ,'\n'=>''
            ,"\\'"=>'\''
        )
    );
	$result = mysqli_query($dblink, $sql);

    dberror();
    if ($connection_close) mysqli_close($link);

    $epms = [];
    while ( $row = @mysqli_fetch_assoc($result) )
        $epms[] = $row;

    return $epms;
}
