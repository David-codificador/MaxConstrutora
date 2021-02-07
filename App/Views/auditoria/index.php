
<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Auditoria</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>auditoria"><i class="fa fa-home"></i> Início</a></li>
                    <li class="active">Auditoria</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container-fluid">
            <div class="row">
              
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                   <!-- <input type="busca" class="form-control" id="busca" onkeyup="buscar()" placeholder="Digite sua busca"> -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table">
                                                <table class="table table-striped" id="tabela">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 20%;">Tipo</th>
                                                            <th scope="col" style="width: 30%;">Tabela</th>
                                                            <th scope="col" style="width: 50%;">Descrição</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary btn-labeled pull-right" id="btn-mais" onclick="listar('1')">Buscar mais registros<span class="btn-label btn-label-right"><i class="fa fa-spinner"></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="right-sidebar bg-white fixed-sidebar">
    <div class="sidebar-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Useful Sidebar <i class="fa fa-times close-icon"></i></h4>
                    <p>Code for help is added within the main page. Check for code below the example.</p>
                    <p>You can use this sidebar to help your end-users. You can enter any HTML in this sidebar.</p>
                    <p>This sidebar can be a 'fixed to top' or you can unpin it to scroll with main page.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <!-- /.col-md-12 -->

                <div class="text-center mt-20">
                    <button type="button" class="btn btn-success btn-labeled">Purchase Now<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                </div>
                <!-- /.text-center -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.sidebar-content -->
</div>
<!-- /.right-sidebar -->



<!-- Modal -->
<!-- Modal -->
<div class="iziModal" id="modal11" data-title="Auditoria" data-header-color="#3498db" data-overlay-color="rgba(41,41,41,0.9)" data-subtitle="Informações da auditoria" data-icon-class="fa fa-history" style="border-bottom: 3px solid rgb(52, 152, 219); margin-left: -300px; max-width: 600px; margin-top: -193px; overflow: hidden; display: none;">
    <div class="iziModal-wrap" style="height: auto;">
        <div class="iziModal-content" style="padding: 0px;">
            <div class="p-15" id="conteudo">

            </div>
        </div>
    </div>
</div>




