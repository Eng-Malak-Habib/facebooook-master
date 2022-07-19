<form action="{{url('registeredaccount/profile')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <input type="text" name="name" placeholder="name" required> <br>
    <input type="email" name="email" placeholder="email" required> <br>
    <input type="password" name="password" placeholder="password" required> <br>
    <input type="number" name="mobile" placeholder="mobile" required> <br>
    <input type="file" name="profile_img" placeholder="your profile image" > <br>
    <input type="submit" name="register">  <br>
</form>