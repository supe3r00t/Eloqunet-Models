<h1>Show All Post  soft delete</h1>


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
                <a href="{{route('post.restore',$post->id)}}">Restore</a>
                <form action="{{route('post.delete',$post->id)}}" method="get">

                    @csrf
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
