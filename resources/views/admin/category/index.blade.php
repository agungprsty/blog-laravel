@extends('admin_template.layouts.admin')
@section('sub-title', 'Kategory')
@section('content')


<div class="clearfix mt-4">
<a href="{{route('category.create')}}" class="btn btn-info mb-2">Add Kategory</a>
</div>

@if (count($categories) > 0)
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Name Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                @foreach ($categories as $category)
                <tbody>
                <tr>
                    {{-- <th scope="row">{{ $category + $categories->first()->$categori }}</th> --}}
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->name_category }}</td>
                    <td>
                    <form action="{{route('category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{route('category.edit', $category->id) }}" class="btn btn-primary btn-action " data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
        </table>
    </div>
</div>
<!-- Pager -->
<div class="clearfix mt-4">
    {{$categories->links('vendor.pagination.bootstrap-4')}}
</div>
@endif
@endsection
