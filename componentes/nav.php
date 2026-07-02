<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container">
        <!-- Nome do projeto à esquerda com ícone -->
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
            </svg>
            <span>Controle de Estoque</span>
        </a>

        <!-- Botão do menu mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
            aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links à direita -->
        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">

                <!-- Dropdown Produtos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-2" href="#" id="produtosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box me-1" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                        </svg>
                        Produtos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark border-0 shadow mt-2" aria-labelledby="produtosDropdown">
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-list-ul me-2"></i>Listar Produtos</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-plus-circle me-2"></i>Cadastrar Produto</a></li>
                        <li><hr class="dropdown-divider bg-secondary opacity-25"></li>
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-tags me-2"></i>Categorias</a></li>
                    </ul>
                </li>

                <!-- Dropdown Clientes -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-2" href="#" id="clientesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people me-1" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.22-.507.539-.487C2.566 12.645 4.044 12.162 4.92 10z"/>
                        </svg>
                        Clientes
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark border-0 shadow mt-2" aria-labelledby="clientesDropdown">
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-list-ul me-2"></i>Listar Clientes</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-person-plus me-2"></i>Cadastrar Cliente</a></li>
                        <li><hr class="dropdown-divider bg-secondary opacity-25"></li>
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-clock-history me-2"></i>Histórico de Compras</a></li>
                    </ul>
                </li>

                <!-- Dropdown Relatórios -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 py-2 rounded-2" href="#" id="relatoriosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                        </svg>
                        Relatórios
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark border-0 shadow mt-2" aria-labelledby="relatoriosDropdown">
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-box-seam me-2"></i>Estoque Atual</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-exclamation-triangle me-2"></i>Produtos em Falta</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="#"><i class="bi bi-arrow-left-right me-2"></i>Movimentações</a></li>
                    </ul>
                </li>

                <!-- Link Aulas -->
                <li class="nav-item">
                    <a href="aulas/aula01_variaveis/" class="nav-link px-3 py-2 rounded-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard me-1" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z"/>
                        </svg>
                        Aulas
                    </a>
                </li>

                <!-- Botão Sair (opcional) -->
                <li class="nav-item ms-lg-2">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-pill px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        Sair
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- CSS adicional (adicione no <head> ou em um arquivo .css) -->
<style>
 
</style>