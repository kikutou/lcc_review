<?php

namespace Tests\Unit;

use App\Service\CommentService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAddCommentMethod()
    {
        $service = new CommentService();


        $topic_code = "test_code";
        $comment = array(
            "title" => "test comment title wonderful",
            "content" => "this is a test comment. ignore the content please."
        );

        $items = array(
            array(
                "item_code" => "サービス",
                "grade" => 4
            ),
            array(
                "item_code" => "環境",
                "grade" => 3
            ),
            array(
                "item_code" => "清潔度",
                "grade" => 3
            ),
            array(
                "item_code" => "飲食",
                "grade" => 5
            ),
        );

        $user_code = "kikutestaccount";

        $result = $service->add_comment($topic_code, $comment, $items, $user_code);

        $this->assertTrue($result);
    }


    public function testGetCommentsMethod()
    {
        $service = new CommentService();

        $result = $service->get_comments("not exist topic_code");

        $this->assertTrue(is_array($result));
        $this->assertEquals(count($result), 0);

        $result = $service->get_comments("test_code");
        $this->assertTrue(is_array($result));
        $this->assertTrue(count($result) > 0);
    }
}
