@extends('Layout.main')

@section('title')
    Tanya || Forum-Cloud
@endsection 

@section('linkHeader')
     <!-- Include stylesheet -->
     <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
     <link rel="stylesheet" href="./css/quill.imageUploader.min.css">
@endsection

@section('body')
<h1>Tanyakan Saja</h1>
<form action="">
    <div class="mb-3">
        <label for="form-judul-pertanyaan" class="form-label">Judul Pertanyaan</label>
        <input type="text" class="form-control" id="form-judul-pertanyaan" placeholder="Pertanyaan" name="pertanyaan">
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

        <div class="mb-3">
            <label for="form-judul-pertanyaan" class="form-label">Kategori</label>
            <select name="kategori" id="select-kategori" class="form-select" aria-label="Default select example" required>
                <option value="" selected>--Pilih Kategori--</option>
                <option value="1">Kategori 1</option>
            </select>
            <!-- <input type="text" class="form-control" id="form-judul-pertanyaan" placeholder="Pertanyaan" name="pertanyaan"> -->
        </div>                        
        <button type="button" class="btn btn-success">Submit</button>
    </div>
</form>

@endsection

@section('script')
    <!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="./js/image-resize.min.js"></script>
<script src="./js/quill.imageUploader.min.js"></script>

<!-- Quill wysiwyg editor script -->
<script>
    Quill.register('modules/ImageUploader', ImageUploader, true);
    var quill = new Quill('#form-isi', {
        modules:{
            toolbar: '#toolbar',
            imageResize: {
            // See optional "config" below
        },
            ImageUploader:{
                upload: file => {
                return new Promise((resolve, reject) => {
                  const formData = new FormData();
                  formData.append("image", "dana");
 
                  fetch(
                    "https://request-receiver-app.herokuapp.com/api/post-request",
                    {
                      method: "POST",
                      body: JSON.stringify({data:'dana'}),
                      mode: 'cors',
                    headers: {
                        'Access-Control-Allow-Origin':'*',
                        'Content-Type': 'application/json',
                    }
                    }
                  )
                    .then(response => response.json())
                    .then(result => {
                      console.log(result);
                      resolve('https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/480px-JavaScript-logo.png');
                    })
                    .catch(error => {
                      resolve("Upload failed");
                      console.error("Error:", error);
                    });
                });
              }
            }
        },
      theme: 'snow'
    });
    
  </script>
@endsection
