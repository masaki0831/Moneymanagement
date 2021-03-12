<!doctype html>
<html lang="ja">
    <head>
        <title>Edit</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <ul class="navbar-nav ml-auto">
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        <div class="container">
            <div style="text-align:center;">
                <h2>編集</h2>
            </div>
            <br>
            <form action="{{action('BalanceController@update')}}"method="post" style="text-align:center;" enctype="multipart/form-data">
                <div class="mx-auto" style="width: 200px;">
                    <div class="form-group row">
                        <label class="col-md-4" for="date">日付</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" style="width:200px;" name="date" value="{{ $edit_form->date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="money">金額</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" style="width:200px;" name="money" value="{{ $edit_form->money }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" name="id" value="{{ $edit_form->id }}">
                                {{ csrf_field() }}
                                <br>
                                <input type="submit" class="btn btn-primary" style="margin-left:230px;" value="更新">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <div style="text-align: right;">
            <a href="/" class="button">戻る</a>
            </div>
        </div>
    </body>
</html>