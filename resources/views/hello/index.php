@extends('layouts.helloapp')

<sytle>
    .pagination {font-size:10px;}
    .pagination {display:inline-block}
</sytle>

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>Name</th><th>Mail</th><th>Age</th>
    </tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td><{{$item->mail}}/td>
            <td>{{$item->age}}</td>
        </tr>
    @endforeach
</table>
{{$items->links()}}
@endsection
