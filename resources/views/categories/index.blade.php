@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Add Category</a>
</div>

<div class="card card-default">
    <div class="card-header">
        categories
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>
                    Name
                </th>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            {{-- <td>
                                <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger btn-sm">Edit</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
</div>

@endsection
