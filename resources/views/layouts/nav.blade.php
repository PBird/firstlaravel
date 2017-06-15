<nav>
          <ul class="nav nav-pills float-right">


            
            @foreach($menus as $menu)
            <li class="nav-item">
            @if($current->name==$menu->name)
              <a class="nav-link active" href="/{{ $menu->name }}"> {{$menu->name}} <span class="sr-only">(current)</span></a>

            @else
              <a class="nav-link " href="/{{ $menu->name }}"> {{$menu->name}} <span class="sr-only">(current)</span></a>
            @endif
            </li>
            @endforeach

          </ul>
        </nav>