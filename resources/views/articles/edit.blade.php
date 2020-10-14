@extends('layouts.master')
@section('title', 'Edit Article')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit article : {{ $article->title }}</div>
                    <div class="card-body">
                        <form action=" {{ route('articles.edit', $article) }} " method="post">
                            @include('articles.partials.form', [
                            'submit' => 'Update',
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
