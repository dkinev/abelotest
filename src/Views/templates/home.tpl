{capture name="content"}

    {foreach $categories as $category}
        <section class="category">

            <div class="category__header">
                <h2 class="category__title">
                    {$category.name}
                </h2>

                <a href="/category/{$category.id}" class="category__link">
                    Смотреть все
                </a>
            </div>

            <div class="category__grid">

                {foreach $category.posts as $post}
                    <article class="card">

                        <img src="/images/sample.jpg" class="card__image" />

                        <div class="card__body">
                            <h3 class="card__title">
                                {$post.title}
                            </h3>

                            <div class="card__date">
                                {$post.created_at}
                            </div>

                            <div class="card__text">
                                {$post.description|truncate:100}
                            </div>

                            <a href="/post/{$post.id}" class="card__link">
                                Продолжить читать
                            </a>
                        </div>

                    </article>
                {/foreach}

            </div>

        </section>
    {/foreach}

{/capture}

{include file="layouts/main.tpl" content=$smarty.capture.content}