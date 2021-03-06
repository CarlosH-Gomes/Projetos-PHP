<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
</head>
<body>
	<nav id="sidebar" >
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Carlos Henrique</p>
          <p class="app-sidebar__user-designation">Java Developers</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" ><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Página Principal</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Cadastros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{url('/locador/listar')}}"><i class="icon fa fa-circle-o"></i>Lista de Locadores</a></li>
            <li><a class="treeview-item"  href="{{url('/imovel/listar')}}"><i class="icon fa fa-circle-o"></i>Lista de Imoveis</a></li>
            <li><a class="treeview-item" href="{{url('/cidade/listar')}}"><i class="icon fa fa-circle-o"></i> Lista de Cidades</a></li>
            <li><a class="treeview-item" href="{{url('/usuario/listar')}}"><i class="icon fa fa-circle-o"></i> Cadastrar usuario</a></li>
          </ul>
        </li>
        
        <li class="treeview" ><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Segurança</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" ><i class="icon fa fa-circle-o"></i>Grupo de Usuário</a></li>
            <li><a class="treeview-item" ><i class="icon fa fa-circle-o"></i>Permissões de Usuário</a></li>
            <li><a class="treeview-item" ><i class="icon fa fa-circle-o"></i>Escopo de Usuário</a></li>
            <li><a class="treeview-item" ><i class="icon fa fa-circle-o"></i>Usuários</a></li>
            <li><a class="treeview-item" ><i class="icon fa fa-circle-o"></i> Direitos de Acesso</a></li>
          </ul>
        </li>
        <li class="treeview" sec:authorize="hasRole('ROLE_ADMINISTRADOR') and hasRole('ROLE_USUARIO')"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-key"></i><span class="app-menu__label">Alterar Senha</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" th:href="@{/trocar/senha}"><i class="icon fa fa-circle-o"></i>Trocar Senha</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          </ul>
        </li>
      </ul>
    </aside>
	</nav>
</body>
</html>