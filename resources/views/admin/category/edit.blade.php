@extends('admin_template.layouts.admin')
@section('sub-title', 'Kategory')
@section('content')

<form action="{{route('category.update', $categories->id )}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Kategory</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategory</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name_category" value="{{ $categories->name_category }}">
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