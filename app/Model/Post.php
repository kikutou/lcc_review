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
      "content" => "required"
    ];

    public static $validation_messages = [
      "title.required" => "タイトルを入力してください。",
      "picture.required" => "画像を入れてしてください。",
      "admin_id.required" => "管理者を選択してください。",
      "mtb_category_id.required" => "カテゴリーを選択してください。",
      "content.required" => "内容を入力してください。"
    ];
    //connect category
    public function category(){
      return $this->belongsTo('App\Model\Master\Category','mtb_category_id');
    }

    //connect admin
    public function admin(){
      return $this->belongsTo('App\Model\Admin');
    }

    //connect postsbrands
    public function postsbrands(){
      return $this->hasMany('App\Model\PostsBrands');
    }

    use SoftDeletes;

      /**
       * The attributes that should be mutated to dates.
       *
       * @var array
       */
      protected $dates = ['deleted_at'];


}
