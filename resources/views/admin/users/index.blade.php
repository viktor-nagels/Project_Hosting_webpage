@extends('layouts.template')
@section('title', 'CRUD users')
@section('main')
<main class='container mt-3'>
<h1>Users</h1>


    <div class="row">
        

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{$users->withQueryString()->links()}}
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->active }}</td>--}}
                        @if($user->active == 1)
                        <td><i class="fas fa-check"></i></td>
                        @else
                        <td></td>
                        @endif
                        @if($user->admin == 1)
                        <td><i class="fas fa-check"></i></td>
                        @else
                        <td></td>
                        @endif
                        {{-- <td>{{ $user->admin }}</td>--}}
                        <td>
                            <form action="/admin/users/{{ $user->id }}" method="post">
                                @method('delete')

                                @csrf
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-outline-success"
                                        data-toggle="tooltip" title="Edit {{ $user->name }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip"
                                        title="Delete {{ $user->name }}">
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
    </div>

</main>
@endsection
@section('script_after')
<script>
    $('.deleteUser').click(function () {
            let msg = `Delete this user?`;
            if (confirm(msg)) {
                $(this).closest('form').submit();
            }
        })
</script>
@endsection