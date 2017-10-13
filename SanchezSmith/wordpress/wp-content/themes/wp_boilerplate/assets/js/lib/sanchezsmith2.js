
var ids=new Array('diseno','fundacion','divisiones','piso','muros','instalacion');

function switchid(id){  
  hideallids();
  showdiv(id);
}

function hideallids(){
  for (var i=0;i<ids.length;i++){
    hidediv(ids[i]);
  }     
}

function hidediv(id) {
  if (document.getElementById) { 
    document.getElementById(id).style.display = 'none';
  }
  else {
    if (document.layers) { 
      document.id.display = 'none';
    }
    else { 
      document.all.id.style.display = 'none';
    }
  }
}

function showdiv(id) {
      
  if (document.getElementById) { 
    document.getElementById(id).style.display = 'block';
  }
  else {
    if (document.layers) { 
      document.id.display = 'block';
    }
    else { 
      document.all.id.style.display = 'block';
    }
  }
}









	

