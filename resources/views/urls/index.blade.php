@extends('adminlte::page')

@section('title', 'Minhas URLS')

@section('content_header')
<h1>URLS</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div style="display:flex; justify-content:flex-end; margin-bottom:10px;" class="col-12">
            <div style="display:flex;">
                <button type="button" class="btn btn-md btn-primary" style="margin-right:15px;" id="reloadUrls"><i class="fas fa-sync"></i> Recarregar</button>
                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Adicionar URL</button>
            </div>
        </div>
        <div class="col-12" id="gridUrls">
        
        </div>
    </div>
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="formAddUrl" action="/urls/store" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar URL</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <input type="text" class="form-control" name="url" placeholder="Ex: https://www.google.com/">
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@stop
