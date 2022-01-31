<table class="table table-bordered" style="text-align:center;">
    <thead>
        <tr>
            <th>
                URL
            </th>
            <th>
                Status
            </th>
            <th>
                Ações
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($urls as $key => $url)
        <tr>
            <td>
                {{$url->url}}
            </td>
            <td>
                {{$url->status_code}}
            </td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-default showUrl" href="/urls/show/{{$url->id}}" target="_blank" id="{{$url->id}}" title="Visualisar Resposta">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a id="{{$url->id}}" class="btn btn-default removeUrl" title="Excluir Url">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
