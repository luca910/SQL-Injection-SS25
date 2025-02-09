<?php
/*
 * This file is used to configure the database connection.
 *
 * PHP version 8.1
 *
 * @category API
 * @package  None
 * @since    1.0
 * @author   Luca Krawczyk
 *
 */
session_start();

global $pdo; // Declare $pdo as global

include_once "response.php"; // Include the response helper

    // Create connection mariaDB
    try {
        $pdo = new PDO('mysql:host=mariadb;dbname=app', 'docker', getenv('MYSQL_PASSWORD'));
    } catch (PDOException $e) {
        response(500, $e->getMessage());

    }