@extends('admin_template.layouts.admin')
@section('sub-title', 'Tag')
@section('content')


<div class="clearfix mt-4">
<a href="{{route('tag.create')}}" class="btn btn-info mb-2">Add Tag</a>
</div>

@if (count($tags) > 0)
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Name Tags</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                @foreach ($tags as $tag)
                <tbody>
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->created_at }}</td>
                    <td>{{ $tag->name_tag }}</td>
                    <td>
                    <form action="{{route('tag.destroy', $tag->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{route('tag.edit', $tag->id) }}" class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
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
    {{$tags->links('vendor.pagination.bootstrap-4')}}
</div>
@endif
@endsection
