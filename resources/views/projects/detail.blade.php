@extends('layouts.master') 
@section('title') 
Details Projects 
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Projects / </span> Detail
    </h4>
    <div class="row">
        <div class="col-md-6 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header"><a href="{{ route('project.index') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-arrow-left"></i> Back
                </a></h5>
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{asset($detail_project->image)}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
                      </div>
                  <hr class="my-0" />
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="basic-default-name" readonly value="{{$detail_project->name}}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Deadline</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="deadline" id="basic-default-company" readonly value="{{$detail_project->deadline}}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Publish Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="publish_date" id="basic-default-company" readonly value="{{$detail_project->publish_date}}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
                            <div class="col-sm-10 mb-3">
                              <textarea id="basic-default-message" name="desc" class="form-control" readonly>{{ $detail_project->desc}}</textarea>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection