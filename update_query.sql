ALTER TABLE `booker`.`business` 
ADD COLUMN `status` TINYINT NULL DEFAULT 0 AFTER `user_id`;