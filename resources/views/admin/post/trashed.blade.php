@extends('admin_template.layouts.admin')
@section('sub-title', 'Trash Bin')
@section('content')


@if (count($posts) > 0)
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Name Post</th>
                    <th scope="col">Kategory</th>
                    {{-- <th scope="col">Tags</th> --}}
                    <th scope="col">Cover</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                @foreach ($posts as $post)
                <tbody>
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->created_at }}</td>
                    <td><a href="">{{ $post->judul }}</a></td>
                    <td>{{ $post->category->name_category }}</td>
                    {{-- <td>
                        @foreach ($post->tags as $tag)
                        {{ $tag->name_tag, '|' }}
                        @endforeach
                    </td> --}}
                <td><img src="{{ asset('images/'.$post->gambar) }}" alt="{{ $post->judul }}" style="max-width: 50px;margin-top: 2px;"></td>
                    <td>
                    <form action="{{route('post.deleted', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{route('post.restored', $post->id) }}" class="btn btn-primary btn-action " data-toggle="tooltip" title="Restore"><i class="fas fa-reply"></i></a>
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
    {{$posts->links('vendor.pagination.bootstrap-4')}}
</div>
@endif
@endsection
