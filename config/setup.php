<?php

spl_autoload_register(function ($class_name) {
    require $_SERVER['DOCUMENT_ROOT'].'/camagru/classes/'.$class_name . '.php';
});

require_once 'database.php';

// CREATE DATABASE
try {
		// Connect to Mysql server
		$db = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE IF NOT EXISTS $DB_NAME";
		$db->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
	
// CREATE TABLE USERS
try {
		// Connect to DATABASE previously created
		$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE IF NOT EXISTS `users` (
			`id` INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` VARCHAR(50) NOT NULL,
			`mail` VARCHAR(100) NOT NULL,
			`password` VARCHAR(255) NOT NULL,
			`token` VARCHAR(128) NOT NULL,
			`verified` VARCHAR(1) NOT NULL DEFAULT 'N',
      `notification` VARCHAR(1) NOT NULL DEFAULT 'Y'
		)";
		$dbh->exec($sql);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

// CREATE TABLE GALLERY
try {
        // Connect to DATABASE previously created
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS `gallery` (
          `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `userid` INT(11) NOT NULL,
          `img` VARCHAR(100) NOT NULL,
          FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE
        )";
        $dbh->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

// CREATE TABLE COMMENT
try {
        // Connect to DATABASE previously created
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS `comment` (
          `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `userid` INT(11) NOT NULL,
          `galleryid` INT(11) NOT NULL,
          `comment` VARCHAR(255) NOT NULL,
          FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE,
          FOREIGN KEY (galleryid) REFERENCES gallery(id) ON DELETE CASCADE
        )";
        $dbh->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

// CREATE TABLE LIKE
try {
        // Connect to DATABASE previously created
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS `like` (
          `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `userid` INT(11) NOT NULL,
          `galleryid` INT(11) NOT NULL,
          `type` VARCHAR(1) NOT NULL,
          FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE,
          FOREIGN KEY (galleryid) REFERENCES gallery(id) ON DELETE CASCADE
        )";
        $dbh->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

$user = new User($dbh);
$gallery = new Gallery($dbh);
$comment = new Comment($dbh);
$likes = new Likes($dbh);