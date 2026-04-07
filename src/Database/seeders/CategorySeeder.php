<?php

return function (PDO $dbSeed) {
    $dbSeed->exec("
        INSERT INTO categories (name, description) VALUES
        ('Спорт', 'Спортивные новости'),
        ('Жизнь', 'Новости дня'),
        ('Экономика', 'Экономические новости'),
        ('Культура', 'Новости культуры'),
        ('Технологии', 'Новости технологий')
    ");
};
