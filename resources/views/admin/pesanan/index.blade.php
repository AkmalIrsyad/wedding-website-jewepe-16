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
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped" id="TablePesanan">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Gambar</th>
                            <th> Paket </th>
                            <th> Nama </th>
                            <th> Email </th>
                            <th> No HP </th>
                            <th> Tanggal Nikah</th>
                            <th> Status</th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
            @foreach($orders as $i => $order)
            <tr>
                <td>{{ $i+1 }}</td>
                <td class="py-1">
                @if ($order->catalogue->image)
                    <img src="{{ asset('uploads/catalogues/' . $order->catalogue->image) }}" alt="image" width="80"/>
                @else
                    <span class="text-muted">No Image</span>
                @endif
                </td>
                <td>{{ $order->catalogue->package_name }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ $order->wedding_date }}</td>
                <td>
                    @if($order->status == 'requested')
                        <span class="badge bg-warning">Menunggu Konfirmasi</span>
                    @elseif($order->status == 'approved')
                        <span class="badge bg-success">Diterima</span>
                    @else
                        <span class="badge bg-danger">Dibatalkan</span>
                    @endif
                </td>
                <td>
                    @if($order->status == 'requested')
                        <form action="{{ route('admin.pesanan.accept', $order) }}" method="POST" class="d-inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Terima</button>
                        </form>
                        <form action="{{ route('admin.pesanan.cancel', $order) }}" method="POST" class="d-inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">Batalkan</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.pesanan.destroy', $order) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
        $('#TablePesanan').DataTable({
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

