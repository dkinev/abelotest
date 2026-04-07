<?php
/* Smarty version 4.5.6, created on 2026-04-07 06:34:49
  from '/var/www/src/Views/templates/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69d4a589be13e7_10603314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac11bac04783a107de3c0c3eb58c06f600f9ecae' => 
    array (
      0 => '/var/www/src/Views/templates/category.tpl',
      1 => 1775543688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/main.tpl' => 1,
  ),
),false)) {
function content_69d4a589be13e7_10603314 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "content", null, null);?>

    <div class="container">

        <section class="category">

            <div class="category__header">
                <h1 class="category__title">
                    <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                </h1>

                <div class="category__controls">
                    <span class="category__sort-label">Сортировать:</span>

                    <a href="?sort=date&sort_order=desc"
                       class="category__sort <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'date' && $_smarty_tpl->tpl_vars['order']->value == 'desc') {?>active<?php }?>">
                        Дата ↓
                    </a>

                    <a href="?sort=date&sort_order=asc"
                       class="category__sort <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'date' && $_smarty_tpl->tpl_vars['order']->value == 'asc') {?>active<?php }?>">
                        Дата ↑
                    </a>

                    <a href="?sort=views&sort_order=desc"
                       class="category__sort <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'views' && $_smarty_tpl->tpl_vars['order']->value == 'desc') {?>active<?php }?>">
                        | Просмотры ↓
                    </a>

                    <a href="?sort=views&sort_order=asc"
                       class="category__sort <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'views' && $_smarty_tpl->tpl_vars['order']->value == 'asc') {?>active<?php }?>">
                        Просмотры ↑
                    </a>
                </div>
            </div>

            <p class="category__description">
                <?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>

            </p>

            <div class="category__grid">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                    <article class="card">
                        <img src="/images/sample.jpg" class="card__image" />

                        <div class="card__body">
                            <h3 class="card__title"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h3>

                            <div class="card__date">
                                <?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>

                            </div>

                            <div class="card__text">
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['description'],120);?>

                            </div>

                            <div class="card__meta">
                                Views: <?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>

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

            <div class="pagination">
                <?php if ($_smarty_tpl->tpl_vars['pagination']->value['current_page'] > 1) {?>
                    <a class="pagination__link"
                       href="?page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['current_page']-1;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
&sort_order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
">
                        ← Пред.
                    </a>
                <?php }?>

                <span class="pagination__info">
                Страница <?php echo $_smarty_tpl->tpl_vars['pagination']->value['current_page'];?>
 из <?php echo $_smarty_tpl->tpl_vars['pagination']->value['last_page'];?>

            </span>

                <?php if ($_smarty_tpl->tpl_vars['pagination']->value['current_page'] < $_smarty_tpl->tpl_vars['pagination']->value['last_page']) {?>
                    <a class="pagination__link"
                       href="?page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['current_page']+1;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
&sort_order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
">
                        След. →
                    </a>
                <?php }?>
            </div>

        </section>

    </div>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->_subTemplateRender("file:layouts/main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('content'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'content')), 0, false);
}
}
