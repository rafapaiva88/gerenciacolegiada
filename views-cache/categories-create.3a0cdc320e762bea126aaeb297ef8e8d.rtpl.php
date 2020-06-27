<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Unidades
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/unidades">Unidades</a></li>
    <li class="active"><a href="/unidades/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Unidade</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/unidades/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="desunidade">Nome da Unidade</label>
              <input type="text" class="form-control" id="desunidade" name="desunidade" placeholder="Digite o nome da unidade">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->