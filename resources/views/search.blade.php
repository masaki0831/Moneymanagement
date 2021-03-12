<!doctype html>
<html lang="ja">
    <head>
        <title>Search</title>
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
        <div style="text-align:center;">
            <h2>検索</h2>
        </div>
        <br>
        <form action="{{action('BalanceController@search')}}" method="get" style="text-align:center;">
                <div class="form-group" >
                    <label for="date">日付</label>
                    <div class="mx-auto" style="width: 200px;">
                        <input type="date" class="form-control"style="width:200px;" name="date" value="date">
                    </div>
                </div>
                <div class="form-group">
                    <input type="radio" name="name" value="入金"checked="checked">入金
                    <input type="radio" name="name" value="出金">出金
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">検索</button>
        </form>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                @if(!empty($queries))
                <table class="table">
                    <thead>
                        <th width="40%">日付</th>
                        <th width="40%">金額</th>
                        <th width="20%">種類</th>
                    </thead>
                    <tbody>
                        @foreach($queries as $query)
                            <tr>
                                <td>{{$query->date}}</td>
                                <td>{{number_format($query->money)}}円</td>
                                <td>{{$query->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                @endif
                </div>
            </div>
            <div style="text-align: right;">
                <a href="/" class="button">戻る</a>
            </div>
        </div>
    </body>
</html>