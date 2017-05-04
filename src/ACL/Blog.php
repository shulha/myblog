<?php

namespace Myblog\ACL;

use Shulha\Framework\Security\UserContract;
use Myblog\Model\BlogModel;

class Blog
{
    public function canEdit(BlogModel $article, UserContract $user){
        return (in_array('ADMIN', $user->getRoles())) || ($article->author === $user->login);
    }
}