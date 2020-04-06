<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyNews</title>
    </head>
    <body>
        <h1>プロフィール編集画面</h1>
    </body>
    
</html>

/*
resources/views/admin/news/edit.blade.phpを参考にして、プロフィール編集画面用
に、resources/views/admin/profile/edit.blade.php ファイルを作成してください。
このファイルでは layouts/profile.blade.phpファイルを読み込み、
またプロフィールのページであることがわかるように titleとcontentを編集しましょう。
さらに、氏名(name)、性別(gender)、趣味(hobby)、自己紹介欄(introduction)を
入力するフォームを作成してください。 また、formの送信先(<form action=” この部分”>)を、
Admin¥ProfileController の update Action に指定してください。
*/

@extends('layouts.profile')
@section('title', 'プロフィールの編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの編集画面</h2>
                <form action="{{ action('Admin\ProfileController@update') }}"
                method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name"
                            value="{{ $profiles_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gender" rows="20">
                            {{ $profiles_form->body }}</texarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hoby">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hoby" rows="50">
                            {{ $profiles_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="100">
                            {{ $profiles_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profiles_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection