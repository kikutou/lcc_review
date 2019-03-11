<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  protected $table = "mtb_categories";

  public static $validation_rules = [
    "category_name" => "required|between:1,15",
    "category_introduction" => "string|between:0,100",
  ];

  public static $validation_messages = [
    "category_name.required" => "カテゴリ名を入力してください。",
    "category_name.between" => ":min以上:max以内のカテゴリ名を入力してください。",
    "category_introduction.string" => "文字を入力してください。",
    "category_introduction.between" => "100字以内の説明を入力してください。",
  ];
  use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //connect posts
    public function post(){
      return $this->hasMany('App\Model\Post','mtb_category_id');
    }
    //connect subscribe mail
    public function subscribemails(){
      return $this->belongsToMany('App\Model\SubscribeMail','subscribe_mail_category', "category_id","subscribe_mail_id");
    }
}
