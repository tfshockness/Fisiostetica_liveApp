<?php 
$title = "Procedimentos";
$subtitle = "Lista de Procedimentos";
?>

@extends ('layouts.layout')

@section('content')
<div id="procedures">
    <div class="form-group" style="width: 95%; margin: 0 auto;">
        @include('layouts.error')
    </div>

    <div class="col-md-12">
        <div class="box">
        
            <div class="row search-box center">
                <div class="col-md-1">
                    <a class="btn btn-app bg-olive" @click.prevent="showAdd"><i class="fa fa-plus "></i>Novo</a>
                </div>
                <form class="inline-form col-md-10" action="/procedimentos" method="GET">
                    <fieldset class="form-group">
                        <div class="box-header">
                            <div class="col-md-1">
                                <label for="search">Buscar: </label>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="search" name="search" placeholder="Digite o nome do procedimento" >
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn bg-blue form-control" value="buscar" >
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            {{-- PLACE FOR PUT ADD AND EDIT PROCEDURES --}}

            <transition name="fade">
                <app-add-procedure v-if="isThere" :closing="closing"></app-add-procedure>
            </transition>
            
            {{-- END THE PLACE FOR ADD AND EDIT --}}
            <div class="box-body table-bordered no-padding">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>Nome</th>
                            <th>Opções</th>
                        </tr>
                    @foreach ($procedures as $procedure)
                        <tr>
                            <td>{{$procedure->name}}</td>
                            <td>
                                <a class="btn bg-olive" href="/procedimentos/{{$procedure->id}}/edit">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div> {{-- end box-body --}}
            <div class="box-footer pagination" align="center" style="width:100%">
            {{ $procedures->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
{{-- 
@section('script')

    <script>
var addProcedure = { template:
`
                    <div id="add-procedure">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title center">Adicionar Procedimento</h3><span class="close" @click="closing">x</span>
                                    <form role="form" class="form-horizontal" action="/procedimentos" method="POST">
                                        {{ csrf_field() }}
                                            <div class="form-group" style="padding-top:20px;">
                                                <label for="first_name" class="col-sm-2 control-label">Nome</label>

                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="name" placeholder="Procedimento" value="" name="name" required>
                                                </div>

                                            </div>

                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Adicionar</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                    </div>
`,
    props:['closing']
};


        new Vue({
            el:'#procedures',
            data:{
                isThere: false
            },
            methods: {
                showAdd(){
                    this.isThere = true;
                },
                closing(){
                    this.isThere = false;
                }
            },
            components: {'add-procedure': addProcedure},
            created(){
                this.$on('closeAdd', this.closing);
            }
        })
    </script>
@endsection --}}