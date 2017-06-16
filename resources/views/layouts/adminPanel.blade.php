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
	      <span class="input-group-btn">
	        <button class="btn btn-secondary" type="submit">Create</button>
	      </span>
 </div>

      </div>
 <div class="jumbotron">
 </form>

   <form id="formUpdate" action="/giris/admin/4/update" method="get">

		   <h1 class="display-6"> Update Navigation menu </h1>
		   <div class="form-group">
			    <label for="exampleTextarea"> Content Page  </label>
			    <textarea name="content" class="form-control" id="exampleTextarea" rows="3">  </textarea>
           </div>
			   <div class="input-group">
				      <select name="secilen" id="secilen" class="form-control form-control-lg" onchange="updateFormaction()">
				     
						     <option selected>Select</option>

						     @foreach($menus as $menu)

						     <option value="{{$menu->id}}">  {{$menu->name}}  </option>
						     
						     @endforeach
				      </select>

			    <input name="title" type="text" class="form-control" placeholder="title">
			    <input name="name" type="text" class="form-control" placeholder="routeName">

			   </div>
			   <button  class="btn btn-secondary" type="submit">Update</button>
			    <button id="delete" class="btn btn-danger" formaction="/giris/admin/4/delete" type="submit">Delete</button>
    </div>

 <p id="d">Secilen  id  : dsdfsd</p>
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






 </script>