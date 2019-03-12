<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $table = "posts";

    public static $validation_rules = [
      "title" => "required",
      "picture" => "required",
      "admin_id" => "required",
      "mtb_category_id" => "required",
      "post_content" => "required"
    ];

    public static $validation_messages = [
      "title.required" => "タイトルを入力してください。",
      "picture.required" => "画像を入れてしてください。",
      "admin_id.required" => "管理者を選択してください。",
      "mtb_category_id.required" => "カテゴリーを選択してください。",
      "post_content.required" => "内容を入力してください。"
    ];
    //connect category
    public function category(){
      return $this->belongsTo('App\Model\Master\Category','mtb_category_id');
    }

    //connect admin
    public function admin(){
      return $this->belongsTo('App\Model\Admin');
    }
    //connect comments
    public function comments(){
      return $this->hasMany('App\Model\Comment');
    }

    //connect postsbrands
    public function postbrand(){
      return $this->hasMany('App\Model\PostBrand');
    }

    //connect brand
    public function brands(){
      return $this->belongsToMany('App\Model\Brand','brand_post', "post_id", "brand_id");
    }

    use SoftDeletes;

      /**
       * The attributes that should be mutated to dates.
       *
       * @var array
       */
      protected $dates = ['deleted_at'];



}
