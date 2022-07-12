@extends('Layout.main')

@section('title')
    Profil | Forum-Cloud
@endsection

@section('linkHeader')
    <style>
        .gambar-profile-hover{
            opacity: 50%;
            cursor: pointer;
            z-index: 1030;
        }
        #word-upload{
            position: absolute;
            top: 50%;
            right: 50%;
            cursor: pointer;
        }
        .hidden{
            visibility: hidden;
        }
    </style>
@endsection

@section('body')
<h1>Profil</h1>
<div class="row my-5 justify-content-center">
    <div class="col-lg-5 col-sm-12 position-relative d-flex justify-content-center align-items-center">
       
        <div class="gambar-container">
            @if ($user->gambarUser)
            <img src="{{$user->gambarUser->url}}" alt="foto" style="width: 80%" class="align-self-center" id="gambar-profile" onmouseover="gambarHover(this)" onmouseout="gambarNotHover(this)" onclick="openDialog()">
            @else
            <img src="./image/default_profile.png" alt="foto" style="width: 80%" class="align-self-center" id="gambar-profile" onmouseover="gambarHover(this)" onmouseout="gambarNotHover(this)" onclick="openDialog()">    
            @endif
            <p class="fs-3 hidden" id="word-upload" onmouseover="gambarHover(this)" onmouseout="gambarNotHover(this)" onclick="openDialog()" >Edit</p>
            <input type="file" id="gambar-input" onchange="uploadImage(this)" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf" />     
        </div>
        
       
        
    </div>

    <div class="col-lg-7 col-sm-12">
        <!-- TABLE START -->
        <table class="table">
            <tr>
                <td class="text-nowrap">Nama </td>
                 <td>{{$user->nama}}</td>
            </tr>
            
             <tr>
                 <td class="text-nowrap">Email </td>
                 <td>{{$user->email}}</td>
             </tr>

             @if (isset($isOwnProfil))
                <tr>
                    <td class="text-nowrap">Tanggal Lahir </td>
                    <td>{{$user->tgl_lahir ?? '-'}}</td>
                </tr>
                <tr>
                    <td class="text-nowrap">Umur </td>
                    <td>{{$user->umur ?? "-"}}</td>
                </tr>
                <tr>
                    <td class="text-nowrap">Alamat: </td>
                    <td>{{$user->alamat ?? '-'}}</td>
                </tr>    
             @endif
             
             <tr>
                 <td class="text-nowrap">Jumlah Pertanyaan: </td>
                 <td>{{$user->jumlah_pertanyaan}}</td>
             </tr>
             <tr>
                 <td class="text-nowrap">Jumlah Jawaban: </td>
                 <td>
                     {{$user->jumlah_jawaban}}
                 </td>
             </tr>
        </table>
        <!-- TABLE END -->
        
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="#" class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
        </div>
        
    </div>
    
 </div>

 <!-- MODAL UPDATE PROFIL START -->
 <div class="modal fade" id="modal-update-profil" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
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
<!-- MODAL UPDATE PROFIL END -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const gambarContainer = document.querySelector('.gambar-container');
        const gambarProfile = document.getElementById('gambar-profile');
        const uploadWord = document.getElementById('word-upload');
        const inputFile = document.getElementById('gambar-input');
        const spinner = `<div class="spinner-border position-absolute top-50 start-50" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`;

        // Hover Upload Image
        function gambarHover(obj){
            gambarProfile.classList.add('gambar-profile-hover');
            uploadWord.classList.remove('hidden');
        }
        function gambarNotHover(obj){
            gambarProfile.classList.remove('gambar-profile-hover');
            uploadWord.classList.add('hidden');
        }
        
        // Open Dialog to input images
        function openDialog(){
            inputFile.click();
        }

        // Upload Image To Server
        function uploadImage(obj){
            const csrf = document.getElementById('csrf');
            const formData = new FormData();
            formData.append('image',obj.files[0]);
            formData.append('_token',csrf.value);

            gambarProfile.hidden = true;
            uploadWord.hidden = true;
            gambarContainer.insertAdjacentHTML('beforeend',spinner);

            axios.post('/gambar-profil',formData)
                  .then(function(response){
                    updatePofilImage(response.data.url);
                  })
                  .catch(function(err){
                    console.log(err);
                    return err;
                  })
        }
        
        function updatePofilImage(url=null){
            const spinnerEl = document.querySelector('.spinner-border');
            spinnerEl.remove();
            gambarProfile.hidden = false;
            uploadWord.hidden = false;
            gambarProfile.src = url;
        }
    </script>
@endsection