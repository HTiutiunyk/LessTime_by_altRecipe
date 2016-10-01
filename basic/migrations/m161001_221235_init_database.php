<?php

use yii\db\Migration;

class m161001_221235_init_database extends Migration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE users
            (
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(32) NOT NULL,
                job_id INT(11),
                phone_number VARCHAR(50),
                full_name VARCHAR(128),
                contacts TEXT
            );
            CREATE UNIQUE INDEX users_id_uindex ON users (id);
            CREATE UNIQUE INDEX users_username_uindex ON users (username);
            CREATE TABLE roles
            (
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                title VARCHAR(128) NOT NULL,
                system_tag VARCHAR(128)
            );
            CREATE UNIQUE INDEX roles_id_uindex ON roles (id);
            CREATE TABLE jobs
            (
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                title VARCHAR(128) NOT NULL
            );
            CREATE UNIQUE INDEX jobs_id_uindex ON jobs (id);
            CREATE TABLE user_roles
            (
                user_id INT(11) NOT NULL,
                role_id INT(11) NOT NULL,
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT
            );
            CREATE UNIQUE INDEX user_roles_id_uindex ON user_roles (id);
            CREATE TABLE projects
            (
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                title VARCHAR(256) NOT NULL,
                description LONGTEXT
            );
            CREATE UNIQUE INDEX projects_id_uindex ON projects (id);
            CREATE TABLE attachments
            (
                title VARCHAR(128) NOT NULL,
                path TEXT NOT NULL,
                table_name VARCHAR(128) NOT NULL,
                row_id INT(11) NOT NULL,
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT
            );
            CREATE UNIQUE INDEX attachments_id_uindex ON attachments (id);
            CREATE TABLE stages
            (
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                project_id INT(11) NOT NULL,
                title VARCHAR(1024) NOT NULL,
                description LONGTEXT,
                `order` INT(11)
            );
            CREATE UNIQUE INDEX stages_id_uindex ON stages (id);
            CREATE TABLE tasks
            (
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL,
                description TEXT,
                user_id INT(11),
                soft_deadline TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                hard_deadline TIMESTAMP DEFAULT '0000-00-00 00:00:00' NOT NULL,
                estimated_time INT(11),
                actual_time INT(11),
                priority INT(11)
            );
            CREATE UNIQUE INDEX task_id_uindex ON tasks (id);
            CREATE TABLE comments
            (
                id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                text LONGTEXT,
                user_id INT(11)
            );
            CREATE UNIQUE INDEX comments_id_uindex ON comments (id);        
        ");
    }

    public function down()
    {
        echo "m161001_221235_init_database cannot be reverted.\n";

        return false;
    }
}
