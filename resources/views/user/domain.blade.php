@extends('layouts.template')
@section('title', 'build')
@section('main')
<main class="container mt-3">

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{$error}}
</div>
@endforeach
@endif

    <h1>build</h1>
    <h6 class="text-danger">NOTE: YOU CAN ONLY HAVE ONE DOMAIN</h6>
    @include('shared.alert')
    @if (!session()->has('success'))
    <form action="/domain" method="post">
    @method('post')
    @csrf


    <!--check if domain name is already in use-->
    <!--DOMAIN NAME-->

    <label for="domain_name">domain name:</label>
    <input type="text" id="domain_name" name="domain_name" placeholder="ex. google" required class="@error('domain_name') is-invalid @enderror"><label for="domain_name" class="text-secondary">.teamsixhosting</label><br>
    <!--SQL-->
    <label for="mysql_username">mysql user name:</label>
    <input type="text" id="mysql_username" name="mysql_username"><br>
    <label for="mysql_password">sql password:</label>
    <input type="password" id="mysql_password" name="mysql_password"><br>
    <!--SFTP -->
    <label for="sftp_username">sftp username:</label>
    <input type="text" id="sftp_username" name="sftp_username" required><br>
    <label for="sftp_password">sftp password:</label>
    <input type="password" id="sftp_password" name="sftp_password" required><br>

    <hr>
    <!--check if it is compatible with other version. If not, remove it form the checkboxes-->

        <label for="mysql_version">mysql version:</label><br>
        <select name="mysql_version" id="mysql_version">
            <option value="none">none</option>
            <option value="8.0">8.0</option>
            <option value="5.7">5.7</option>
            <option value="5.6">5.6</option>
            <option value="5.5">5.5</option>
            <option value="5.1">5.1</option>
        </select>


    <hr>

        <label for="php_version">php version:</label><br>
        <select name="php_version" id="php_version">
            <option value="none">none</option>
            <option value="8.1">8.1</option>
            <option value="8.0">8.0</option>
            <option value="7.4">7.4</option>
            <option value="7.3">7.3</option>
            <option value="7.2">7.2</option>
            <option value="7.1">7.1</option>
            <option value="7.0">7.0</option>
        </select>


    <hr>

        <label for="laravel_version">laravel version:</label><br>
        <select name="laravel_version" id="laravel_version">
            <option value="none">none</option>
            <option value="9">9</option>
            <option value="8">8</option>
            <option value="7">7</option>
            <option value="6">6 LTS</option>
            <option value="5.8">5.8</option>
        </select>


        <hr>

        <input type="submit" name="submit">
        <br><br><br><br>

    </form>
    @endif
</main>
@endsection
