<?php
/**
 * Created by PhpStorm.
 * User: juteng
 * Date: 2019/03/12
 * Time: 13:39
 */

namespace App\Service;


interface CommentServiceInterface
{

    public function get_comments($topic_code) : Array;

    public function add_comment($topic_code, Array $comment, Array $items, $user_code = null);

}