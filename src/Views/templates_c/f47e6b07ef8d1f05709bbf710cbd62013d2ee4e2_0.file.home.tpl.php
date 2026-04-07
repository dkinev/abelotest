<?php
/* Smarty version 4.5.6, created on 2026-04-07 06:34:15
  from '/var/www/src/Views/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69d4a56741a828_88685416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f47e6b07ef8d1f05709bbf710cbd62013d2ee4e2' => 
    array (
      0 => '/var/www/src/Views/templates/home.tpl',
      1 => 1775543653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/main.tpl' => 1,
  ),
),false)) {
function content_69d4a56741a828_88685416 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "content", null, null);?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <section class="category">

            <div class="category__header">
                <h2 class="category__title">
                    <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                </h2>

                <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" class="category__link">
                    Смотреть все
                </a>
            </div>

            <div class="category__grid">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['posts'], 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                    <article class="card">

                        <img src="/images/sample.jpg" class="card__image" />

                        <div class="card__body">
                            <h3 class="card__title">
                                <?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>

                            </h3>

                            <div class="card__date">
                                <?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>

                            </div>

                            <div class="card__text">
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['description'],100);?>

                            </div>

                            <a href="/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="card__link">
                                Продолжить читать
                            </a>
                        </div>

                    </article>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </div>

        </section>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->_subTemplateRender("file:layouts/main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('content'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'content')), 0, false);
}
}
