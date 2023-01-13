@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                @include('notification.index')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pemasukan</h4>
                        <button type="button" class="btn btn-rounded btn-success" data-bs-toggle="modal" data-bs-target="#addPemasukan" style="float: right;"><span
                            class="btn-icon-start text-success"><i class="fa fa-plus color-success"></i>
                        </span>Tambah</button>
                        @include('pemasukan.modal.tambah')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Hasil Laut</th>
                                        <th>Nama Nelayan</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemasukan as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->tanggal_masuk }}</td>
                                        <td>{{ $p->hasillaut->nama }}</td>
                                        <td>{{ $p->nama_nelayan }}</td>
                                        <td>{{ $p->jumlah }}</td>
                                        <td>@currency($p->harga)</td>
                                        <td>@currency($p->total)</td>
                                        <td>
                                            <div class="d-flex">
                                                <button href="#" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#destroyPemasukan{{ $p->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('pemasukan.modal.destroy')
                                            </div>
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
</div>
@include('dashboard.layout.footer')
