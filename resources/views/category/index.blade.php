@extends('layouts.master')
@section('style')
    <style>
        .image-news {
            width: 150px;
            height: 150px;
            padding: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <section class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="header-title">
                        <i class="fa fa-file-text-o"></i> Kategori Berita
                    </h3>
                </div>
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="javascript:void(0)" class="btn btn-primary btn-create pull-right">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Kategori</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content Row -->
        <section class="card">
            <div class="card-body">
                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Situs</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $val)
                            <tr>
                                <td width="1%">{{ $key + 1 }}</td>
                                <td>{{ $val->category_name }}</td>
                                <td>{{ $val->site_name }}</td>
                                <td class="text-center" width="10%">
                                    <a href="#" class="btn btn-sm btn-inline btn-success disabled" data-toggle="modal"
                                        disabled>Edit</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Modal tambah kategori -->
    <div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="modalSentimenTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title float-left" id="exampleModalLongTitle">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('category/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-left modal-style-label">Nama Kategori</label>
                                    <br>
                                    <input type="text" class="form-control mt-10" name="category_name"
                                        placeholder="Nama Situs" required>
                                    <br>
                                    <label class="form-control-label text-left modal-style-label">Platform Situs</label>
                                    <br>
                                    <select class="form-control" name="site_id" required>
                                        <option value="">Pilih Situs</option>
                                        @foreach ($site as $val)
                                            <option value="{{ $val->id }}">{{ $val->site_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="text-left">
                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal"><i
                                    class="fa fa-times" aria-hidden="true"></i> Close</button>
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-check"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal tambah kategori -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            $('.btn-create').click(function() {
                $('#modalCategory').modal('toggle');
            });
        });
    </script>
@endsection
