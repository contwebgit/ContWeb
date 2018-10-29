<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
   <div class="container">
       <a style="margin-left: 5px" class="navbar-brand col-md-5" href="/">
           <img src="{{asset('img/logo.png')}}" alt="contweb">
       </a>
       <div class="collapse navbar-collapse col-md-7" id="navbar">
           <ul class="navbar-nav">
               <li class="nav-item">
                   <a class="nav-link" href="{{route('quem-somos')}}">QUEM SOMOS </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" id="link-planos">PLANOS </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="">LINKS </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="{{route('blog')}}">BLOGS </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="{{route('contato')}}">CONTATO </a>
               </li>
               <li class="nav-item btn-ac">
                   <a class="nav-link" href="">
                       <i class="fas fa-sign-in-alt"></i>
                       ÁREA DO CLIENTE
                   </a>
               </li>
           </ul>
       </div>
   </div>
</nav>
