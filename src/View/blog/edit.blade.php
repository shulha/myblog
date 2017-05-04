@extends('layout')

@section('content')

<?php if(!empty($article)): ?>
    <article class="uk-article">
        <form action="">
            <div class="uk-margin">
                <input class="uk-input" type="text" name="title" value="<?php echo $article->title; ?>">
            </div>
        </form>

        <p class="uk-article-meta">Written by <a href="#"><?php echo $article->author; ?></a> on <?php echo $article->date; ?></p>

        <div class="uk-margin">
            <textarea class="uk-textarea" rows="10"><?php echo $article->text; ?></textarea>
        </div>

        <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div>
                <a class="uk-button uk-button-text" href="<?php echo route('blog_article', ['id' => $article->id]); ?>"><i uk-icon="icon:arrow-left"></i> Back</a>
            </div>
        </div>

    </article>
<?php else: ?>
<p class="uk-alert uk-alert-primary">
    Sorry, smth went wrong...
</p>
<?php endif; ?>

@stop
