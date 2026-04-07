<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{$title|default:"Блог"}</title>

    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="layout">

{include file="layouts/header.tpl"}

<main class="layout__content">
    <div class="container">
        {$content}
    </div>
</main>

{include file="layouts/footer.tpl"}

</body>
</html>