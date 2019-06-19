          <!DOCTYPE html>
          <html>
          <head>
            <title>document</title>
            <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
          </head>
          <body>
           <div class="container">
            <div class="bg-info text-white p-5">
              <a href="#" class="btn btn-secondary">Home</a>
             
              <a href="{{route('posts.create')}}" class="btn btn-secondary">Create</a>
          
            </div>
            <h1 class="display-4 text-center">All Posts</h1>
              <table class="table">
                
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    @auth
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    @endauth
                  </tr>
                </thead>
                <tbody>
                  @foreach($eshmats as $eshmat)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$eshmat->title}}</td>
                    <td>{{Str::limit($eshmat->content, 50)}}
                      <a href="{{route('posts.show', $eshmat->id)}}">see more</a>
                    </td>
                    <td><a href="{{route('posts.edit', $eshmat->id)}}">Edit</a></td>
                    <td>
                    
                      <form onsubmit="return confirm('are you sure delete this post')" action="{{route('posts.destroy', $eshmat->id)}}" class="d-inline-block" method="post"> 
                        @csrf
                        @method('delete')
                        <button class="btn-sm btn-danger">delete</button> 
                      </form>
                    
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          <div>{{$eshmat->links()}}</div>
            <div class="bg-dark text-white p-4 text-center">
              All right reserved yourname {{date('Y')}}
            </div>
           </div>
          </body>
          </html>