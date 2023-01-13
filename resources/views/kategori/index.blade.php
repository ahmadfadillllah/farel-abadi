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
                        <h4 class="card-title">Kategori</h4>
                        <button type="button" class="btn btn-rounded btn-success" data-bs-toggle="modal" data-bs-target="#addKategori" style="float: right;"><span
                            class="btn-icon-start text-success"><i class="fa fa-plus color-success"></i>
                        </span>Tambah</button>
                        @include('kategori.modal.tambah')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $k)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $k->nama }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editKategori{{ $k->id }}"><i class="fas fa-pencil-alt"></i></button>
                                                @include('kategori.modal.edit')
                                                <button href="#" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#destroyKategori{{ $k->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('kategori.modal.destroy')
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
