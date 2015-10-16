<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1444976136.
 * Generated on 2015-10-16 06:15:36 
 */
class PropelMigration_1444976136
{

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `plan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `descripcion` TEXT,
    `precio` DOUBLE NOT NULL,
    `alumnos` INTEGER NOT NULL,
    `moneda_id` INTEGER NOT NULL,
    `logo_propio` TINYINT(1) DEFAULT 0 NOT NULL,
    `quitar_logo` TINYINT(1) DEFAULT 0 NOT NULL,
    `correo_masivo` TINYINT(1) DEFAULT 0 NOT NULL,
    `correo_info` TINYINT(1) DEFAULT 0 NOT NULL,
    `crear_examenes` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `plan_FI_1` (`moneda_id`)
) ENGINE=MyISAM;

CREATE TABLE `moneda`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `simbolo` VARCHAR(5) NOT NULL,
    `conversion` DOUBLE NOT NULL,
    `base` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `plan`;

DROP TABLE IF EXISTS `moneda`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}