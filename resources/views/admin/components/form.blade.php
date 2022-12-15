<form method="{{ str($method)->lower() == 'get' ? 'GET' : 'POST' }}" action="{{$action}}" {{$attributes}}>
    @csrf
    @if (str($method)->lower() == 'put')
        @method('PUT')
    @elseif (str($method)->lower() == 'patch')
        @method('PATCH')
    @elseif (str($method)->lower() == 'delete')
        @method('DELETE')
    @endif
    
    {{$slot}}
</form>
