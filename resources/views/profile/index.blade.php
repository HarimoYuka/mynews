@extends('layouts.profile_front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="name p-2">
                                    <h1>{{ str_limit($headline->name, 1000)}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="id mx-auto">{{str_limit($headline->gender, 1000) }}
                        </div>
                        <div class="col-md-6">
                            <p class="hoby mx-auto">{{ str_limit($headline->hoby, 1000) }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="introdction mx-auto">{{ str_limit($headline->introdcution, 1000) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <siv class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="id">
                                    {{ str_limit($post->id, 1000) }}
                                </div>
                                <div class="name">
                                    {{ str_limit($post->name, 1000) }}
                                </div>
                                <div class="gender mt-3">
                                    {{ str_limit($post->gender, 1000)}}
                                </div>
                                <div class="hoby mt-3">
                                    {{ str_limit($post->hoby, 1000) }}
                                </div>
                                <div class="introduction mt-3">
                                    {{ str_limit($post->introduction, 1500)}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection