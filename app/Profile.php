<?php

//14-5. 【応用】 Modelを作成するコマンドで Profile というModelを作成し、
//名前(name)、性別(gender)、趣味(hobby)、自己紹介(introduction)に対して
//Validationをかけるようにしてみましょう。

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hoby' => 'required',
        'introduction' => 'required',
        );
        
        public function profilehistories()
        {
            return $this->hasMany('App\ProfileHistory');
        }
}
