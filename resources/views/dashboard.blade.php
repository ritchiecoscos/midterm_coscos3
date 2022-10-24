@extends('base')
@section('content')

<div class="container-fluid" style="background-color: #d6d4b4">
        <div class="col-md-12" id="dashboard">
            <div class="float-end mt-4">
                <a href="/newpost" class="btn btn-primary">
                 New Post
                </a>
            </div>
            <hr>
            <h1 class="pt-2 pb-2">Recent Post</h1>
            <hr>
            <div class="body">
                @foreach($posts as $p)
                @if ($p->user->gender == 'Male')
                <div title="male" class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightblue; border-radius: 1.5em">
                @else
                <div class="card m-1 mb-3 pb-3 pt-3" style="background-color: lightpink; border-radius: 1.5em">
                @endif
                    <div class="card-body">
                    <div class="dropdown float-end">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$p->category->category}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach(App\Models\User::whereHas('posts', function($query) use ($p){
                            $query->where('category_id', $p->category_id);
                        })->get() as $u)
                        <li><a class="dropdown-item" href="/authors/{{$u->id}}">{{$u->name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                    <h5 class="card-title pb-3">{{$p->user->name}}</h5>
                    <p class="card-text bg-white p-3" style="border-radius: 10px;">{{$p->post}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
        </div>
</div>

@endsection