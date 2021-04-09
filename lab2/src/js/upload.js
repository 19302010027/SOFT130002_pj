function display_alert(){
  alert("Alert!")
}

function showImg(){
  var file =  document.getElementById('img_file').files[0];
  var re = new FileReader();
  re.readAsDataURL(file);
  re.onload = function(re){
    $('#img_id').attr("src", re.target.result);
  }
}
