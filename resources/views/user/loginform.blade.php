<form action="{{url('profile')}}" method="post" >
    @csrf
     <input type="email" name="email" placeholder="email" required> <br>
    <input type="password" name="password" placeholder="password" required> <br>
     <input type="submit" name="login">  <br>
</form>