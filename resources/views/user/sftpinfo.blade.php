@extends('layouts.template')
@section('main')
<main class="container mt-3">
    <h1>SFTP</h1>
    <br>
    <p>port</p>
    <p class="font-weight-bold">1022</p>
    <p>sftp username:</p>
    <p class="font-weight-bold">{{ $domain->sftp_username }}</p>
    <p>sftp password:</p>
    <p class="font-weight-bold">{{ $domain->sftp_password }}</p>
    <hr>
    <button class="bg-dark "><a href="/">back to home</a></button>
    <br><br>
</main>
@endsection