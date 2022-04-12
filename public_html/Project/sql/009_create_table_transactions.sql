CREATE TABLE IF NOT EXISTS  `Transactions`
(
    `id`                int auto_increment not null,
    `account_src`       INT,
    `account_dest`      INT,
    `balance_change`    int default 0,
    `transaction_type`  varchar(255),
    `memo`              varchar(255),
    `expected_total`    int,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
)