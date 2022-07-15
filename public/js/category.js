  // Submit kategori
  const formKategori = document.getElementById('form-tambah-kategori');
  const btnFormKategori = document.getElementById('btn-tambah-kategori');
  btnFormKategori.addEventListener('click',(e)=>{
      formKategori.submit();
  });

  //Update Kategori
  function updateKategori(obj,id){
    const formUpdateKategori = document.getElementById('form-update-kategori'+id);
    formUpdateKategori.submit();
  }