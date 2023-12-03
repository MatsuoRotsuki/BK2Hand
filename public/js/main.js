const submenuOpen = document.querySelector('#submenu-open') 

submenuOpen.addEventListener("click", function(){
    document.querySelector('.submenu').style.display = "flex";
})

const submenuClose = document.querySelector('#submenu-close') 

submenuClose.addEventListener("click", function(){
    document.querySelector('.submenu').style.display = "none";
})

function openMenu(evt, menuName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
}

const subfilterOpen = document.querySelector('#subfilter-open') 

subfilterOpen.addEventListener("click", function(){
    document.querySelector('.subfilter').style.display = "flex";
})

const subfilterClose = document.querySelector('#subfilter-close') 

subfilterClose.addEventListener("click", function(){
    document.querySelector('.subfilter').style.display = "none";
})

function openFilter(evt, filterName) {
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(filterName).style.display = "block";
  evt.currentTarget.className += " active";
}
