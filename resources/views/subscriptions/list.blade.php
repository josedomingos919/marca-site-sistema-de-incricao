<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="../assets/img/logo.png">
    <link href="../assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard.css" rel="stylesheet" type="text/css">
    
    <script src="../assets\js\jquery-3.6.0.js"></script>
    <script src="../assets\scripts\util.js"></script> 
</head>
<body>

    <section class="nav-container">
        <div class="container-nav-sub">
            <div class="div-img-user">
                <img src="../assets\img\user.jpg" alt="user" >
            </div> 
            <div class="user-info-div">
                <label id="id_user_name" ></label><br>
                <label id="id_user_acess" ></label>
            </div>
        </div>

        <div class="list-contaniner">

            @foreach($routes as $e)  
                <a href="{{ $e['path'] }}" class="list-item {{ @$e['active'] }}">
                    <label><i class="fas fa-users"></i></label><label>{{ $e['title'] }}</label>
                </a>
            @endforeach  
         
        </div>

        <div class="div-logout"> 
            <button onClick="logOut()">
                <label><i class="fas fa-sign-out-alt"></i> </label><label> Sair</label>
            </button>
        </div>
    </section>

    <form class="app-container" id="frm">
        <div class="header-container"> 
          <div class="header-icon">  <i class="fas fa-users"></i> </div> {{ $breadcrumbs }} 
        </div>

        <div class="app-form t">
            <div class="min-row">
                <div class="col-6">
                    <div class="label-container">
                        <label>Pesquisar</label>
                    </div>
                    <div class="input-container">
                        <input id="idSearh" name="name" required="" type="text" placeholder="ex.: esperando..." /> <i class="fas fa-search"></i>
                    </div>
                </div> 

                <div class="col-3">
                    <div class="label-container">
                        <label>Limite</label>
                    </div> 
                    <div class="input-container">
                         <select  id="limitSelect" required="true" name="type" >
                             <option value="5">5</option> 
                             <option value="10">10</option> 
                             <option value="20">20</option> 
                             <option value="50">50</option> 
                             <option value="70">70</option> 
                             <option value="90">90</option> 
                             <option value="100">100</option>  
                         </select> 
                         <i class="fas fa-sort-numeric-up-alt"></i>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="label-container">
                        <label>Categoria</label>
                    </div> 
                    <div class="input-container">
                         <select required="true" id="idCategoriType" name="type" >
                             <option selected value="" >ex.: Profissional</option>
                             <option value="student">Estudante</option> 
                             <option value="professional">Profissional</option> 
                             <option value="associate">Associado</option> 
                         </select> 
                         <i class="fas fa-filter"></i>
                    </div>
                </div>
            </div>

            <div class="min-row table_c">
                <table class="table">
                    <thead>
                        <tr>  
                            <th scope="col">#</th>
                            <th scope="col">Inscrito</th>
                            <th scope="col">Data/Inscrição</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="idTbody">
                        
                    </tbody>
                </table> 
            </div>
           
            <div  class="min-row mt-2" >
                <nav aria-label="Page navigation example">
                    <ul id='IdPage' class="pagination"></ul>
                </nav>
            </div>

            <div  class="min-row mt-5" >
                <div class="col-6 d-flex align-items-center"> 
                    <button type="submit" class="btn-entrar t">Exportar PDF</button>
                    <button id="btn_cancel" class="btn-entrar delete">Exportar XSL</button>
                </div>
            </div>
           
        </div>
    </form>
 
    <script src="../assets/scripts/subscriptions.js"></script>
</body>
</html>