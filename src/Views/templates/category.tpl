{capture name="content"}

    <div class="container">

        <section class="category">

            <div class="category__header">
                <h1 class="category__title">
                    {$category.name}
                </h1>

                <div class="category__controls">
                    <span class="category__sort-label">Сортировать:</span>

                    <a href="?sort=date&sort_order=desc"
                       class="category__sort {if $sort=='date' && $order=='desc'}active{/if}">
                        Дата ↓
                    </a>

                    <a href="?sort=date&sort_order=asc"
                       class="category__sort {if $sort=='date' && $order=='asc'}active{/if}">
                        Дата ↑
                    </a>

                    <a href="?sort=views&sort_order=desc"
                       class="category__sort {if $sort=='views' && $order=='desc'}active{/if}">
                        | Просмотры ↓
                    </a>

                    <a href="?sort=views&sort_order=asc"
                       class="category__sort {if $sort=='views' && $order=='asc'}active{/if}">
                        Просмотры ↑
                    </a>
                </div>
            </div>

            <p class="category__description">
                {$category.description}
            </p>

            <div class="category__grid">
                {foreach $posts as $post}
                    <article class="card">
                        <img src="/images/sample.jpg" class="card__image" />

                        <div class="card__body">
                            <h3 class="card__title">{$post.title}</h3>

                            <div class="card__date">
                                {$post.created_at}
                            </div>

                            <div class="card__text">
                                {$post.description|truncate:120}
                            </div>

                            <div class="card__meta">
                                Views: {$post.views}
                            </div>

                            <a href="/post/{$post.id}" class="card__link">
                                Продолжить читать
                            </a>
                        </div>
                    </article>
                {/foreach}
            </div>

            <div class="pagination">
                {if $pagination.current_page > 1}
                    <a class="pagination__link"
                       href="?page={$pagination.current_page-1}&sort={$sort}&sort_order={$order}">
                        ← Пред.
                    </a>
                {/if}

                <span class="pagination__info">
                Страница {$pagination.current_page} из {$pagination.last_page}
            </span>

                {if $pagination.current_page < $pagination.last_page}
                    <a class="pagination__link"
                       href="?page={$pagination.current_page+1}&sort={$sort}&sort_order={$order}">
                        След. →
                    </a>
                {/if}
            </div>

        </section>

    </div>

{/capture}

{include file="layouts/main.tpl" content=$smarty.capture.content}