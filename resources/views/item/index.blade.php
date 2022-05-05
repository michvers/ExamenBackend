<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELL.</title>
    <meta name="author" content="Michiel Verschaeve">
    <meta name="description" content="examen backend">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<section class="vh-100" style="background-color: #3da2c3;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <div class="card-body p-4">
                        <h1>To Do List</h1>
                        <form action="{{action('App\Http\Controllers\ItemController@store')}}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" id="name" placeholder="Enter A Task"
                                       name="name">
                                @if(Auth()->user())
                                <button type="submit" class="btn btn-primary mt-2">Add task <i class="fa fa-angle-right ml-2"></i>
                                </button>
                                    <input type="hidden" id="author" name="author" value="{{Auth()->user()->name}}">
                                @else
                                    <a href="{{url('register')}}" class="btn btn-primary mt-2">Add task <i class="fa fa-angle-right ml-2"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                        <ul class="list-group rounded-0">
                            @foreach($items as $item)
                            <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="..." />
                                {{$item->name}}
                                <div class="badge rounded-pill bg-primary ms-3">
                                    {{$item->author}}
                                </div>
                                @if($username == $item->author)
                                <div class="ms-5">
                                    {!! Form::open(['method' =>'DELETE', 'action' => ['App\Http\Controllers\ItemController@destroy', $item->id]])!!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                                    {!! Form::close() !!}
                                </div>
                                @elseif($role == 1)
                                    <div class="ms-5">
                                        {!! Form::open(['method' =>'DELETE', 'action' => ['App\Http\Controllers\ItemController@destroy', $item->id]])!!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                                        {!! Form::close() !!}
                                    </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
