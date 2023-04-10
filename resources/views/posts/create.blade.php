<h1>create post new</h1>

<form action="{{route('posts.store')}}" method="post">
@csrf

    <input type="text" name="title" placeholder="Enter Title"><br><br>

    <input type="text" name="body" placeholder="Enter Body"><br><br>

    <button type="submit">Submit</button>
</form>
