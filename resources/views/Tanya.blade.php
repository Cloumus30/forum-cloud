@extends('Layout.main')

@section('title')
    Tanya | Forum-Cloud
@endsection 

@section('linkHeader')
     <!-- Include stylesheet -->
     <link rel="stylesheet" href="./css/quill.imageUploader.min.css">
@endsection

@section('body')
<h1>Tanyakan Saja</h1>

<form action="/pertanyaan" id="form-tambah-tanya" method="POST">
  {{-- @csrf --}}
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf" />
    <div class="mb-3">
        <label for="form-judul-pertanyaan" class="form-label">Judul Pertanyaan</label>
        <input type="text" class="form-control" id="form-judul-pertanyaan" placeholder="Pertanyaan" name="judul">
    </div>
    <div class="mb-3">
        <label for="form-isi" class="form-label">Isi</label>
       <!-- Create toolbar container -->
        <div id="toolbar">
            <!-- Add Bold Button-->
            <button class="ql-bold"></button>
            <!-- Add Italic Button -->
            <button class="ql-italic"></button>
            <!-- Add font size dropdown -->
            <select class="ql-size">
                <option value="small"></option>
                <!-- Note a missing, thus falsy value, is used to reset to default -->
                <option selected></option>
                <option value="large"></option>
                <option value="huge"></option>
            </select>
            <!-- add hyperlink button -->
            <button class="ms-3 ql-link"></button>
            <!-- Add blockquote button -->
            <button class="ql-blockquote"></button>
            <!-- add code-block button -->
            <button class="ql-code-block"></button>
            <!-- Add a bold button -->
            <button class="ql-image"></button>

            <!-- add list -->
            <button class="ql-list ms-3" value="ordered"></button>
            <button class="ql-list" value="bullet"></button>
            <!-- add align text -->
            <select name="" id="" class="ql-align">
                <option selected></option>
                <option value="center"></option>
                <option value="right"></option>
                <option value="justify"></option>
            </select>
        </div>
        <div class="form-control mb-3" name="body" id="form-isi"></div>
        {{-- hidden input --}}
        <textarea name="body" id="form-isi-pertanyaan" cols="30" rows="10" hidden></textarea>
        <input type="text" name="overview" hidden id="overview">
        <input type="text" name="images" hidden id="images">
        <div class="mb-3">
            <label for="form-judul-pertanyaan" class="form-label">Kategori</label>
            <select name="kategori" id="select-kategori" class="form-select" aria-label="Default select example" required>
                <option value="" selected>--Pilih Kategori--</option>
                @foreach ($kategori as $kateg)
                  <option value="{{$kateg->id}}">{{$kateg->nama}}</option>    
                @endforeach
                
            </select>
            <!-- <input type="text" class="form-control" id="form-judul-pertanyaan" placeholder="Pertanyaan" name="pertanyaan"> -->
        </div>                        
        <button type="button" onclick="submitForm()" class="btn btn-success">Submit</button>
        
    </div>
</form>

@endsection

@section('script')
    <!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('./js/image-resize.min.js')}}"></script>
<script src="{{asset('./js/quill.imageUploader.min.js')}}"></script>

<!-- Quill wysiwyg editor script -->
<script>
    Quill.register('modules/ImageUploader', ImageUploader, true);
    var quill = new Quill('#form-isi', {
        modules:{
            toolbar: '#toolbar',
            syntax:true,
            imageResize: {
            // See optional "config" below
        },
            ImageUploader:{
                upload: file => {
                return new Promise((resolve, reject) => {
                  const csrf = document.querySelector('#csrf').value;
                  const formData = new FormData();
                  formData.append("image", file);
                  formData.append("_token", csrf);
                  
                  axios.post('/gambar-pertanyaan',formData)
                  .then(function(response){
                    // console.log(response);
                    resolve(response.data.url);
                  })
                  .catch(function(err){
                    console.log(err);
                    reject(err);
                  })

                });
              }
            }
        },
      theme: 'snow'
    });
    const textArea = document.getElementById('form-isi-pertanyaan');
    const inputImages = document.getElementById('images');
    const overview = document.getElementById('overview');
    function submitForm(){
      let strTemp = quill.getText().replace(/\n/g,' ').slice(0,200);
      textArea.innerHTML = quill.root.innerHTML.trim();
      overview.value = strTemp + ' ...';
      const formTambah = document.getElementById('form-tambah-tanya');
      const images = getImageQuill(); //get images from quill editor
      inputImages.value = JSON.stringify(images);
      formTambah.submit();
      
    }
    
    // Get src of images in the quill editor
    function getImageQuill(){
      let ops = quill.getContents().ops;
      let res = [];
      ops.forEach(element => {
        if(element.insert.image){
          res.push(element.insert.image);
        }
      });
      return res;
    }

  </script>
@endsection
