@extends('admin_template.layouts.admin')
@section('sub-title', 'Post')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Post</h4>
            </div>
            <div class="card-body">
                <form action="{{route('post.update', $posts->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tittle</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="judul" placeholder="Create your title.." value="{{ $posts->judul }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategory</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="selectpicker form-control" data-live-search="true" name="category_id" >
                                    {{-- <option value="" holder>Select your category</option> --}}
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($posts->category_id == $category->id)
                                                selected
                                            @endif
                                        >{{ $category->name_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tag</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="selectpicker form-control select2" multiple data-live-search="true" name="tags[]" id="" required>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            @foreach ($posts->tags as $value)
                                                @if ($tag->id == $value->id)
                                                    selected
                                                @endif
                                            @endforeach
                                        > {{ $tag->name_tag }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control" value="">{{ $posts->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="gambar" onchange="previewFile(this)" />
                                <img id="previewImg" src="{{asset('images')}}/{{$posts->gambar}}" alt="" style="max-width: 130px;margin-top: 20px;max-height: 130px;" />
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Update Now</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection