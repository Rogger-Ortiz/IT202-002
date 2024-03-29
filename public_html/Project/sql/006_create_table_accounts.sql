CREATE TABLE IF NOT EXISTS  `Accounts`
(
    `id`             int auto_increment not null,
    `account_number` varchar(12),
    `user_id`        int,
    `balance`        int default 0,
    `account_type`   varchar(255),
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    UNIQUE(`account_number`)
)