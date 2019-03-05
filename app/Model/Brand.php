<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
      protected $table = "brands";
      public static $validation_rules = [
        "brand_name" => "required|between:1,10",
        "logo_picture" => "required|image",
        "profile_picture" => "required|image",
        "brand_introduction" => "string|between:0,100",
        "home_page" => "required|url",

      ];

      public static $validation_messages = [
        "brand_name.required" => "航空会社名は必ず入力してください。",
        "brand_name.between" => ":min以上:max以内の航空会社名を入力してください。",
        "logo_picture.required" => "図を挿入してください。",
        "logo_picture.image" => "正しい形式の図を挿入してください。",
        "profile_picture.required" => "図を挿入してください。",
        "profile_picture.image" => "正しい形式の図を挿入してください。",
        "brand_introduction.string" => "説明文を必ず入力してください。",
        "brand_introduction.between" => "100字以内の説明を入力してください。",
        "home_page.url" => "正しい形式のurlを入力してください。",
      ];
      use SoftDeletes;

        /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */
        protected $dates = ['deleted_at'];

        //connect comment
        public function comment(){
          return $this->hasMany('App\Model\Comment','brand_id');

        }
        //connect postsbrands
        public function postbrand(){
          return $this->hasMany('App\Model\PostBrand');
        }
        //connect flight
        public function flight(){
          return $this->hasMany('App\Model\Flight','brand_id');
        }
        //connect post
        public function posts(){
          return $this->belongsToMany('App\Model\Post','brand_post');
        }

}
