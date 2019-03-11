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
        "brand_introduction" => "string|between:0,500",
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
        "brand_introduction.between" => "500字以内の説明を入力してください。",
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
        public function comments(){
          return $this->hasMany('App\Model\Comment','brand_id');

        }
        //connect postsbrands
        public function postbrands(){
          return $this->hasMany('App\Model\PostBrand');
        }
        //connect flight
        public function flights(){
          return $this->hasMany('App\Model\Flight','brand_id');
        }
        //connect post
        public function posts(){
          return $this->belongsToMany('App\Model\Post','brand_post', "brand_id","post_id");
        }
        //connect subscribe mail
        public function subscribemails(){
          return $this->belongsToMany('App\Model\SubscribeMail','subscribe_mail_brand', "brand_id","subscribe_mail_id");
        }

        public function intro($intro){
          $brand_intro = substr($intro,0,100);
          return $brand_intro;
        }

}
