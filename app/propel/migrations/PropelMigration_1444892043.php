<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1444892043.
 * Generated on 2015-10-15 06:54:03 
 */
class PropelMigration_1444892043
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

ALTER TABLE `bitacora` CHANGE `created_at` `created_at` DATETIME;

ALTER TABLE `bitacora` CHANGE `updated_at` `updated_at` DATETIME;

ALTER TABLE `menu` CHANGE `created_at` `created_at` DATETIME;

ALTER TABLE `menu` CHANGE `updated_at` `updated_at` DATETIME;

ALTER TABLE `perfil` CHANGE `created_at` `created_at` DATETIME;

ALTER TABLE `perfil` CHANGE `updated_at` `updated_at` DATETIME;

ALTER TABLE `perfil_menu` CHANGE `created_at` `created_at` DATETIME;

ALTER TABLE `perfil_menu` CHANGE `updated_at` `updated_at` DATETIME;

ALTER TABLE `usuario` CHANGE `created_at` `created_at` DATETIME;

ALTER TABLE `usuario` CHANGE `updated_at` `updated_at` DATETIME;

ALTER TABLE `usuario`
    ADD `avatar` TEXT AFTER `record_password`;

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

ALTER TABLE `bitacora` CHANGE `created_at` `created_at` DATETIME NOT NULL;

ALTER TABLE `bitacora` CHANGE `updated_at` `updated_at` DATETIME NOT NULL;

ALTER TABLE `menu` CHANGE `created_at` `created_at` DATETIME NOT NULL;

ALTER TABLE `menu` CHANGE `updated_at` `updated_at` DATETIME NOT NULL;

ALTER TABLE `perfil` CHANGE `created_at` `created_at` DATETIME NOT NULL;

ALTER TABLE `perfil` CHANGE `updated_at` `updated_at` DATETIME NOT NULL;

ALTER TABLE `perfil_menu` CHANGE `created_at` `created_at` DATETIME NOT NULL;

ALTER TABLE `perfil_menu` CHANGE `updated_at` `updated_at` DATETIME NOT NULL;

ALTER TABLE `usuario` CHANGE `created_at` `created_at` DATETIME NOT NULL;

ALTER TABLE `usuario` CHANGE `updated_at` `updated_at` DATETIME NOT NULL;

ALTER TABLE `usuario` DROP `avatar`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}