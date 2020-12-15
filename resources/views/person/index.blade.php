@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <!-- <tr><th>Name</th><th>Mail</th><th>Age</th></tr> -->
        <tr><th>Person</th><th>Board</th></tr>
        @foreach($hasItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
                <td>@if ($item->board != null)
                    <table width="100%">
                        @foreach($item->board as $obj)
                        <tr>
                            <td>{{$obj->getData()}}</td>
                        </tr>
                        @endforeach
                    </table> 
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div style="margin:10px;"></div>
    <table>
        <tr>
            <th>Person</th>
            @foreach($noItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
            </tr>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
