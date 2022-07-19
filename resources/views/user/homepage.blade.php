<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
<div id="close"><i class="fa-solid fa-xmark"></i></div>
<div class="row gx-0">
    <div class="col-lg-2 col-md-4">
    <div class="d-flex flex-column flex-shrink-0 bg-light sidebar col-lg-2 col-md-4">
        <div class="text-center logo p-3">
        <img src="https://thumbs.dreamstime.com/z/freedom-symbol-neon-icon-blue-vector-smoke-effect-background-163275539.jpg" width="156" alt="logo" />
        <h5 class="mt-3"></h5>
        </div>
        <ul class="nav nav-pills flex-column mb-auto p-3">
        <li class="nav-item">
            <h3>requests</h3>               
            <br>
@foreach ($requests as $item)
@if ($item->status=1)
<h3><img src="{{asset(str_replace('public/','storage/',$item->profile_img))}}" alt="mdo" width="50" height="50" class="rounded-circle">{{$item->name}}</h3>
    <form action="" method="post"><button class="fa-solid fa-circle-check"></button></form>
    <form action="" method="post"><button class="fa-solid fa-ban"></button></form> 
@else
    there is no new requests
@endif
<hr>
@endforeach

</a>
</li>
            <ul class="nav nav-pills flex-column mb-auto p-3">
            <li class="nav-item">
         <h3><i class="fa-solid fa-user-plus"></i> add new friends</h3>
            </li>
            <br>
@foreach ($users as $item)
<h3><img src="{{asset(str_replace('public/','storage/',$item->profile_img))}}" alt="mdo" width="50" height="50" class="rounded-circle">{{$item->name}}</h3>
<form action="{{url('friendrequest/'. $item->id)}}" method="post">
    @csrf
    <button>send request</button>
</form>
<hr>   
@endforeach
            </a>
        </li>
        <br>
        <div class="dropdown p-3">
            <form action="{{url('logout')}}" method="post">@csrf
               <input type="submit" value="Log Out"class="fa-solid fa-right-from-bracket">
         </form>  </a>
        </div>
      </div>
    </div>
    <div class="col-lg-10 col-md-8">
      <div class="container">
        <div class="g-0 px-3 row">
          <div class="col-12">
            <div class="d-flex justify-content-between align-items-center navbar-dashboard p-3">
              <button id="sidebar" class="btn d-md-none d-block"><i class="fa-solid fa-bars"></i></button>
              <form class="">
                <div class="search">
                  <i class="fa fa-search"></i>
                  <input type="text" class="form-control" placeholder="search...">
                </div>
              </form>
              <div class="d-flex align-items-center">
                <div class="d-lg-block d-none me-3 profile">
                  <h5>{{Auth::user()->name}}  </h5>
                 </div>
                 <img src="{{asset(str_replace('public/','storage/',Auth::user()->profile_img))}}" alt="mdo" width="50" height="50" class="rounded-circle">
              </div>
            </div>

            <div class="title-layout">
              <div class="row py-3">
                <div class="col-md-6">
                  
               <br>
               <br>
               <h1><i class="fa-solid fa-user-shield"></i>  posts</h1>
<br>
<br>
<br>
<br>
<br>
@foreach ($users as $item)
<h3><img src="{{asset(str_replace('public/','storage/',$item->profile_img))}}" alt="mdo" width="50" height="50" class="rounded-circle">{{$item->name}}</h3>
<form action="{{url('friendrequest/'. $item->id)}}" method="post">
    @csrf
    <button>send request</button>
</form>
<hr>   
@endforeach
        
                </div>
                <div class="col-md-6">
                <p>20 june 2021</p>
                </div>
            </div>
         
            
            </div>

            
              
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>

</html>