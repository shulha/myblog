@extends('layout')

@section('content')

<?php if(!empty($article)): ?>
    <article class="uk-article">
        <h1 class="uk-article-title">
            <a class="uk-link-reset" href=""><?php echo $article->title; ?></a>
            <?php if($canEdit):?>
                <a class="uk-link" href="<?php echo route('blog_article_edit', ['id' => $article->id]); ?>"><i uk-icon="icon:pencil"></i></a>
            <?php endif; ?>
        </h1>

        <p class="uk-article-meta">Written by <a href="#"><?php echo $article->author; ?></a> on <?php echo $article->date; ?></p>

        <p class="uk-text-lead"><?php echo $article->text; ?></p>

        <p><?php //echo $article->text; ?></p>

        <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div>
                <a class="uk-button uk-button-text" href="<?php echo route('blog'); ?>"><i uk-icon="icon:arrow-left"></i> To all articles</a>
            </div>
        </div>

    </article>
<?php else: ?>
<p class="uk-alert uk-alert-primary">
    Sorry, there are nothing to display yet...
</p>
<?php endif; ?>

@stop