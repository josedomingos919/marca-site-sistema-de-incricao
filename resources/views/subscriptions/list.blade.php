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

        <div class="app-form">
            <div class="min-row">
                <div class="col-6">
                    <div class="label-container">
                        <label>Nome do Aluno</label>
                    </div>
                    <div class="input-container">
                        <input name="name" required="" type="text" placeholder="ex.: José Ndonge" /> <i class="fas fa-text-height"></i>
                    </div>
                </div> 

                <div class="col-3">
                    <div class="label-container">
                        <label>Email</label>
                    </div>
                    <div class="input-container">
                        <input name="email" required="" type="email" placeholder="ex.: jose@gmail.com" />  <i class="fas fa-envelope"></i>
                    </div>
                </div> 

                <div class="col-3">
                    <div class="label-container">
                        <label>CPF</label>
                    </div>
                    <div class="input-container">
                        <input name="cpf" required="" type="text" placeholder="ex.: 200-344-434-34" /> <i class="fas fa-text-height"></i>
                    </div>
                </div>
            </div>

            <div class="min-row">
                
                <div class="col-6">
                    <div class="label-container">
                        <label>Endereço</label>
                    </div>
                    <div class="input-container">
                        <input name="address" required="" type="text" placeholder="ex.: São paulo, br " /> <i class="fas fa-text-height"></i>
                    </div>
                </div> 

                <div class="col-3">
                    <div class="label-container">
                        <label>Empresa</label>
                    </div>
                    <div class="input-container">
                        <input name="company" required="" type="text" placeholder="ex.: MarcaSite" />  <i class="fas fa-building"></i>
                    </div>
                </div>
                <div class="col-3">
                    <div class="label-container">
                        <label>Telefone</label>
                    </div>
                    <div class="input-container">
                        <input name="phone_number" required="" type="number" placeholder="ex.: +244 944..." />  <i class="fas fa-phone-square-alt"></i>
                    </div>
            </div> 
                
            </div>

            <div class="min-row">
                  
                <div class="col-3">
                    <div class="label-container">
                        <label>Celular</label>
                    </div>
                    <div class="input-container">
                        <input name="cell_phone" required="" type="number" placeholder="ex.: +244 999..." /> <i class="fas fa-phone-square-alt"></i>
                    </div>
                </div>

                <div class="col-6">
                    <div class="label-container">
                        <label>Tipo de Escrição</label>
                    </div> 
                    <div class="input-container">
                         <select required="true" name="type" >
                             
                            <option selected disabled value="">ex.: Profissional</option>
                             <option value="student">Estudante</option> 
                             <option value="professional">Profissional</option> 
                             <option value="associate">Associado</option> 
                         </select> 
                         <i class="fas fa-text-height"></i>
                    </div>
                </div>

                <div class="col-3">
                    <div class="label-container">
                        <label>Curso</label>  
                    </div> 
                    <div class="input-container">
                         <select required="true" name="courses_id" >
                             
                            <option selected disabled value="">ex.: Programação</option>
                            
                            
                              
                         </select> 
                         <i class="fas fa-text-height"></i>
                    </div>
                </div>


            </div> 

            <div class="min-row">
                <div class="col-3">
                    <div class="label-container">
                        <label>Senha</label>
                    </div>
                    <div class="input-container">
                        <input name="password" required="" type="password" placeholder="ex.: teste.124" /> <i class="fas fa-key"></i>
                    </div>
                </div> 

                <div class="col-3">
                    <div class="label-container">
                        <label>Confirmar Senha</label>
                    </div>
                    <div class="input-container">
                        <input name="password_confirmation" required="" type="password" placeholder="ex.: teste.124" /> <i class="fas fa-key"></i>
                    </div>
                </div> 

                <div class="col-6 d-flex align-items-center"> 
                    <button type="submit" class="btn-entrar t">Salvar</button>
                    <button id="btn_cancel" class="btn-entrar delete">Cancelar</button>
                </div>

            </div>
            
           
        </div>
    </form>
 
    <script src="../assets\scripts\dashboard.js"></script>
</body>
</html>