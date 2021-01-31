@extends('admin_template.layouts.admin')
@section('sub-title', 'Kategory')
@section('content')

    {{-- @if (count($errors) > 0)
        @foreach($errors->all() as $error)          <--- message for errors!
            {{ $error }}
        @endforeach
    @endif --}}
<form action="{{route('category.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Kategory</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategory</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="name_category">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection