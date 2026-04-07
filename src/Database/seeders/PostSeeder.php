<?php

return function (PDO $dbSeed) {

    // Получаем категории
    $categories = $dbSeed->query("SELECT id FROM categories")->fetchAll();

    for ($i = 1; $i <= 10; $i++) {
        // Новый пост
        $dbPost = $dbSeed->prepare("
            INSERT INTO posts (title, description, content, views)
            VALUES (?, ?, ?, ?)
        ");

        $dbPost->execute([
            "Пост № $i",
            "Описание поста $i",
            "Контент поста $i",
            rand(0, 100)
        ]);

        $postId = $dbSeed->lastInsertId();

        // Привязка случайных категории
        shuffle($categories);
        $selected = array_slice($categories, 0, rand(1, 2));

        foreach ($selected as $category) {
            $dbPost = $dbSeed->prepare("
                INSERT INTO post_category (post_id, category_id)
                VALUES (?, ?)
            ");

            $dbPost->execute([$postId, $category['id']]);
        }
    }
};
