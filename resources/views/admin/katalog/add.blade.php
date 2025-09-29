@extends('layouts.skydash')

@section('contentadm')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="{{ route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Paket</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="package_name">
                      @error('package_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="deskripsi">deskripsi</label>
                        <textarea type="text" class="form-control" id="summernote" placeholder="deskripsi" name="description"></textarea>
                         @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                         <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control" id="harga" placeholder="Harga" name="price">
                         @error('price')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                        <div class="form-group">
                        <label for="exampleSelect">Status Publish</label>
                        <select class="form-select" id="exampleSelect" name="status_publish">
                            <option value="Y">Publish</option>
                            <option value="N">Draft</option>
                        </select>
                         @error('status_publish')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Gambar Header</label>
                        <input class="form-control" id="exampleTextarea1" rows="4" type="file" name="image"/>
                     @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Tulis deskripsi paket di sini...',
                tabsize: 2,
                height: 200
            });
        });
    </script>
@endpush
