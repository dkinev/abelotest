<?php
/* Smarty version 4.5.6, created on 2026-04-07 06:30:47
  from '/var/www/src/Views/templates/layouts/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69d4a49717fd51_78253277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '586a46f2124ea7529496aebd7795b0aeaa9ca705' => 
    array (
      0 => '/var/www/src/Views/templates/layouts/main.tpl',
      1 => 1775543445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/header.tpl' => 1,
    'file:layouts/footer.tpl' => 1,
  ),
),false)) {
function content_69d4a49717fd51_78253277 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['title']->value ?? null)===null||$tmp==='' ? "Блог" ?? null : $tmp);?>
</title>

    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="layout">

<?php $_smarty_tpl->_subTemplateRender("file:layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="layout__content">
    <div class="container">
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
