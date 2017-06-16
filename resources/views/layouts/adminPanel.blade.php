 @extends('adminmaster')


 @section('content')

<div class="jumbotron">

        <h1 class="display-6"> Create New Navigation menu </h1>
      
      
      <div class="row"></div>



<form action="/giris/admin/store" method="get">

<div class="form-group">
    <label for="exampleTextarea"> Content Page  </label>
    <textarea name="content" class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>

<div class="col-lg-12">
    <div class="input-group">
	      <input name="title" type="text" class="form-control" placeholder="title">
	      <input name="name" type="text" class="form-control" placeholder="routeName">
	   

	        <button class="btn btn-success" type="submit">Create</button>

 </div>

      </div>
       </form>
 <div class="jumbotron">


   <form id="formUpdate" action="/giris/admin//update" method="get">

		   <h1 class="display-6"> Update Navigation menu </h1>
		   <div class="form-group">
			    <label for="exampleTextarea"> Content Page  </label>
			    <textarea name="content" class="form-control" id="upContent" rows="3">
                 

			      </textarea>
           </div>
			   <div class="input-group">
				      <select name="secilen" id="secilen" class="form-control form-control-lg" onchange="loadFormSelected();updateFormaction()">
				     
						     <option selected>Select</option>

						     @foreach($data as $key=>$menu)

						     <option id= "{{$key}}" value="{{$menu[0]}}">  {{$menu[3]}}  </option>
						     
						     @endforeach
				      </select>

			    <input name="title" id="upTitle" type="text" class="form-control" placeholder="title">
			    <input name="name" type="text" id="upName" class="form-control" placeholder="routeName">

			   </div>
			   <button  class="btn btn-warning" type="submit">Update</button>
			    <button id="delete" class="btn btn-danger" formaction="/giris/admin//delete" type="submit">Delete</button>
    </div>
   
     
 
    </form>
      <div class="row marketing">
       
       </div>
 

  @endsection('content')
 
 <script type="text/javascript">
 	

 function updateFormaction()
 {

 		$secilen = document.getElementById('secilen').value;
 		// document.getElementById('delete').formaction ="/giris" + "/admin/" +  $secilen + "/delete"   ;

      document.getElementById('delete').setAttribute("formaction",  "/giris" + "/admin/" +  $secilen + "/delete");
      document.getElementById('formUpdate').setAttribute("action",  "/giris" + "/admin/" +  $secilen + "/update");

 }

 function loadFormSelected()
 {
      
         var array = [];
         @foreach($data as $value)
          
          var ar = [];
         ar.push('{{$value[0]}}');
         ar.push('{{$value[1]}}');
         ar.push('{{$value[2]}}'),
         ar.push('{{$value[3]}}');
         array.push(ar);

         @endforeach



 		var secilen = document.getElementById('secilen').selectedIndex-1;


 		document.getElementById('upContent').innerHTML = array[secilen][1];
 		document.getElementById('upTitle').value = array[secilen][2];
 		document.getElementById('upName').value = array[secilen][3];
 		






    

 }






 </script>