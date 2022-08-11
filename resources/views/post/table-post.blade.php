<div class="add-post text-center my-3">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
        Add Post
    </button>
    <button type="button" class="btn btn-danger" id="deleteSelected">
        Delete Selected Posts
    </button>
    <hr>
    <h2>All Posts</h2>
    <hr>
</div>
<div class="col-12">
    <table class="table" id="table">
        <thead>
          <tr>
            <th scope="col"><input type="checkbox" id="idAll"></th>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Author</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr id="{{$post->id}}">
                    <td><input type="checkbox" name="idPost" value="{{$post->id}}"></td>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>
                        <a href="" onclick="editPost({{$post->id}})" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="deletePost({{$post->id}})" class="btn btn-danger rounded-0">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
    
</div>