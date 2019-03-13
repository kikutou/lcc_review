<?php
/**
 * Created by PhpStorm.
 * User: juteng
 * Date: 2019/03/12
 * Time: 13:44
 */

namespace App\Service;


class CommentService implements CommentServiceInterface
{

    private $site_code = "dlaeaLso";
    private $password = "12345678";

    public function get_comments($topic_code): Array
    {

        $post_date = array(
            "site_code" => $this->site_code,
            "password" => $this->password,
            "topic_code" => $topic_code
        );


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://comments-api.com/api/comments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>json_encode($post_date),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            exit();
        } else {
            return json_decode($response, true);
        }

    }


    public function add_comment($topic_code, Array $comment, Array $items, $user_code = null)
    {

        $post_date = array(
            "site_code" => $this->site_code,
            "password" => $this->password,
            "topic" => array(
                "topic_code" => $topic_code,
            ),
            "comment" => array(
                "title" => $comment["title"],
                "content" => $comment["content"],
                "user_code" => $user_code,
            ),
        );

        if(count($items) > 0) {
            $items_arr = array();

            foreach ($items as $item) {
                $one_item = array();

                $one_item["item_code"] = $item["item_code"];
                $one_item["grade"] = $item["grade"];

                $items_arr[] = $one_item;
            }

            $post_date["items"] = $items_arr;
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://comments-api.com/api/comment/add",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($post_date),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            exit();
        } else {

            $response_arr = json_decode($response, true);

            if(is_array($response_arr) && isset($response_arr["topic_id"])) {
                return true;
            } else {
                return false;
            }

        }

    }

}