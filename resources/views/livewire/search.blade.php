<div>
    <div class="input-group">
        <input type="text" class="form-control" wire:model.live.debounce.200ms="search" placeholder="Search posts...">
    </div>
    <br>
    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Add New Post</a>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Post Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->content }}</td>
                    <td colspan="2">

                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                            <br>
                            <button wire:click="delete({{$blog->id}})" class="btn btn-danger">Delete</button>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
