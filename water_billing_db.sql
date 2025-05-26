

CREATE TABLE `customers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `meter_number` VARCHAR(50) NOT NULL
);

CREATE TABLE `readings` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `customer_id` INT NOT NULL,
  `previous_reading` INT NOT NULL DEFAULT 0,
  `current_reading` INT NOT NULL DEFAULT 0,
  `units_used` INT NOT NULL DEFAULT 0,
  `cost` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `reading_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`) ON DELETE CASCADE
);
