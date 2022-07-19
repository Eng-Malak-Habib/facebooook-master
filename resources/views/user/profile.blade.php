

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
          <h5 class="mt-3">fell freedoom feel safe</h5>
        </div>
        <ul class="nav nav-pills flex-column mb-auto p-3">
          <li class="nav-item">
            <a href="./dashboard.html" class="nav-link active" aria-current="page">
              <i class="fa-solid fa-house"></i>Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="./appointments.html" class="nav-link link-dark">
              <i class="fa-solid fa-file-waveform"></i>Appointments
            </a>
          </li>
          <li class="nav-item">
            <a href="./patients.html" class="nav-link link-dark">
              <i class="fa-solid fa-user-shield"></i>  posts
       
            </a>

          </li>
          <li class="nav-item">
            <a href="#" class="nav-link link-dark">
              <i class="fa-solid fa-images"></i>
            </a>
          </li>
        </ul>
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
                  <form action="{{url('home')}}" method="get">
                    <button> <h5>{{Auth::user()->name}}  </h5></button>
                  </form>
                 
                 </div>
                 <img src="{{asset(str_replace('public/','storage/',Auth::user()->profile_img))}}" alt="mdo" width="50" height="50" class="rounded-circle">
              </div>
            </div>

            <div class="title-layout">
              <div class="row py-3">
                <div class="col-md-6">
                  <h3>posts</h3>
                <form action="{{url('posting')}}" method="post">
                    @csrf
                    <textarea name="content"   cols="30" rows="10"></textarea>
                 <input type="number" value="{{Auth::user()->id}}" readonly hidden>
                <input type="submit" value="posts">
                </form>
               <br>
               <br>
               <h1><i class="fa-solid fa-user-shield"></i>  posts</h1>
<br>
<br>
<br>
<br>
                @foreach ($posts as $item)
                
                <img src="{{asset(str_replace('public/','storage/',$item->profile_img))}}" alt="mdo" width="50" height="50" class="rounded-circle">
                {{$item->email}} <br>
                <h6>{{$item->created_at}}  </h6><br> 
                <h2>{{$item->content}} </h2>  <br> <br>
                
                <form action="{{url('addcomment')}}" method="post">
                    @csrf
                    <input type="number" name="post_id" value="{{$item->id}}" hidden readonly required >
                <input type="text" name="content" required>
              <button class="fa-solid fa-comment" ></button>
            </form>
                <br> 
              
              <form action="{{url('like/'.$item->id)}}" method="post">
                @csrf
                  {{$count}} <button class="fa-solid fa-heart"> </button>   </form>

                <form action="{{url('share/'.$item->id)}}" method="post">@csrf<button class="fa-solid fa-share"> </button></form>   <br>
                
                <form action="{{url('showcomment/'.$item->id)}}" method="post">
                  @csrf
                <input type="submit" value="show comments"></form>
<hr>
  @endforeach

                <hr>   
          
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