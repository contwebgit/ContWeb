@extends('templates.template')

@section('content')
    <div class="contato">
        <div class="call">
            <img src="{{asset('img/header-contato.png')}}" alt="contweb">
        </div>
        <div class="container info">
            <h3>Dúvidas, perguntas, sugestões, valores ou informações técnicas?<br>
                Entre em contato conosco, será um prazer responder sua solicitação.<br>
                Envie sua mensagem ou utilize um de nossos canais abaixo.</h3>
        </div>
        <div class="form">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 form-contato">
                        <h1>Contato</h1>
                        <form action="" method="POST">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="InputName"><img src="{{asset('img/people.png')}}" title="Nome" alt="Nome"></label>
                                        <input type="text" class="form-control" name="name" id="InputName" maxlength="100" title="Nome" placeholder="Nome" required="" autofocus="">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail"><img src="{{asset('img/email.png')}}" title="Email" alt="Email"></label>
                                        <input type="email" class="form-control" name="email" id="InputEmail" maxlength="100" title="Email" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputAssunto"><img src="{{asset('img/baloon.png')}}" title="Assunto" alt="Assunto"></label>
                                        <input type="text" class="form-control" name="assunto" id="InputAssunto" maxlength="100" title="Assunto" placeholder="Assunto" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputMessage"><img src="{{asset('img/pen.png')}}" title="Mensagem" alt="Mensagem"></label>
                                        <textarea class="form-control" name="message" id="InputMessage" maxlength="700" title="Mensagem" placeholder="Mensagem" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Enviar</button>
                        </form>
                    </div>
                    <div class="col-md-5 contato-data">
                        <div class="address"><img src="{{asset('img/local.png')}}" class="pull-left" title="Endereço" alt="Endereço">
                            <address>
                                Rua Tenente Lopes, 1233 Vila Nova<br>
                                Jaú - SP - CEP 17202-130
                            </address>
                        </div>
                        <br>
                        <div>
                            <div class="telefone">
                                <img src="{{asset('img/phone.png')}}" title="Telefone" alt="Telefone"> <a href="" title="">(14) 3411-1300</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="facebook">
                                <img src="{{asset('img/facebook.png')}}" title="Facebook" alt="Facebook"> <a href="" title="">ContWEB - Escriotório Contábil</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="hour">
                                <img src="{{asset('img/clock.png')}}" width="24px" class="pull-left" title="E-mail" alt="E-mail">
                                <p>
                                    De Segunda-Feira à Sextas-Feira<br>
                                    Das 7:30hs às 11:30hs - 13:00hs às 17:45hs
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4999.143785299157!2d-48.566986678316034!3d-22.299456393056687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c757ff9948132d%3A0x4034b8337439912d!2sAGRINCO+-+Escrit%C3%B3rio+Cont%C3%A1bil!5e0!3m2!1spt-BR!2sbr!4v1468924444728" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
    </div>
@endsection