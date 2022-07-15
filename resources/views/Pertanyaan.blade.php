@extends('Layout.main')

@section('title')
    Pertanyaan | Forum-Cloud
@endsection

@section('linkHeader')
     <!-- Include stylesheet -->
     <link rel="stylesheet" href="{{asset('css/quill.imageUploader.min.css')}}">
@endsection

@section('body')
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="mb-0">{{$pertanyaan->judul}}</h1>
            <p class="mt-0">Ditanyakan oleh
                <strong>{{$pertanyaan->user->nama}}</strong> 
                <span class="text-secondary" style="font-size: smaller">{{$waktu}}</span>
            </p>
        </div>
        @if ($pertanyaan->user_id == $userId)
          <a href="{{url('/pertanyaan-edit/'.$pertanyaan->id)}}" class="btn btn-success" style="height: 60%;"><i class="bi bi-pencil-square"></i> Edit</a>    
        @endif
    </div>
    
    <div class="ql-snow">
        <div class="ql-editor pt-0">
            {!!$pertanyaan->body!!}
        </div>
    </div>

    {{-- <div class="container">
     
    </div> --}}

    <div class="container">
        <h3>JAWABAN</h3>
        <x-jawaban-component :jawaban="$pertanyaan->jawaban" :userId="$userId" :pertanyaanId="$pertanyaan->id" />
          <input type="text" value="{{$pertanyaan->jawaban}}" hidden id="jawabanObj">
          {{-- FORM JAWABAN START --}}
          @if (!$isJawab)
            <form action="{{url('/jawaban')}}" method="POST" id="form-tambah-jawaban">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf" />
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
                  <div class="jawab-editor" id="jawab-editor"></div>
                  {{-- hidden input --}}
                  <textarea name="body" id="form-isi-jawaban" cols="30" rows="10" hidden>
                      
                  </textarea>
                  <input type="text" name="quill_delta" hidden id="quill_delta" value="">
                  <input type="text" name="images" hidden id="images">
                  <input type="text" name="pertanyaan_id" value="{{$pertanyaan->id}}" hidden>

                  <button type="button" onclick="submitForm()" class="btn btn-success mt-3">Submit</button>
              </form> 
              {{-- FORM JAWABAN END --}}
          @endif
       
        
    </div>
    
    

@endsection

@section('script')
  <!-- Include the Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{asset('./js/image-resize.min.js')}}"></script>
  <script src="{{asset('./js/quill.imageUploader.min.js')}}"></script>

  {{-- Helper Function --}}
  <script>
     // Get src of images in the quill editor
    function getImageQuill(quillObj){
      let ops = quillObj.getContents().ops;
      let res = [];
      ops.forEach(element => {
        if(element.insert.image){
          res.push(element.insert.image);
        }
      });
      return res;
    }

    // convert string to HTML
    function stringToHtml (str) {
      var parser = new DOMParser();
      var doc = parser.parseFromString(str, 'text/html');
      // console.log(doc.body.innerHTML);
      return doc.body.innerHTML;
    };
  </script>

  @if (!$isJawab)
  <!-- Quill wysiwyg editor script -->
  <script>
  Quill.register('modules/ImageUploader', ImageUploader, true);
  var quill = new Quill('#jawab-editor', {
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
                
                axios.post('/gambar-jawaban',formData)
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
    theme: 'snow',
    placeholder: 'tulis jawaban anda disini'
  });
  const textArea = document.getElementById('form-isi-jawaban');
  const inputImages = document.getElementById('images');
  // const overview = document.getElementById('overview');
  const quillDelta = document.getElementById('quill_delta');

  function submitForm(){
    // let strTemp = quill.getText().replace(/\n/g,' ').slice(0,200);
    textArea.innerHTML = quill.root.innerHTML.trim();
    // overview.value = strTemp + ' ...';
    const formTambah = document.getElementById('form-tambah-jawaban');
    const images = getImageQuill(quill); //get images from quill editor
    quillDelta.value = JSON.stringify(quill.getContents());
    inputImages.value = JSON.stringify(images);
    formTambah.submit();
    
  }

  </script>
  @endif

  {{-- script Update Jawaban --}}
  <script>
    Quill.register('modules/ImageUploader', ImageUploader, true);
     let quillUpdate = new Quill('#update-jawab-editor', {
      modules:{
          toolbar: '#toolbar-update',
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
                
                axios.post('/gambar-jawaban',formData)
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
      theme: 'snow',
      placeholder: 'tulis jawaban anda disini'
    });

    const textAreaUpdate = document.getElementById('body-update-jawaban');
    const inputImagesUpdate = document.getElementById('images-update');
    const quillDeltaUpdate = document.getElementById('quill-delta-update');
    const jawabanCollect = JSON.parse(document.getElementById('jawabanObj').value) ;

    function showModalUpdate(obj){
      let index = obj.dataset.idx;
      const jawaban = jawabanCollect[index];
      const formUpdate = document.getElementById('form-update-jawaban');
      formUpdate.action += `/${jawaban.id}`;
      quillUpdate.setContents(JSON.parse(jawaban.quill_delta));
    }

    function submitFormUpdate(){
      textAreaUpdate.innerHTML = quillUpdate.root.innerHTML.trim();
      const formUpdate = document.getElementById('form-update-jawaban');
      const images = getImageQuill(quillUpdate); //get images from quill editor
      quillDeltaUpdate.value = JSON.stringify(quillUpdate.getContents());
      inputImagesUpdate.value = JSON.stringify(images);
      formUpdate.submit();
    }
  </script>
@endsection    