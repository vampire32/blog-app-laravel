<x-layout>
   <div>
    <div class="container">

        <h2>
            Create Blog
        </h2>
        <form action="{{route('blog.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <lable for="title">Title</lable>
                <input  type="text" id="title" value="{{ old('title') }}" name="title" placeholder="Enter The title"/>
                 @error('title')
                 <span>{{$message}}</span>

                 @enderror
            </div>
            <div class="form-group">
                <label  for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter the description" {{ old('description') }}></textarea>
                   @error('description')
                 <span>{{$message}}</span>

                 @enderror
            </div>
            <button type="submit" class="form-btn">Create Blog</button>

        </form>
        <br>
        <a href="{{route('blog.index')}}" class="action-link view-link">Back</a>
    </div>


   </div>

</x-layout>
