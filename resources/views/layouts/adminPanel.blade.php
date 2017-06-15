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

   <form action="/giris/admin/update" method="get">

		   <h1 class="display-6"> Update Navigation menu </h1>
		   <div class="form-group">
			    <label for="exampleTextarea"> Content Page  </label>
			    <textarea name="content" class="form-control" id="exampleTextarea" rows="3"></textarea>
           </div>
			   <div class="input-group">
				      <select id="secilen" class="form-control form-control-lg" onchange="">
						     <option selected>Select</option>

						     @foreach($menus as $menu)

						     <option value="{{$menu->id}}">  {{$menu->name}}  </option>
						     
						     @endforeach
				      </select>

			    <input type="text" class="form-control" placeholder="title">
			    <input type="text" class="form-control" placeholder="routeName">

			   </div>
			   <button class="btn btn-secondary" type="submit">Comfirm</button>
			    <button class="btn btn-secondary" type="submit">Delete</button>
    </div>

    </form>
      <div class="row marketing">
       
       </div>
 

  @endsection('content')
 