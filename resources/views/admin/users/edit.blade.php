@extends('layouts.template')

@section('title', 'Edit user')

@section('main')
<main class="container mt-3">
    <h1>Edit user: {{ $user->name }}</h1>
    <form action="/admin/users/{{ $user->id }}" method="post">
        @method('put')
        @include('admin.users.form')
    </form>
</main>
@endsection
