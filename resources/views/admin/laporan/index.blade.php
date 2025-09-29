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
                      <table class="table table-striped" id="TableLaporan">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th>Gambar</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Jumlah Pesanan</th>
                            <th>Total Harga</th>
                            <th>Status Publish</th>
                          </tr>
                        </thead>
                         <tbody>
        @forelse($orders as $index => $order)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <img src="{{ asset('/uploads/catalogues/' . $order->catalogue->image) }}"
                     alt="gambar paket" width="80">
            </td>
            <td>{{ $order->catalogue->package_name }}</td>
            <td>Rp. {{ number_format($order->catalogue->price, 2, ',', '.') }}</td>
            <td>{{ $order->count() }}</td>
            <td>
                Rp. {{ number_format($order->catalogue->price * $order->count(), 2, ',', '.') }}
            </td>
            <td>{{ $order->catalogue->status_publish == 'Y' ? 'Y' : 'N' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada data pesanan</td>
        </tr>
        @endforelse
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
        $('#TableLaporan').DataTable({
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

