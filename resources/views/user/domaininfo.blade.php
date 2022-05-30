@extends('layouts.template')
@section('main')
<main class="container mt-3">

    <h1>Domain info</h1>

    <p>Domainname:</p>
    <p class="font-weight-bold">{{ $domain->domain_name }}.teamsixhosting</p>
<hr>
    <p>username:</p>
    <p class="font-weight-bold">{{ $domain->mysql_username }}</p>

    
    <p>password: </p>
    <p class="font-weight-bold">{{ $domain->mysql_password }}</p>
<hr>
    <p>PHP version: </p>
    <p class="font-weight-bold">{{ $domain->mysql_version }}</p>
    <p>Mysql version: </p>
    <p class="font-weight-bold">{{ $domain->php_version }}</p>
    <p>Laravel version: </p>
    <p class="font-weight-bold">{{ $domain->laravel_version }}</p>    
    <button class="bg-dark "><a href="/">back to home</a></button>
    <br><br><br>
    
</main>
@endsection