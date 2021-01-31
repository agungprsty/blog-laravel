@extends('admin_template.layouts.admin')
@section('sub-title', 'Tag')
@section('content')

<form action="{{route('tag.update', $tags->id )}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Tag</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tag</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name_tag" value="{{ $tags->name_tag }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Update Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection