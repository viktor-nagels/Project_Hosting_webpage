@extends('layouts.template')
@section('title', 'CRUD domains')
@section('main')
<main class="container mt-3">
<h1>Domains</h1>
@include('shared.alert')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>account name</th>
                <th>domain name</th>
                <th>active</th>
                <th>mysql_Version</th>
                <th>php_version</th>
                <th>laravel_version</th>
            </tr>
        </thead>
        <tbody>
            @foreach($domains as $domain)
            <tr>
                <td>{{ $domain->id }}</td>
                <td>{{ $domain->user[0]->name }}</td>
                <td>{{ $domain->domain_name }}</td>
                {{-- <td>{{ $domain->active }}</td>--}}
                @if($domain->active == 1)
                <td><i class="fas fa-check"></i></td>
                @else
                <td></td>
                @endif
                <td>{{ $domain->mysql_version}}</td>
                <td>{{ $domain->php_version}}</td>
                <td>{{ $domain->laravel_version }}</td>
                <td>
                    <form action="/admin/domains/{{ $domain->id }}" method="post">
                        @method('delete')

                        @csrf
                        <div class="btn-group btn-group-sm">
                            
                            <a href="/admin/domains/{{ $domain->id }}/edit" class="btn btn-outline-success"
                                data-toggle="tooltip" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip"
                                title="Delete {{ $domain->name }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</main>
@endsection