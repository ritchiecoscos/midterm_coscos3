@extends('base')

@section('content')
<br><br>
<div class="">

    <div class="row">
        <div class="col-md-7 offset-md-3">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title text-white"></i> New Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/newpost')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div class="mb-3">
                            <label for="category_id">Categories</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach(App\Models\Category::all() as $c)
                                <option value="{{$c->id}}">{{$c->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="post">Post</label>
                            <textarea name="post" id="post" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <a href="/dashboard" class="btn btn-danger">Back</a>
                        <button class="btn btn-success float-end" type="submit" style="width: 100px">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

</div>
    
@endsection