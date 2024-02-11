@extends('layouts.master')@section('title') Edit Projects @endsection
@section('content') 
<div class = "container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('project.index') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <h5 class="mb-0">Edit Project</h5>
                <small class="text-muted float-end">Edit Project</small>
            </div>
            <div class="card-body">
                <form action="{{route('project.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="basic-default-name" value="{{$data->name}}"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Deadline</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="deadline" id="basic-default-company" value="{{$data->deadline}}"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Publish Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="publish_date" id="basic-default-company" value="{{$data->publish_date}}"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Image</label>
                        <div class="col-sm-10">
                            <img src="{{asset($data->image)}}" class="img-fluid" style="width: 100px" alt="">
                            <input type="file" name="image" class="form-control" id="basic-default-company"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                        <div class="col-sm-10 mb-3">
                          <textarea id="basic-default-message" name="desc" class="form-control">{{ $data->desc}}</textarea>
                        </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection