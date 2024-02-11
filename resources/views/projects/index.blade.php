@extends('layouts.master') @section('title') List Projects @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="card">
            <h5 class="card-header">List Project</h5>
            <div class="table-responsive text-nowrap">
                <button type="button" class="btn rounded-pill btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#backDropModal">Add Project</button>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session('success'))
                    <div class="alert alert-primary" role="alert">
                        {{Session('success')}}
                    </div>
                    @endif
                <table class="table">
                    <thead class="table-light mt-2">
                        <tr>
                            <th>No</th>
                            <th>Project</th>
                            <th>Deadlline</th>
                            <th>Publish</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Creator</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($projects as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->name}}</td>
                            <td>
                                <span class="badge rounded-pill bg-warning">{{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d F Y') }}</span>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-danger">{{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d F Y') }}</span>
                            </td>
                            <td><img src="{{asset($item->image)}}" class="img-fluid" style="width: 100px" alt=""></td>
                            <td>{{ $item->desc}}</td>
                            <td>
                                <span class="badge rounded-pill bg-primary"> {{ $item->users->name}}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button
                                        type="button"
                                        class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{route('project.destroy', $item->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a class="dropdown-item" href="{{route('project.detail', $item->id)}}">
                                                <i class="bx bx-show-alt me-1"></i>
                                                Detail</a >
                                            <a class="dropdown-item" href="{{route('project.edit', $item->id)}}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Edit</a >
                                            <button class="dropdown-item" href="">
                                                <i class="bx bx-trash me-1"></i>
                                                Delete</button >
                                        </form>
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Modal Add project -->
            @include('projects.create-modal')
        </div>
    </div>
</div>
@endsection