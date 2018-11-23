<?php
/**
 * Created by PhpStorm.
 * User: tupic98
 * Date: 10/23/18
 * Time: 3:17 AM
 */
$DB_HOST="localhost";
$DB_USER="kenarysed";
$DB_PASS="hlqusedroot";
$DB_NAME="kennary";
$DB_PORT="5432";
$dbconn=
    pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS connect_timeout=5")
or die("Murio");
$options = [
    'cost' => 12,
];
$passErnesto = password_hash('testing', PASSWORD_BCRYPT, $options);
$passNelson = password_hash('root', PASSWORD_BCRYPT, $options);
$passPedro = password_hash('pedrogo14', PASSWORD_BCRYPT, $options);
$passRodrigo = password_hash('qwesed', PASSWORD_BCRYPT, $options);
$passHenry = password_hash('ayudased', PASSWORD_BCRYPT, $options);
$insertRequest = pg_prepare($dbconn, 'insert_req', 'INSERT INTO usuario (nombre_usuario, password_usuario, edad_usuario, correo_usuario, id_genero, id_rol)
    VALUES ($1,$2,$3,$4,$5,$6);');
pg_execute($dbconn,'insert_req',array('Ernesto Cabezas', $passErnesto, 20, 'ecabezas@gmail.com', 1, 1));
pg_execute($dbconn,'insert_req',array('Nelson Castro', $passNelson, 20, 'nc@sed.me', 1, 2));
pg_execute($dbconn,'insert_req',array('Pedro Gómez', $passPedro, 23, 'pedrogo14@gmail.com', 1, 4));
pg_execute($dbconn,'insert_req',array('Henry Gallardo', $passHenry, 20, 'hbanchon@gmail.com', 1, 3));
pg_execute($dbconn,'insert_req',array('Rodrigo Alvarenga', $passRodrigo, 20, 'ralvarenga@gmail.com', 1, 2));

?>