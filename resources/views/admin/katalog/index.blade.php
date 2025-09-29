@extends('layouts.skydash')

@section('contentadm')
          <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
                 {{-- Pesan sukses --}}
          @if(session('success'))
           <div class="alert alert-success">
            {{ session('success') }}
           </div>
          @endif
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div>
                        <h4 class="card-title">Daftar Katalog Wedding</h4>
                        <p class="card-description">Kelola katalog paket wedding</p>
                      </div>
                      <a href="{{ route('admin.katalog.add') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus"></i> Tambah Katalog
                      </a>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="myTable">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Gambar </th>
                            <th> Nama Paket </th>
                            <th> Harga </th>
                            <th> Status publish </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($catalogues as $key => $catalogue)
            <tr>
            <td>{{ $key + 1 }}</td>
            <td class="py-1">
                @if ($catalogue->image)
                    <img src="{{ asset('uploads/catalogues/' . $catalogue->image) }}" alt="image" width="80"/>
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </td>
            <td>{{ $catalogue->package_name }}</td>
            <td>Rp {{ number_format($catalogue->price, 0, ',', '.') }}</td>
            <td>
                @if ($catalogue->status_publish === 'Y')
                    <span class="badge bg-success">Publish</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </td>
            <td>
  <a href="{{ route('admin.katalog.edit', $catalogue->catalogue_id) }}" class="btn btn-sm btn-warning">Edit</a>
  <form action="{{ route('admin.katalog.destroy', $catalogue->catalogue_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Delete</button>
  </form>
</td>
        </tr>
    @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            responsive: true,
            pageLength: 6,
                language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: ">>",
                    previous: "<<"
                }
            }
        });
    });
</script>
@endpush
