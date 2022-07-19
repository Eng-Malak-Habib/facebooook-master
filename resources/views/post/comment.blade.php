heyy there is comment page
<hr>
@foreach ($comment as $item)

<img src="{{asset(str_replace('public/','storage/',$item->profile_img))}}" alt="mdo" width="50" height="50" class="rounded-circle">
{{$item->name}} <br>
<h6>{{$item->created_at}}  </h6><br> 

   {{$item->content}}
   <br><br>
 <input type="submit" value="like">
  <input type="submit" value="replay">
 <br> 
 
   <hr>
@endforeach
