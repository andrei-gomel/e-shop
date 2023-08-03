INSERT INTO `users` (`name`, `email`, `phone`, `country_id`, `city`, `created_at`, `updated_at`, `password`, `status`, `role`) 
VALUES
('admin', 'admin@e-shop.by', '+375293576478', 1, 'Гомель', '2023-01-19 23:55:00', '2023-01-19 23:55:00', '$2y$10$4o0boUf0RcMGQrvoFIRdKObnftGAgjwRxc07j92d6s/XwlWsjWhdK', 1, 0);

INSERT INTO `users` (`name`, `email`, `phone`, `country_id`, `city`, `created_at`, `updated_at`, `password`, `status`, `role`) 
VALUES
('tester', 'test@e-shop.by', '+375293576470', 1, 'Гомель', '2023-01-20 09:55:00', '2023-01-20 09:55:00', '$2y$10$4o0boUf0RcMGQrvoFIRdKObnftGAgjwRxc07j92d6s/XwlWsjWhdK', 1, 1);

ALTER USER 'root'@'localhost' IDENTIFIED BY 'qwerty99';
