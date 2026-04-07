<?php
/* Smarty version 4.5.6, created on 2026-04-07 06:32:55
  from '/var/www/src/Views/templates/post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69d4a517698dc9_26714989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5234d935e07d67d632c87e224034c2f8a7e7cce' => 
    array (
      0 => '/var/www/src/Views/templates/post.tpl',
      1 => 1775543524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/main.tpl' => 1,
  ),
),false)) {
function content_69d4a517698dc9_26714989 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "content", null, null);?>

    <article class="post">

        <!-- Заголовок -->
        <header class="post__header">
            <h1 class="post__title">
                <?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>

            </h1>

            <div class="post__meta">
            <span class="post__views">
                <?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>
 views
            </span>

                <span class="post__date">
                <?php echo $_smarty_tpl->tpl_vars['post']->value['created_at'];?>

            </span>
            </div>
        </header>

        <!-- Изображение -->
        <?php if ($_smarty_tpl->tpl_vars['post']->value['image']) {?>
            <div class="post__image-wrapper">
                <img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
" class="post__image">
            </div>
        <?php }?>

        <!-- Описание -->
        <p class="post__description">
            <?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>

        </p>

        <!-- Контент -->
        <div class="post__content">
            <?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>

        </div>

        <!-- Похожие статьи -->
        <section class="related">

            <div class="related__header">
                <h2 class="related__title">
                    Похожие публикации
                </h2>
            </div>

            <div class="related__grid">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['related']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <article class="card">

                        <img src="/images/sample.jpg" class="card__image" />

                        <div class="card__body">
                            <h3 class="card__title">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

                            </h3>

                            <div class="card__date">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['created_at'];?>

                            </div>

                            <a href="/post/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="card__link">
                                Продолжить читать...
                            </a>
                        </div>

                    </article>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </div>

        </section>

    </article>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->_subTemplateRender("file:layouts/main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('content'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'content')), 0, false);
}
}
