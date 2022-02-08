@extends('layouts.master')

@section('content')
    @php
        use App\Models\QRCode;
            $page = app('request')->input('page');
            if( $page != '' && $page > 0){
                $pageNumber = $page;
            }else{
                $pageNumber = 1;
            }

        $search = app('request')->input('search');
        if($search != ''){
           $items = QRCode::where('code','like', '%'. $search . '%')
                   ->orWhere('id', $search)
                   ->orWhere('url','like', '%'. $search . '%')
                   ->orWhere('type','like', '%'. $search . '%')
                   ->orderBy('id')
                   ->take(10)
                   ->paginate(5, ['*'], 'page', $page);
        }else{
                $items = QRCode::paginate(6, ['*'], 'page', $page);
        }

        $modelAttributes = Schema::getColumnListing('q_r_codes')
    @endphp

    <div>
        <h1>QR</h1>
        <div class="table-header">
            <div class="search-container">
                <div>
                    <form method="get">
                        @csrf
                        <input type="text" id="search" name="search"/>
                        <input type="submit" value="find">
                    </form>
                </div>
            </div>
            <a class="button button-primary" href="{{ url('dbms/qr/new') }}">new</a>
        </div>
        <table class="db-table">
            <thead>
            <tr>
                @foreach($modelAttributes as $modelAttribute)
                    <td>{{$modelAttribute}}</td>
                @endforeach
                <td>
                    QR code
                </td>
                <td>

                </td>
            </tr>
            </thead>
            <tbody>


            @if($items->count() > 0)
                @foreach($items as $item)
                    <tr>
                        @foreach($item->toArray() as $key => $value)
                            @if($key = "created_at" || $key = "updated_at")

                                <td>{{$value}}</td>

                            @else
                                <td>{{$value}}</td>
                            @endif

                        @endforeach
                            <td>
                                <div>
                                    <a class="button" href="{{ url('dbms/qr/view/' .$item->id) }}">show</a>
                                </div>
                            </td>
                        <td>
                            <div class="row-controls-container">
                                <div class="row-controls">
                                    <form action="{!! action([\App\Http\Controllers\QrController::class, 'delete']) !!}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" id="{{$item->id}}" name="id" value="{{$item->id}}"/>
                                        <input type="submit" value="delete">
                                    </form>
                                    <a class="button" href="{{ url('dbms/qr/update' , [ 'id' => $item->id ]) }}">Edit</a>
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        <div class="pagination-container">
            @if($pageNumber > 1)
                <form method="get">
                    @csrf
                    <input type="hidden" id="forward" name="page" value="{{$pageNumber - 1}}"/>
                    <input type="submit" value="<">
                </form>
            @endif

            @if($items->hasMorePages())
                <form method="get">
                    @csrf
                    <input type="hidden" id="forward" name="page" value="{{$pageNumber + 1}}"/>
                    <input type="submit" value=">">
                </form>
            @endif
        </div>

    </div>
@endsection
