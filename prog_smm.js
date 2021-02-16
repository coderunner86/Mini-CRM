var currProgress_smm = 0;
                            //is the task complete
                            var done_smm = false;
                            //total progress amount
                            var total = 100;
                            //function to update progress
                            function startProgress_smm() {
                               //get the progress element
                                var prBar_smm = document.getElementById("prog-smm");
                                //get the start button
                                var startButt_smm = document.getElementById("startBtn-smm");
                                //get the textual element
                                var val_smm = document.getElementById("numValue_smm");
                             
                                //disable the button while the task is unfolding
                                startButt_smm.disabled=true;
                                //update the progress level
                                prBar_smm.value = currProgress_smm;
                                
                        
                                //update the textual indicator
                                val_smm.innerHTML = Math.round((currProgress_smm/total)*100)+"%";
                                //increment the progress level each time this function executes
                                currProgress_smm++;
                                //check whether we are done yet
                                if(currProgress_smm>100) done_smm=true;
                                //check whether we are done yet
                                if(!done_smm)
                                    setTimeout("startProgress_smm()", 100);
                                //task done, enable the button and reset variables
                                else
                                {
                                    document.getElementById("startBtn-smm").disabled = false;
                                    done_smm = false;
                                    currProgress_smm = 0;
                                }
                            }