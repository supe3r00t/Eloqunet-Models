<h1>edit post new</h1>

<form action="{{route('posts.update',$post->id)}}" method="post">
    @method('PUT')
    @csrf

    <input type="text" name="title" value="{{$post->title}}" ><br><br>

    <input type="text" name="body"value="{{$post->body}}" ><br><br>
    <button type="submit">update</button>
</form>
