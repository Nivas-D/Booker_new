ALTER TABLE `booker`.`business` 
ADD COLUMN `status` TINYINT NULL DEFAULT 0 AFTER `user_id`;




ALTER TABLE `booker`.`product_orders` 
ADD COLUMN `product_id` INT NOT NULL AFTER `products`;


ALTER TABLE `booker`.`business` 
ADD COLUMN `password` VARCHAR(45) NULL AFTER `updated_at`;

03-11-2023
ALTER TABLE `booker_new`.`services` 
ADD COLUMN `cancellation_limit` VARCHAR(45) NULL DEFAULT NULL AFTER `status`;

