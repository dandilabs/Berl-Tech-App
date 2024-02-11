<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Add Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBackdrop" class="form-label">Name Project</label>
                        <input type="text" id="nameBackdrop" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBackdrop" class="form-label">Deadline</label>
                        <input type="date" id="deadlineBackdrop" name="deadline" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-0">
                        <label for="emailBackdrop" class="form-label">Publish</label>
                        <input type="date" id="publishBackdrop" name="publish_date" class="form-control" placeholder="xxxx@xxx.xx" />
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="imageBackdrop" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col mb-3">
                    <label for="nameBackdrop" class="form-label">Description</label>
                    <textarea type="text" id="descBackdrop" class="form-control" name="desc" value="{{ old('name') }}"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
