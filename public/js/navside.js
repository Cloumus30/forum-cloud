// click button sidebar
let collapseSideNav = document.getElementById('collapseSideNav');
let btnSide = document.getElementById('side-nav-btn');
collapseSideNav.addEventListener('shown.bs.collapse',(e)=>{
     if(e.target == collapseSideNav){
         btnSide.hidden = true;
         collapseSideNav.classList.remove('position-absolute');
         const body = document.getElementById('main-body');
         body.classList.add('col-lg-10');
         body.classList.add('col-md-9');
         body.classList.add('col-sm-8');
     }
});
collapseSideNav.addEventListener('show.bs.collapse',(e)=>{
     if(e.target == collapseSideNav){
         collapseSideNav.classList.add('position-absolute');
     }
});
collapseSideNav.addEventListener('hidden.bs.collapse',(e)=>{
 if(e.target == collapseSideNav){
     btnSide.hidden = false;
     collapseSideNav.classList.remove('position-absolute');
     const body = document.getElementById('main-body');
     body.classList.remove('col-lg-10');
     body.classList.remove('col-md-9');
     body.classList.remove('col-sm-8');
 }
});