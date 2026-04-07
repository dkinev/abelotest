<?php

return function (PDO $pdo) {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS post_category (
            post_id INT NOT NULL,
            category_id INT NOT NULL,

            PRIMARY KEY (post_id, category_id),

            CONSTRAINT fk_post
                FOREIGN KEY (post_id)
                REFERENCES posts(id)
                ON DELETE CASCADE,

            CONSTRAINT fk_category
                FOREIGN KEY (category_id)
                REFERENCES categories(id)
                ON DELETE CASCADE
        )
    ");
};
