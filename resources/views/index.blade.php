@extends('templates.template')

@section('content')
    <div class="banner-home col-md-12">
        <img src="{{asset('img/banner.png')}}" alt="contweb">
    </div>
    <div class="questions">
        <div class="container">
            <div class="row">
                <div class="question col-md-4 col-xs-12">
                    <a href="{{route('o-que-e-contabilidade')}}">
                        <img src="{{asset('img/icone-contabilidade-online.png')}}" alt="contabilidade contweb">
                        <h5>O que é contabilidade online?</h5>
                    </a>
                </div>
                <div class="question col-md-4 col-xs-12">
                    <img src="{{asset('img/icone-como-funciona.png')}}" alt="contabilidade contweb">
                    <h5>Como funciona?</h5>
                </div>
                <div class="question col-md-4 col-xs-12">
                    <img src="{{asset('img/icone-servico-online.png')}}" alt="contabilidade contweb">
                    <h5>Posso optar pelo serviço online?</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="statistics">
        <div class="container">
            <div class="row">
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="age">+45</h5>
                    </div>
                    <p>Há 45 anos atuando no mercado Contábil</p>
                </div>
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="opened">+1500</h5>
                    </div>
                    <p>Empresas Abertas</p>
                </div>
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="like">+2000</h5>
                    </div>
                    <p>Empresas Atendidas</p>
                </div>
                <div class="statistic col-md-3 col-xs-12">
                    <div class="circ offset-md-3 col-md-6">
                        <h5 id="clients">+2000</h5>
                    </div>
                    <p>Clients Ativos</p>
                </div>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <div class="info1 col-md-6 align-self-center col-xs-6">
                    <img src="{{asset('img/icone-lampada.png')}}" alt="">
                    <h5>Contabilidade Completa e Especializada<br>
                        para Micro e Pequenas Empresas</h5>
                </div>
                <div class="info2 col-md-6 align-self-center col-xs-6">
                    <h5>Atendimento para os estados:<br>
                        SP - RJ - MG - GO - PR - SC - RS</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="plans" id="plans">
        <div class="container">
            <h2>Planos Mensais</h2>
            <p class="col-xs-10 offset-xs-1">The gentlemen who rented the room would sometimes take their evening meal at home in the living room that was used by everyone, and so the door to this room was often kept closed in the</p>
            <div class="row">
                <div class="plan col-md-3 col-xs-12">
                    <div class="pad">
                        <h5 class="title">Simples Nacional</h5>
                        <hr>
                        <h4>a partir de:</h4>
                        <h2><span>R$</span>65<span>,00 /mês</span></h2>
                        <hr>
                        <ul>
                            <li>Contrato sem fidelidade</li>
                            <li>Não cobramos 13º</li>
                        </ul>
                        <hr>
                        <h3 class="states">Exclusivo para<br>SP/ RJ/ MG/ GO/ PR/ SC/ RS</h3>
                        <hr>
                        <button>SIMULE UM ORÇAMENTO</button>
                    </div>
                </div>
                <div class="plan col-md-3 col-xs-12">
                    <div class="pad">
                        <h5 class="title">Lucro Presumido</h5>
                        <hr>
                        <h4>a partir de:</h4>
                        <h2><span>R$</span>100<span>,00 /mês</span></h2>
                        <hr>
                        <ul>
                            <li>Contrato sem fidelidade</li>
                            <li>Não cobramos 13º</li>
                        </ul>
                        <hr>
                        <h3 class="states">Exclusivo para<br>SP/ RJ/ MG/ GO/ PR/ SC/ RS</h3>
                        <hr>
                        <button>SIMULE UM ORÇAMENTO</button>
                    </div>
                </div>
                <div class="plan col-md-3 col-xs-12">
                    <div class="pad">
                        <h5 class="title">Lucro Real</h5>
                        <hr>
                        <h4>a partir de:</h4>
                        <h2><span>R$</span>100<span>,00 /mês</span></h2>
                        <hr>
                        <ul>
                            <li>Contrato sem fidelidade</li>
                            <li>Não cobramos 13º</li>
                        </ul>
                        <hr>
                        <h3 class="states">Exclusivo para<br>SP/ RJ/ MG/ GO/ PR/ SC/ RS</h3>
                        <hr>
                        <button>SIMULE UM ORÇAMENTO</button>
                    </div>
                </div>
                <div class="plan col-md-3 col-xs-12">
                    <div class="pad">
                        <h5 class="title">MEI</h5>
                        <hr>
                        <h4>a partir de:</h4>
                        <h2><span>R$</span>40<span>,00 /mês</span></h2>
                        <hr>
                        <ul>
                            <li>Contrato sem fidelidade</li>
                            <li>Não cobramos 13º</li>
                        </ul>
                        <hr>
                        <h3 class="states">Exclusivo para<br>SP/ RJ/ MG/ GO/ PR/ SC/ RS</h3>
                        <hr>
                        <button>SIMULE UM ORÇAMENTO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="services">
        <div class="container">
            <h2>Serviços Avulsos</h2>
            <div class="row">
                <div class="col-md-4 service col-xs-12">
                    <div class="pad">
                        <h4>ABRIR EMPRESA</h4>
                        <span class="line"></span>
                        <h5 class="description">Exclusivo para São Paulo</h5>
                        <button>SIMULE UM ORÇAMENTO</button>
                    </div>
                </div>
                <div class="col-md-4 service col-xs-12">
                    <div class="pad">
                        <h4>ALTERAR EMPRESA</h4>
                        <span class="line"></span>
                        <h5 class="description">Exclusivo para São Paulo</h5>
                        <button>SIMULE UM ORÇAMENTO</button>
                    </div>
                </div>
                <div class="col-md-4 service col-xs-12">
                    <div class="pad">
                        <h4>BAIXA DE EMPRESA</h4>
                        <span class="line"></span>
                        <h5 class="description">Exclusivo para São Paulo</h5>
                        <button>SIMULE UM ORÇAMENTO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="question-accordion">
        <div class="container">
            <h2>- Perguntas?</h2>
            <div class="panel-group col-xs-12" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item1" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>1. Quais cidades a CONTWEB atende?</a>
                        </h4>
                    </div>
                    <div id="item1" class="panel-collapse collapse">
                        <div class="panel-body">
                            Empresa exclusivamente de Prestação de Serviços nós conseguimos atender em todo o Brasil. Já os demais seguimentos nós atendemos em todo o Estado de São Paulo.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item2" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>2. Quais atividade/objetos sociais a CONTWEB não atende de forma online?</a>
                        </h4>
                    </div>
                    <div id="item2" class="panel-collapse collapse">
                        <div class="panel-body">
                            No geral, atendemos todas as atividades voltadas a Indústria, Comércio e Prestação de Serviços. Porém, não atendemos as seguintes atividades:
                            <ul>
                                <li>Entidade com ou sem fins lucrativos (isentas, imunes ou não tributadas).</li>
                                <li>Partido político.</li>
                                <li>Produtor rural.</li>
                                <li>Construtora e incorporadora.</li>
                                <li>Sociedade Anônima.</li>
                                <li>Agroindústria.</li>
                                <li>Condomínio.</li>
                            </ul>
                            <br>
                            OBS: As atividades acima são exemplificativas. Entre em contato conosco para saber se atendemos sua atividade empresarial.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item3" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>3. Quando posso iniciar minha contabilidade de forma Online com a CONTWEB?</a>
                        </h4>
                    </div>
                    <div id="item3" class="panel-collapse collapse">
                        <div class="panel-body">
                            Em qualquer mês no decorrer do ano.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default col-xs-12">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item4" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>4. Tenho uma MEI (Microempreendedor Individual), por que devo contratar um serviço
                                <br><spam style="margin-left: 50px">decontabilidade mesmo estando desobrigado?</spam></a>
                        </h4>
                    </div>
                    <div id="item4" class="panel-collapse collapse col-xs-12">
                        <div class="panel-body">
                            Mesmo que o MEI não precise manter uma escrituração contábil regular, nem possuir um contador responsável pela sua empresa, existe diversas outras razões para que um MEI contrate um serviço de contabilidade, dentre elas:
                            <ul>
                                <li>Possibilidade de distribuir lucros isentos de Imposto de Renda e INSS, comprovando assim um maior rendimento para sua Pessoa Física.</li>
                                <li>Possibilidade de obter declarações de faturamento assinadas pelo Contador, que geralmente são exigidas por bancos e instituições financeiras.</li>
                                <li>Despreocupações em se manter atualizado junto as alterações legais, principalmente no que diz respeito ao seu negócio ou seu regime tributário.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item5" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>5. Como devo proceder junto ao meu antigo Contador?</a>
                        </h4>
                    </div>
                    <div id="item5" class="panel-collapse collapse">
                        <div class="panel-body">
                            Você deverá entrar em contato com ele a fim de comunicar seu encerramento contratual, bem como sua vontade de transferir sua contabilidade. Ele deverá lhe entregar, no prazo acordado, todos os documentos legais/societários, livros fiscais, livros contábeis, folhas de pagamentos, obrigações acessórias e demais documentos relacionados a sua empresa. Qualquer dúvida nesta etapa, fique a vontade para entrar em contato conosco, para darmos todo auxílio possível.
                            <br>
                            OBS: Se a migração se der no decorrer do ano, solicitar ao antigo contador que ele faça um encerramento do balanço e livros contábeis, com fim específico de transferência de responsabilidade técnica.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item6" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>6. Deverei enviar toda documentação física entregue pelo meu antigo contador para a CONTWEB?</a>
                        </h4>
                    </div>
                    <div id="item6" class="panel-collapse collapse">
                        <div class="panel-body">
                            Não. Você deverá manter a guarda de todos esses documentos físicos aí na empresa, pelo prazo legal. Será necessário enviar alguns documentos, de forma digitalizada em PDF, em seu Ambiente Seguro, junto ao nosso portal, a fim de extrairmos alguns saldos para darmos continuidade nos serviços. Fique tranquilo, daremos todas as instruções necessárias.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item7" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>7. Precisarei possuir Certificado Digital?</a>
                        </h4>
                    </div>
                    <div id="item7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <br>Depende. Há uma tendência muito grande para que em um futuro bem próximo o Certificado Digital seja obrigatório para qualquer empresa, por isso aconselhamos a todos nossos clientes para adquirirem um, até mesmo pela grande facilidade que ele proporciona junto a diversos serviços governamentais.

                            <br>O cliente deverá enviar mensalmente seus arquivos XML´s de Notas Fiscais de Compras, Vendas e Prestação de Serviços, para que possamos efetuar sua escrituração fiscal, então, se não há o hábito por parte da empresa em efetuar a solicitação e guarda desses arquivos XML´s emitidos pelos seus fornecedores, ela deverá adquirir um certificado digital para que possamos efetuar o download dos mesmos junto ao portal do governo, possibilitando assim efetuar sua guarda legal (por 5 anos) e também garantir que a escrituração fiscal não tenha falhas.

                            <br>Na internet existem alguns sites que possibilitam a geração automática do arquivo XML, de forma gratuita, se conectando ao portal do governo por meio da digitação da Chave de Acesso constante na DANFE. Um dos sites mais utilizados é o http://www.fsist.com.br.

                            <br>OBS: A Caixa Econômica Federal, as Agências dos Correios e a ACDigital possuem os certificados digitais mais baratos no qual temos conhecimento.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item8" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>8. Como se dará a troca de informações e documentos entre minha empresa e a CONTWEB ?</a>
                        </h4>
                    </div>
                    <div id="item8" class="panel-collapse collapse">
                        <div class="panel-body">
                            A troca de informações, dúvidas e demais atendimentos poderão se dar por telefone, chat (no ambiente seguro do cliente) ou e-mail. Já a troca de documentos se dará de maneira online, pelo ambiente seguro do cliente através de arquivos digitalizados (PDF), arquivos XML´s, etc. Poderá eventualmente haver trocas de documentos por meio postal (respeitando nossa política de cobrança).
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item10" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>9. Poderei montar um plano exclusivo de contabilidade e assessoramento, diferentemente dos
                                <br><spam style="margin-left: 50px">serviços padrões praticados e calculados no formulário de orçamento?</spam></a>
                        </h4>
                    </div>
                    <div id="item10" class="panel-collapse collapse">
                        <div class="panel-body">
                            Sim, entre em contato conosco e exponha as necessidades da sua empresa. A partir daí elaboraremos um orçamento específico para poder lhe atender de forma personalizada. Geralmente empresas de médio a grande porte optam por esta forma personalizada de serviço, devido ao seu volume de documentação e necessidade constantes de orientações específicas.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 data-toggle="collapse" data-parent="#accordion" href="#item9" class="panel-title expand">
                            <i class="right-arrow pull-right">+</i>
                            <a>10. Não me adaptei a sistemática da contabilidade online, quero cancelar os serviços, o que devo fazer?</a>
                        </h4>
                    </div>
                    <div id="item9" class="panel-collapse collapse">
                        <div class="panel-body">
                            Não se preocupe, a qualquer momento você poderá cancelar seu contrato conosco. Para isso, basta solicitar formalmente o cancelamento, por e-mail ou chat de atendimento. A partir daí, concluiremos os serviços referente aquele mês corrente ao da solicitação, bem como a cobrança do mesmo e depois manteremos o Login e Senha do cliente ativo pelo período de 60 dias para que ele efetue o download de todos os arquivos, relatórios, livros fiscais, livros contábeis e demais documentos que estejam armazenados no ambiente seguro.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="courses">
        <div class="container">
            <h2 class="col-md-4 col-xs-10">CONHEÇA OS<br>
                CURSOS CONTWEB</h2>
            <button>CURSOS ONLINE</button>
        </div>
    </div>
@endsection










