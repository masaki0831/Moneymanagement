<!doctype html>
<html lang="ja">
    <head>
        <title>Balance</title>
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
            <h2>残高</h2>
            
            @foreach($payments as $payment1)
            <?php
            $a=$payment1->total_money;
            ?>
            @endforeach
            @foreach($withdrawals as $withdrawal1)
            <?php
            $b=$withdrawal1->total_money;
            ?>
            @endforeach
            <h3>{{number_format($a-$b)}}円</h3>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align : center ;" >
                    <a href="/payment" class="btn btn-primary">入金</a>
                </div>
                <div class="col-md-6" style="text-align : center ;">
                    <a href="/withdrawal" class="btn btn-primary">出金</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div style="text-align:center;">
            <h2>履歴(直近5件)</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="30%">日付</th>
                                    <th width="40%">金額</th>
                                    <th width="10%">種類</th>
                                    <th width="10%"></th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($histories as $history)
                                    <tr>
                                        <td>{{$history->date}}</td>
                                        <td>{{number_format($history->money)}}円</td>
                                        <td>{{$history->name}}</td>
                                        <td>
                                            <a href="{{ action('BalanceController@edit',['id' =>$history->id,'name'=>$history->name]) }}">編集</a>
                                        </td>
                                        <td>
                                            <a href="{{ action('BalanceController@delete',['id' =>$history->id,'name'=>$history->name]) }}">削除</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <a href="/search" class="btn btn-primary">検索</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>