<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style type="text/css">
        .text-center{
            text-align: center;
        }
        .text-rigt{
            text-align: right;
        }
        .border{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            
        }
        #t01 th {
            height: 40px;
          background-color: lightblue;
          color: #390254;
        }
    </style>


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="80%">
                    <tr>
                        <td width="20%" class="text-center"><img src="{{url('public/upload/test.png')}}" style="width: 100px; height: 100px"></td>
                        <td class="text-center" width="85%">
                            <h4><strong style="">MNR SCHOOL</strong></h4>
                            <h5><strong>Bhaluka, Mymensingh</strong></h5>
                            <h6><strong>www.mnrresource.xyz</strong></h6>
                        </td>
                        <td class="text-center"><img src="{{url('public/upload/student_images/'.$result['student']['image'])}}" style="width: 100px; height: 100px"></td>
                    </tr>
                    
                </table>


                
            </div>
            <div class="col-md-12 text-center">
                <h4 style="font-weight: bold;padding-top: -35px; text-align: center;">Result Sheet</h4>
                <h6 style="padding-top: -20px; text-align: center;">First Terminal</h6>
            </div>
            <hr style="border:dashed 1px; width: 96%; color: #DDD; margin-top: -10px">

            <table style="font-size: 12px;margin-top:;">
                         <tr>
                            <td>Student Id:</td>
                            <td>{{$result['student']['id_no']}}</td>
                          </tr>
 
                          <tr>
                            <td>Name:</td>
                          <td>{{$result['student']['name']}}</td>
                           
                          </tr>
                          <tr>
                            <td>Father's Name :</td>
                            <td>{{$result['student']['fname']}}</td>
                          </tr>
                          <tr>
                            <td>Class:</td>
                            <td>{{$result['student_class']['name']}}</td>
                          </tr>
                          <tr>
                            <td>Section:</td>
                            <td>{{$result['section']['name']}}</td>
                          </tr>
                          <tr>
                            <td>Roll No:</td>
                            <td>{{$result['roll']['roll']}}</td>
                          </tr>

                </table>
                <br><br>
                <div style=" border-radius: 25px;
                  border: 3px solid #73AD21;padding: 5px; text-align: center;
                  width: 150px;
                  height: 20px; margin-right: 30px"> New Position: 1
                    
                </div>
                <div style=" border-radius: 25px;
                  border: 3px solid #73AD21;padding: 5px; text-align: center;
                  width: 150px;
                  height: 20px;"> Higest mark: 
                    
                </div>

                <table border="1" class="text-center" style="width:100%; margin-left: 70%; margin-top: -25%; font-size: 12px">
                    <tr style="background-color: lightblue;" >
                        <th style="font-size: 10px;width: 40% " >Range Of Marks(%)</th>
                        <th>Grade</th> 
                        <th>Point</th>
                     </tr>
                         <tr>
                            <td>80-100</td>
                            <td class="text-center">A+</td>
                            <td>5.00</td>
                          </tr>
 
                          <tr>
                           <td>70-79</td>
                            <td class="text-center">A</td>
                            <td>4.00</td>
                           
                          </tr>
                          <tr>
                            <td>60-69</td>
                            <td class="text-center">A-</td>
                            <td>3.50</td>
                          </tr>
                          <tr>
                           <td>50-59</td>
                            <td class="text-center">B</td>
                            <td>3.00</td>
                          </tr>
                          <tr>
                            <td>40-49</td>
                            <td class="text-center">C</td>
                            <td>2.00</td>
                          </tr>
                          <tr>
                           <td>33-39</td>
                            <td class="text-center">D</td>
                            <td>1.00</td>
                          </tr>
                          <tr>
                           <td>0-32</td>
                            <td class="text-center">F</td>
                            <td>0.00</td>
                          </tr>

                </table>

                <table id="t01" class="border" style="width:100%;  margin-top: 30px;">
                      <tr style="">
                        <th class="border" style="width: 20%;">Subject</th>
                        <th class="border" style="width: 13%;">Full Marks</th> 
                        <th class="border" style="width: 15%;">Higest Mark</th>
                        <th class="border">Writen</th>
                        <th class="border">Mcq</th>
                        <th class="border">Practical</th> 
                        <th class="border">Total</th>
                        <th class="border">GPA</th>
                      </tr>
                      
                      <tr>
                        <td class="border">Bangla 1st part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>    
                        <td class="border">70</td>
                        <td class="border" rowspan="2">A</td>
                        </tr>
                      

                      <tr >
                        <td >Bangla 2nd Part</td>
                        <td class="border">50</td>
                        <td class="border">42</td>
                        <td class="border">30</td>
                        <td class="border">10</td>
                        <td class="border"></td>
                        
                        <td class="border">40</td>
                       
                        
                        
                      </tr>

                        <tr >
                        <td class="border">English 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">30</td>
                        <td class="border"></td>
                        
                        <td class="border">80</td>
                        <td class="border" rowspan="2">A+</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">English 1st Part</td>
                        <td class="border">50</td>
                        <td class="border">42</td>
                        <td class="border">33</td>
                        <td class="border">12</td>
                        <td class="border"></td>
                        
                        <td class="border">45</td>
                       
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr >
                        <td class="border">Bangla 1st Part</td>
                        <td class="border">100</td>
                        <td class="border">80</td>
                        <td class="border">50</td>
                        <td class="border">20</td>
                        <td class="border"></td>
                        
                        <td class="border">70</td>
                        <td class="border">A</td>
                        
                        
                      </tr>

                        <tr style="background-color: #d4f9fa;" >
                        <td class="border" colspan="2" style="height: 40px;">Total Higest Mark</td>
                        
                        <td class="border">1044</td>
                        <td class="border" colspan="3">Total Get MArk & GPA</td>
                       
                        
                        <td class="border">875</td>
                        <td class="border">A</td>
                    </tr>
                        
                        
            
                     

                      
                </table>
                <br><br><br><br><br><br>



        
            <div class="col-md-12">
                <table border="0" width="100%" style="font-size: 10px">
                    <tbody>
                        <tr>
                            <td style="width: 33%;text-align: center; ">
                                <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
                                <p>Signature Of The Guardian</p>
                            </td>
                            <td style="width: 33%;text-align: center;">
                                <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
                                <p>Signature Of The Teacher</p>
                            </td>
                            <td style="width: 34%; text-align: center;">
                                <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px;">
                                <p >Signature Of the Headmaster</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            
           </div>
        </div><br/>
        
        <hr style="border:dashed 1px; width: 100%; color: #DDD;">
        <hr style="border:dashed 1px; width: 100%; color: #DDD; margin-top: -10px">
        <i style="font-size: 10px; float: right;">Print Date: {{date("d M Y")}}</i>
        <table style="font-size: 10px; margin-left: 67%; margin-top: -20px;">
             <tr>
               <td>Powered by MN Soft, Email: clint@mnsoft.com</td>
               
            </tr>
        </table>


        
</body>
</html>