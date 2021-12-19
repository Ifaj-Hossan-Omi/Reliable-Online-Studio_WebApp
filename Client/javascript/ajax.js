function getAllTask() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("taskList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","controller/getAllTask.php?",true);
    xmlhttp.send();
    return;
}





function showResultTask(str) {

    if (str.length==0) {
      getAllTask();
    }else {

    document.getElementById("taskList").innerHTML=""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("taskList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","controller/getTask.php?q="+str,true);
    xmlhttp.send();
  }
}

