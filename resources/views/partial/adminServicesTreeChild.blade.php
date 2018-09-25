
    @foreach ($childServices as $childService)
        <tr>
            <td class="table-text"><a class="m-l-15" href="{{ url('admin/services/'.$childService->id.'/edit') }}">{{ $childService->title }}</a></td>

            <!-- Task Delete Button -->
            <td>
                {!! Form::open(['url'=> 'admin/services/' . $childService->id, 'method'=>'DELETE']) !!}

                <button type="submit" onclick="if(!confirm('Тoчно удалить?')) return false;" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>
                </button>
                {!! Form::close() !!}
            </td>
        </tr>
        @if($childService->serviceCategory->count() > 0)
            @include('partial.adminServicesTreeChild',['childServices' => $childService->serviceCategory])

        @endif
    @endforeach
