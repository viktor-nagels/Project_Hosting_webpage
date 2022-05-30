@extends('layouts.template')

@section('title', 'Edit user')

@section('main')
<main class="container mt-3">
    <h1>Edit domain: {{ $domain->domain_name }}</h1>
    <form action="/admin/domains/{{ $domain->id }}" method="post">
        @method('put')
        @include('admin.domains.form')
    </form>
</main>
@endsection
