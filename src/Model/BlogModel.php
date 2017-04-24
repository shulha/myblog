<?php

namespace Myblog\Model;

use Shulha\Framework\Model\Model;


/**
 * Class BlogModel
 * @package Mystore\Model
 */
class BlogModel extends Model
{
    protected $table = 'blog';

    /**
     * Crop the text
     *
     * @param $text
     * @return string
     */
    public static function teaser($text): string{

        return substr($text, 0, 120) . '...';
    }
}