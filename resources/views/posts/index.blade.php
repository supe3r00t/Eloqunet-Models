<h1>Show All Post</h1>


<table>

    <th>id</th>
    <th>title</th>
    <th>body</th>
    <th>pro</th>
    @foreach($posts as $post)

        <tr>

            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>
                <a href="{{route('posts.edit',$post->id)}}">Edit</a>
               <form action="{{route('posts.destroy',$post->id)}}" method="post">
                 @method('DELETE')
                   @csrf
                   <button type="submit">SoftDelte</button>
               </form>
            </td>
        </tr>
    @endforeach
</table>
