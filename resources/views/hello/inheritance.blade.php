@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>
    <table>
        @foreach($data as $item)
        <tr>
            <th>
                {{$item['name']}}
            </th>
            <td>
                {{$item['mail']}}
            </td>
        </tr>
        @endforeach
    </table>
    <!-- <p>必要なだけ記述できます。</p>
    @each('components.item', $data, 'item')
    
    @include('components.message', ['msg_title'=>'OK', 'msg_content'=>'サブビューです。'])
    <p>Controller value<br>'message' = {{$message}}</p>
    <p>ViewComposer value<br>'view_message' = {{$view_message}}</p> -->
    <!-- @component('components.message')
        @slot('msg_title')
        CAUTION!
        @endslot

        @slot('msg_content')
        これはメッセージの表示です。
        @endslot
    @endcomponent -->
@endsection

@section('footer')
    copyright 2017 tuyano.
@endsection
