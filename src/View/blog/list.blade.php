@extends('layout')

@section('content')

<?php if(!empty($articles)): ?>
    <?php foreach($articles as $article): ?>
    <article class="uk-article">
         <h1 class="uk-article-title"><a class="uk-link-reset" href=""><?php echo $article->title; ?></a></h1>

         <p class="uk-article-meta">Written by <a href="#"><?php echo $article->author; ?></a> on <?php echo $article->date; ?></p>

         <p class="uk-text-lead"><?php echo \Myblog\Model\BlogModel::teaser($article->text); ?></p>

         <p><?php //echo \Myblog\Model\BlogModel::teaser($article->text); ?></p>

         <div class="uk-grid-small uk-child-width-auto" uk-grid>
             <div>
                 <a class="uk-button uk-button-text" href="<?php echo route('blog_article', ['id' => $article->id]); ?>">Read more</a>
             </div>
         </div>

    </article>
    <?php endforeach; ?>
<?php else: ?>
<p class="uk-alert uk-alert-primary">
    Sorry, there are nothing to display yet...
</p>
<?php endif; ?>

@stop