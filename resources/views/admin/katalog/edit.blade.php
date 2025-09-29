@extends('layouts.skydash')

@section('contentadm')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Catalogue</h4>
            <form class="forms-sample" action="{{ route('admin.katalog.update', $catalogue->catalogue_id) }}" method="PUT" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" class="form-control" name="package_name" value="{{ old('package_name', $catalogue->package_name) }}">
              </div>

              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" id="summernote" name="description">{{ old('description', $catalogue->description) }}</textarea>
              </div>

              <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="price" value="{{ old('price', $catalogue->price) }}">
              </div>

              <div class="form-group">
                <label>Status Publish</label>
                <select class="form-select" name="status_publish">
                    <option value="Y" {{ $catalogue->status_publish == 'Y' ? 'selected' : '' }}>Publish</option>
                    <option value="N" {{ $catalogue->status_publish == 'N' ? 'selected' : '' }}>Draft</option>
                </select>
              </div>

              <div class="form-group">
                <label>Gambar Header</label><br>
                @if($catalogue->image)
                    <img src="{{ asset('uploads/catalogues/' . $catalogue->image) }}" alt="image" width="120" class="mb-2">
                @endif
                <input type="file" class="form-control" name="image">
              </div>

              <button type="submit" class="btn btn-primary me-2">Update</button>
              <a href="{{ route('admin.katalog.index') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
