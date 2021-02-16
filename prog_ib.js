 //current progress
 var currProgress_ib = 0;
 //is the task complete
 var done_ib = false;
 //total progress amount
 var total = 100;
 //function to update progress
 function startProgress_ib() {
    //get the progress element
     var prBar_ib = document.getElementById("prog-ib");
     //get the start button
     var startButt_ib = document.getElementById("startBtn-ib");
     //get the textual element
     var val_ib = document.getElementById("numValue_ib");
  
     //disable the button while the task is unfolding
     startButt_ib.disabled=true;
     //update the progress level
     prBar_ib.value = currProgress_ib;
     

     //update the textual indicator
     val_ib.innerHTML = Math.round((currProgress_ib/total)*100)+"%";
     //increment the progress level each time this function executes
     currProgress_ib++;
     //check whether we are done yet
     if(currProgress_ib>100) done_ib=true;
     //check whether we are done yet
     if(!done_ib)
         setTimeout("startProgress_ib()", 100);
     //task done, enable the button and reset variables
     else
     {
         document.getElementById("startBtn-ib").disabled = false;
         done_ib = false;
         currProgress_ib = 0;
     }
 }