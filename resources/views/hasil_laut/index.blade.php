@include('dashboard.layout.head')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('notification.index')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hasil Laut</h4>
                        <button type="button" class="btn btn-rounded btn-success" data-bs-toggle="modal" data-bs-target="#addHasilLaut" style="float: right;"><span
                            class="btn-icon-start text-success"><i class="fa fa-plus color-success"></i>
                        </span>Tambah</button>
                        @include('hasil_laut.modal.tambah')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($hasillaut as $hl)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="new-arrival-product">
                            <div class="new-arrivals-img-contnent">
                                <img class="img-fluid" src="{{ asset('admin/mophy.dexignzone.com/xhtml/images/product') }}/{{ $hl->gambar }}" alt="">
                            </div>
                            <div class="new-arrival-content text-center mt-3">
                                <h4><a href="ecom-product-detail.html">{{ $hl->nama }}</a></h4>
                                <p>Stok: {{ $hl->stok }} kg</p>
                                @if ($hl->status == 'Tersedia')
                                <span class="badge light badge-success">{{ $hl->status }}</span>
                                @else
                                <span class="badge light badge-warning">{{ $hl->status }}</span>
                                @endif
                                <br><br>
                                <button class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editHasilLaut{{ $hl->id }}"><i class="fas fa-pencil-alt"></i></button>
                                @include('hasil_laut.modal.edit')
                                <button href="#" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#destroyHasilLaut{{ $hl->id }}"><i class="fas fa-trash-alt"></i></button>
                                @include('hasil_laut.modal.destroy')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
