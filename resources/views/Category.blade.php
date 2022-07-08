@extends('Layout.main')

@section('title')
    Kategori || Forum-Cloud
@endsection 

@section('linkHeader')
     <!-- Include stylesheet -->
     <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
     <link rel="stylesheet" href="./css/quill.imageUploader.min.css">
@endsection

@section('body')
<h1>List Category</h1>
                <div class="row justify-content-between">
                    <div class="col-auto d-flex">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="bi bi-search fs-5 "></i>
                            </div>
                            <input class="form-control" type="text" placeholder="cari kategori">
                        </div>
                        <button class="btn btn-primary w-auto ms-2" data-bs-toggle="modal" data-bs-target="#modal-tambah-kategori">+Tambah</button>
                    </div>

                    <!-- MODAL TAMBAH KATEGORI START -->
                    <div class="modal fade" id="modal-tambah-kategori" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/kategori')}}" method="POST" id="form-tambah-kategori">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="form-nama-kategori" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="form-nama-kategori" placeholder="cth:coding" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="form-deksripsi-kategori" class="form-label">Deskripsi Kategori</label>
                                        <textarea id="form-deksripsi-kategori" cols="30" rows="10" class="form-control" name="deskripsi">Penjelasan Singkat Kategori</textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-tambah-kategori">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- MODAL TAMBAH KATEGORI END -->

                    <div class="col-auto">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-secondary" for="btnradio1">Filter 1</label>
                          
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradio2">Filter 2</label>
                          
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnradio3">Filter 3</label>
                          </div>
                    </div>
                </div>

                <div class="container d-flex flex-wrap justify-content-center mt-3">
                    {{-- components --}}
                   <x-category-card :kategori="$kategori" />
                </div>

@endsection

@section('script')
<script src="{{asset('./js/category.js')}}"></script>
@endsection
