@extends('layouts.master')
@section('title', 'Create new article')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Create New Article</h3>
            <hr>
            <form action="{{ route('articles.create') }}" method="post">
                @include('articles.partials.form', [
                    'article' => new App\Article,
                    'submit' => 'Create'
                ])
            </form>
        </div>
    </div>
@endsection


