@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        Users
    </div>

    <div class="card-body">
        @if ($users->count() > 0)
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>email</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>


                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                    @csrf
                                    @if (!$user->isAdmin())
                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center">
                No posts yet
            </h3>
        @endif
    </div>
</div>

@endsection
