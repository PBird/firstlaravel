 @extends('master')


 @section('content')


 <div class="jumbotron">

        <img src="{{$current->imagepath}}" class="img-fluid" alt="Responsive image">

        <br>
         <br>
        <h1 class="display-3"> {{$current->title}} </h1>
        <p class="lead">  

        {{ $current->content }}


         </p>
    </div>
      <div class="row marketing">
              
      </div>

  @endsection('content') 