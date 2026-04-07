{capture name="content"}

    <article class="post">

        <!-- Заголовок -->
        <header class="post__header">
            <h1 class="post__title">
                {$post.title}
            </h1>

            <div class="post__meta">
            <span class="post__views">
                {$post.views} views
            </span>

                <span class="post__date">
                {$post.created_at}
            </span>
            </div>
        </header>

        <!-- Изображение -->
        {if $post.image}
            <div class="post__image-wrapper">
                <img src="{$post.image}" alt="{$post.title}" class="post__image">
            </div>
        {/if}

        <!-- Описание -->
        <p class="post__description">
            {$post.description}
        </p>

        <!-- Контент -->
        <div class="post__content">
            {$post.content}
        </div>

        <!-- Похожие статьи -->
        <section class="related">

            <div class="related__header">
                <h2 class="related__title">
                    Похожие публикации
                </h2>
            </div>

            <div class="related__grid">

                {foreach $related as $item}
                    <article class="card">

                        <img src="/images/sample.jpg" class="card__image" />

                        <div class="card__body">
                            <h3 class="card__title">
                                {$item.title}
                            </h3>

                            <div class="card__date">
                                {$item.created_at}
                            </div>

                            <a href="/post/{$item.id}" class="card__link">
                                Продолжить читать...
                            </a>
                        </div>

                    </article>
                {/foreach}

            </div>

        </section>

    </article>

{/capture}

{include file="layouts/main.tpl" content=$smarty.capture.content}