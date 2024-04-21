@extends('layouts.layout')

@section('title', 'Prodmais - Perfil do pesquisador - ' . $id->name)

@section('content')

<main id="profile" class="c-wrapper-container">
    <div class="c-wrapper-paper">
        <div class="c-wrapper-inner">

            <div id="top"></div>
            <div class="p-profile-header">
                <div class="p-profile-header-one">

                    <div class="c-who-s">
                        <img class="c-who-s-pic"
                            src="https://servicosweb.cnpq.br/wspessoa/servletrecuperafoto?tipo=1&amp;bcv=true&amp;id={{ $id->lattesID10 }}" />
                    </div>

                </div>
                <div class="p-profile-header-two">
                    <h1 class="t-h1">
                        {{ $id->name }}
                    </h1>

                    @if(is_array($id->instituicao))
                    @foreach ($id->instituicao as $instituicao)
                    <h3 class="t t-prof">{{ $instituicao }}</h3>
                    @endforeach
                    @endif

                    @if(is_array($id->ppg_nome))
                    @foreach ($id->ppg_nome as $ppg_nome)
                    <p class="t t-prof">Programa de Pós-Graduação: {{ $ppg_nome }}</p>
                    @endforeach
                    @endif

                    <hr class="c-line" />

                    <div class="p-profile-header-numbers">

                        <div class="d-icon-text u-mx-10">
                            {{ count($id->works) }}
                            <i class="i i-sm i-articlePublished" title="Trabalhos publicados"
                                alt="Trabalhos publicados"></i>
                            <span class="t">

                            </span>
                        </div>

                        <div class="d-icon-text">
                            @php
                            if (isset($id->orientacoesEmAndamento) && isset($id->orientacoesConcluidas)) {
                            $totalOrientacoesEmAndamento = array_sum(array_map("count", $id->orientacoesEmAndamento));
                            $totalOrientacoesConcluidas = array_sum(array_map("count", $id->orientacoesConcluidas));
                            $totalOrientacoes = $totalOrientacoesEmAndamento + $totalOrientacoesConcluidas;
                            echo $totalOrientacoes;
                            } elseif (isset($id->orientacoesEmAndamento)) {
                            $totalOrientacoesEmAndamento = array_sum(array_map("count", $id->orientacoesEmAndamento));
                            echo $totalOrientacoesEmAndamento;
                            } elseif (isset($id->orientacoesConcluidas)) {
                            $totalOrientacoesConcluidas = array_sum(array_map("count", $id->orientacoesConcluidas));
                            echo $totalOrientacoesConcluidas;
                            } else {
                            echo "0";
                            }

                            @endphp
                            <i class="i i-sm i-orientation" title="Orientações " alt="Orientações"></i>
                        </div>
                    </div>

                </div>
                <div class="p-profile-header-three">
                </div>
            </div>


            <div class="profile-tabs" onload="changeTab('1')">
                <div class="c-profmenu">
                    <button id="tab-btn-1" class="c-profmenu-btn" v-on:click="changeTab('1')" title="Sobre" alt="Sobre">
                        <i class="i i-sm i-aboutme c-profmenu-ico"></i>
                        <span class="c-profmenu-text">Sobre</span>
                    </button>

                    <button id=" tab-btn-2" class="c-profmenu-btn" v-on:click="changeTab('2')" title="Produção"
                        alt="Produção">
                        <i class="i i-sm i-prodsymbol c-profmenu-ico"></i>
                        <span class="c-profmenu-text">Produção</span>
                    </button>

                    <button id="tab-btn-3" class="c-profmenu-btn" v-on:click="changeTab('3')" title="Atuação"
                        alt="Atuação">
                        <i class="i i-sm i-working c-profmenu-ico"></i>
                        <span class="c-profmenu-text">Atuação</span>
                    </button>


                    <button id="tab-btn-4" class="c-profmenu-btn" v-on:click="changeTab('4')" title="Ensino"
                        alt="Ensino">
                        <i class="i i-sm i-teaching c-profmenu-ico"></i>
                        <span class="c-profmenu-text">Ensino</span>
                    </button>


                    <button id="tab-btn-5" class="c-profmenu-btn" v-on:click="changeTab('5')" title="Gestão"
                        alt="Gestão">
                        <div class="i i-sm i-managment c-profmenu-ico"></div>
                        <span class="c-profmenu-text">Gestão</span>
                    </button>
                    <button id="tab-btn-6" class="c-profmenu-btn" v-on:click="changeTab('6')" title="Pesquisa"
                        alt="Pesquisa">
                        <div class="i i-sm i-research c-profmenu-ico"></div>
                        <span class="c-profmenu-text">Pesquisa</span>
                    </button>
                </div><!-- end c-profmenu  -->
            </div> <!-- end profile-tabs -->

            <div class="c-wrapper-inner u-m-20">
                <transition name="tabeffect">
                    <div id="tab-one" class="c-tab-content" v-if="tabOpened == '1'">
                        <div class="t-justify">
                            <h3 class="t t-h3">Resumo</h3>
                            <p class="t">
                                {{ $id->resumoCVpt }}
                            </p>
                            <p class="t-right ty-light">Fonte: Lattes CNPq</p>
                        </div>
                        @if(!empty($id->resumoCVen))
                        <div class="t-justify">
                            <h3 class="t t-h3">Resumo em Inglês</h3>
                            <p class="t">
                                {{ $id->resumoCVen }}
                            </p>
                            <p class="t-right ty-light">Fonte: Lattes CNPq</p>
                        </div>
                        @endif
                        <h3 class="t t-h3">Nomes em citações bibliográficas</h3>

                        <p class="t-prof">{{ $id->nomeCitacoesBibliograficas }}</p>
                        <hr class="c-line u-my-20" />
                        <h3 class="t t-h3">Exportar dados</h3>
                        <p><a href="tools/export_old.php?&format=bibtex&search=vinculo.lattes_id:{{ $id->id }}"
                                target="_blank" rel="nofollow">Exportar produção no formato BIBTEX</a></p>
                        <hr class="c-line u-my-20" />
                        <p class="t t-b">Perfis na web</p>
                        <div class="dh">
                            <a href="https://lattes.cnpq.br/{{ $id->id }}" target="_blank" rel="external">
                                <img class="c-socialicon" src="{{url('/')}}/images/logos/logo_lattes.svg" alt="Lattes"
                                    title="Lattes" />
                            </a>
                            @if(!empty($id->orcid))
                            <a href="{{ $id->orcid }}" target="_blank" rel="external">
                                <img class="c-socialicon" src="{{url('/')}}/images/logos/logo_orcid.svg" alt="ORCID"
                                    title="ORCID" />
                            </a>
                            @endif
                        </div>

                        <hr class="c-line u-my-20" />
                        <h3 class="t t-h3">Tags mais usadas</h3>

                        <hr class="c-line u-my-20" />
                        <h3 class="t t-h3">Formação</h3>

                        <!-- Livre Docência -->

                        <!-- Doutorado -->

                        @if(isset($id->formacao['DOUTORADO']))

                        <div class="s-list">
                            <div class="s-list-bullet"><i title="formation" class="i i-academic s-list-ico"></i></div>
                            <div class="s-list-content">
                                @if($id->formacao['DOUTORADO']['@attributes']['STATUS-DO-CURSO'] ==
                                'INCOMPLETO')
                                <p class="t t-b">Status do Curso:
                                    {{ $id->formacao['DOUTORADO']['@attributes']['STATUS-DO-CURSO'] }}
                                </p>
                                @endif
                                <p class="t t-b">Doutorado em
                                    {{ $id->formacao['DOUTORADO']['@attributes']['NOME-CURSO'] }}
                                </p>
                                <p></p>
                                @if($id->formacao['DOUTORADO']['@attributes']['TITULO-DA-DISSERTACAO-TESE']
                                != '')
                                <p class="ty">
                                    Título da tese:
                                    {{ $id->formacao['DOUTORADO']['@attributes']['TITULO-DA-DISSERTACAO-TESE'] }}
                                </p>
                                @endif
                                <p class="t t-gray"></p>
                                <p class="t t-gray"></p>
                                <p class="t t-gray">Orientação:
                                    {{ $id->formacao['DOUTORADO']['@attributes']['NOME-COMPLETO-DO-ORIENTADOR'] }}
                                </p>
                                <p class="t t-gray">
                                    {{ $id->formacao['DOUTORADO']['@attributes']['NOME-INSTITUICAO'] }}
                                </p>
                                <ul class="s-list-tags">
                                    <p class="t t-gray"></p>
                                    <p class="t t-gray">
                                        {{ $id->formacao['DOUTORADO']['@attributes']['ANO-DE-INICIO'] }}
                                        a
                                        {{ $id->formacao['DOUTORADO']['@attributes']['ANO-DE-CONCLUSAO'] }}
                                    </p>
                                </ul>
                            </div>
                        </div>
                        @endif

                        <!-- Mestrado Profissionalizante -->


                        @if(isset($id->formacao['MESTRADO-PROFISSIONALIZANTE']))

                        <div class="s-list">
                            <div class="s-list-bullet"><i title="formation" class="i i-academic s-list-ico"></i></div>
                            <div class="s-list-content">
                                @if($id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['STATUS-DO-CURSO'] ==
                                'INCOMPLETO')
                                <p class="t t-b">Status do Curso:
                                    {{ $id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['STATUS-DO-CURSO'] }}
                                </p>
                                @endif
                                <p class="t t-b">Mestrado Profissionalizante em
                                    {{ $id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['NOME-CURSO'] }}
                                </p>
                                <p></p>
                                @if($id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['TITULO-DA-DISSERTACAO-TESE']
                                != '')
                                <p class="ty">
                                    Título da dissertação:
                                    {{ $id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['TITULO-DA-DISSERTACAO-TESE'] }}
                                </p>
                                @endif
                                <p class="t t-gray"></p>
                                <p class="t t-gray"></p>
                                <p class="t t-gray">Orientação:
                                    {{ $id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['NOME-COMPLETO-DO-ORIENTADOR'] }}
                                </p>
                                <p class="t t-gray">
                                    {{ $id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['NOME-INSTITUICAO'] }}
                                </p>
                                <ul class="s-list-tags">
                                    <p class="t t-gray"></p>
                                    <p class="t t-gray">
                                        {{ $id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['ANO-DE-INICIO'] }}
                                        a
                                        {{ $id->formacao['MESTRADO-PROFISSIONALIZANTE']['@attributes']['ANO-DE-CONCLUSAO'] }}
                                    </p>
                                </ul>
                            </div>
                        </div>
                        @endif


                        <!-- Mestrado -->

                        @if(isset($id->formacao['MESTRADO']))

                        <div class="s-list">
                            <div class="s-list-bullet"><i title="formation" class="i i-academic s-list-ico"></i></div>
                            <div class="s-list-content">
                                @if($id->formacao['MESTRADO']['@attributes']['STATUS-DO-CURSO'] ==
                                'INCOMPLETO')
                                <p class="t t-b">Status do Curso:
                                    {{ $id->formacao['MESTRADO']['@attributes']['STATUS-DO-CURSO'] }}
                                </p>
                                @endif
                                <p class="t t-b">Mestrado em
                                    {{ $id->formacao['MESTRADO']['@attributes']['NOME-CURSO'] }}
                                </p>
                                <p></p>
                                @if($id->formacao['MESTRADO']['@attributes']['TITULO-DA-DISSERTACAO-TESE']
                                != '')
                                <p class="ty">
                                    Título da dissertação:
                                    {{ $id->formacao['MESTRADO']['@attributes']['TITULO-DA-DISSERTACAO-TESE'] }}
                                </p>
                                @endif
                                <p class="t t-gray"></p>
                                <p class="t t-gray"></p>
                                <p class="t t-gray">Orientação:
                                    {{ $id->formacao['MESTRADO']['@attributes']['NOME-COMPLETO-DO-ORIENTADOR'] }}
                                </p>
                                <p class="t t-gray">
                                    {{ $id->formacao['MESTRADO']['@attributes']['NOME-INSTITUICAO'] }}
                                </p>
                                <ul class="s-list-tags">
                                    <p class="t t-gray"></p>
                                    <p class="t t-gray">
                                        {{ $id->formacao['MESTRADO']['@attributes']['ANO-DE-INICIO'] }}
                                        a
                                        {{ $id->formacao['MESTRADO']['@attributes']['ANO-DE-CONCLUSAO'] }}
                                    </p>
                                </ul>
                            </div>
                        </div>
                        @endif

                        <!-- Graduação -->


                        @if(isset($id->formacao['GRADUACAO']))

                        @foreach ($id->formacao['GRADUACAO'] as $graduacao)

                        <?php
                        if (isset($graduacao['@attributes'])) {
                            $graduacao = $graduacao['@attributes'];
                        }
                        ?>


                        <div class="s-list">
                            <div class="s-list-bullet"><i title="formation" class="i i-academic s-list-ico"></i></div>
                            <div class="s-list-content">
                                @if($graduacao['STATUS-DO-CURSO'] ==
                                'INCOMPLETO')
                                <p class="t t-b">Status do Curso:
                                    {{ $graduacao['STATUS-DO-CURSO'] }}
                                </p>
                                @endif
                                <p class="t t-b">Graduação em
                                    {{ $graduacao['NOME-CURSO'] }}
                                </p>
                                <p></p>
                                @if($graduacao['TITULO-DO-TRABALHO-DE-CONCLUSAO-DE-CURSO']
                                != '')
                                <p class="ty">
                                    Título do Trabalho de Conclusão de Curso:
                                    {{ $graduacao['TITULO-DO-TRABALHO-DE-CONCLUSAO-DE-CURSO'] }}
                                </p>
                                @endif
                                <p class="t t-gray"></p>
                                <p class="t t-gray"></p>
                                @if($graduacao['NOME-DO-ORIENTADOR']
                                != '')
                                <p class="t t-gray">Orientação:
                                    {{ $graduacao['NOME-DO-ORIENTADOR'] }}
                                </p>
                                @endif
                                <p class="t t-gray">
                                    {{ $graduacao['NOME-INSTITUICAO'] }}
                                </p>
                                <ul class="s-list-tags">
                                    <p class="t t-gray"></p>
                                    <p class="t t-gray">
                                        {{ $graduacao['ANO-DE-INICIO'] }}
                                        a
                                        {{ $graduacao['ANO-DE-CONCLUSAO'] }}
                                    </p>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                        @endif

                        <hr class="c-line u-my-20" />

                        <div>
                            <h3 class="t t-h3">Idiomas</h3>
                            @foreach ($id->idiomas['IDIOMA'] as $idioma)

                            <?php
                            if (isset($idioma['@attributes'])) {
                                $idioma = $idioma['@attributes'];
                            }
                            ?>
                            <div class="s-list">
                                <div class="s-list-content">
                                    <p class="t t-b">{{ $idioma["DESCRICAO-DO-IDIOMA"] }}</p>
                                    <p class="t u-mb-05">
                                        Compreende {{ $idioma["PROFICIENCIA-DE-COMPREENSAO"]  }},
                                        Fala {{ $idioma["PROFICIENCIA-DE-FALA"]  }},
                                        Lê {{ $idioma["PROFICIENCIA-DE-LEITURA"]  }},
                                        Escreve {{ $idioma["PROFICIENCIA-DE-ESCRITA"]  }}
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>




                </transition>
                <transition name="tabeffect">
                    <div id="tab-two" class="c-tab-content" v-if="tabOpened == '2'">
                        <div class="profile-pi">
                            <h3 class="t t-h3 u-mb-20">Produção</h3>


                            @foreach ($id->works as $work)

                            <li class='s-list-2'>

                                <div class='s-list-bullet'>
                                    <i>{{ $work->type }}</i><i class='i i-articlePublished s-list-ico'
                                        title='articlePublished'></i>
                                </div>

                                <div class='s-list-content'>
                                    <p class='t t-b t-md'>{{ $work->name }} ({{ $work->datePublished }})</p>

                                    @if(is_array($work->author) && count($work->author) > 0)
                                    <p class='t-gray mb-2 mt-2'><b class='t-subItem'>Autores: </b>
                                        {!! implode(', ', array_map(function($author) {
                                        return e($author['NOME-COMPLETO-DO-AUTOR']) . (!empty($author['NRO-ID-CNPQ']) ?
                                        '<a href="https://lattes.cnpq.br/' . e($author['NRO-ID-CNPQ']) . '"
                                            target="_blank" rel="external"><img class="c-socialiconalt"
                                                src="' . e(url('/')) . '/images/logos/logo_lattes.svg" alt="Lattes"
                                                title="Lattes" /></a>' : '');
                                        }, $work->author)) !!}
                                    </p>
                                    @endif


                                    @if(!empty($work->doi) or !empty($work->url))
                                    <p>Acesso ao texto completo:
                                        @if(!empty($work->doi))

                                        <a class="t t-a d-icon-text" href="https://doi.org/{{ $work->doi }}"
                                            target="blank">
                                            <img class="i-doi" src="{{ e(url('/')) }}/images/logos/doi.svg" title="doi"
                                                alt="doi">
                                        </a>

                                        @endif

                                        @if(!empty($work->url))

                                        <a href="{{ $work->url }}" target="_blank" rel="nofollow">{{ $work->url }}</a>

                                        @endif
                                    </p>
                                    @endif

                                    @if(!empty($work->educationEvent))
                                    <ul>
                                        <li>Nome do evento: {{ $work->educationEvent['name'] }}</li>
                                        <li>Cidade do evento: {{ $work->educationEvent['city'] }}</li>
                                        <li>Ano: {{ $work->educationEvent['year'] }}</li>
                                        <li>Classificação do evento: {{ $work->educationEvent['classification'] }}</li>
                                        <li>Título da publicação: {{ $work->educationEvent['isPartOf'] }}</li>
                                        <li>Volume: {{ $work->educationEvent['volumeNumber'] }}</li>
                                        <li>Fascículo: {{ $work->educationEvent['issueNumber'] }}</li>
                                        <li>Paginação:
                                            {{ $work->educationEvent['pageStart'] }}-{{ $work->educationEvent['pageEnd'] }}
                                        </li>
                                        <li>ISBN: {{ $work->educationEvent['isbn'] }}</li>
                                        <li>
                                            Editora / Cidade: {{ $work->educationEvent['publisher']['name'] }} /
                                            {{ $work->educationEvent['publisher']['city'] }}
                                        </li>
                                    </ul>
                                    @endif


                                    @if(!empty($work->isPartOf))
                                    <p class='t t-light'>
                                    <ul>
                                        <li>Publicação: {{ $work->isPartOf['name'] }}</li>
                                        <li>ISSN: {{ $work->isPartOf['issn'] }}</li>
                                        <li>Volume: {{ $work->isPartOf['volumeNumber'] }}</li>
                                        <li>Fascículo: {{ $work->isPartOf['issueNumber'] }}</li>
                                        <li>
                                            Paginação:
                                            {{ $work->isPartOf['pageStart'] }}-{{ $work->isPartOf['pageEnd'] }}
                                        </li>
                                    </ul>
                                    </p>
                                    @endif

                                    @if(!empty($work->isbn))
                                    <p class='t t-light'>
                                    <ul>
                                        <li>ISBN: {{ $work->isbn }}</li>
                                        <li>Edição: {{ $work->bookEdition }}</li>
                                        <li>País: {{ $work->country }}</li>
                                        <li>Número de páginas: {{ $work->numberOfPages }}</li>
                                        <li>Editora: {{ $work->publisher['name'] }}</li>
                                        <li>Cidade da editora: {{ $work->publisher['city'] }}</li>
                                    </ul>
                                    </p>
                                    @endif


                                    @if(is_array($work->about))
                                    <p class='d-linewrap t-gray'>
                                        Assuntos: {{ implode(", ", $work->about) }}
                                    </p>
                                    @endif

                                </div>
                            </li>
                            @endforeach

                        </div>
                    </div>
                </transition>
                <transition name="tabeffect">
                    <div id="tab-three" class="c-tab-content" v-if="tabOpened == '3'">
                        <h3 class="t t-h3 u-mb-20">Atuações</h3>
                        @foreach($id->atuacao['ATUACAO-PROFISSIONAL'] as $atuacao_profissional)
                        <h4 class="t t-subtitle">{{ $atuacao_profissional['@attributes']['NOME-INSTITUICAO'] }}</h4>
                        @foreach($atuacao_profissional['VINCULOS'] as $vinculos)
                        <?php
                        if (isset($vinculos['@attributes'])) {
                            $vinculos = $vinculos['@attributes'];
                        }
                        ?>
                        <li class='s-nobullet'>
                            <div class='s-list'>
                                <div class='s-list-bullet'>
                                    <i class='i i-working s-list-ico'></i>
                                </div>

                                <div class='s-list-content'>
                                    @if(!empty($vinculos['OUTRO-ENQUADRAMENTO-FUNCIONAL-INFORMADO']))
                                    <p class='t t-b'><a
                                            class='t-a'>{{ $vinculos['OUTRO-ENQUADRAMENTO-FUNCIONAL-INFORMADO']  }} </a>
                                    </p>
                                    @endif
                                    @if(!empty($vinculos['OUTRO-VINCULO-INFORMADO']))
                                    <p class='t t-b'><a class='t-a'>{{ $vinculos['OUTRO-VINCULO-INFORMADO']  }} </a>
                                    </p>
                                    @endif
                                    <p class='t t-gray'>{{ $vinculos['ANO-INICIO']  }} - {{ $vinculos['ANO-FIM']  }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endforeach


                    </div> <!-- end tab-three -->
                </transition>
                <transition name="tabeffect">
                    <div id="tab-four" class="c-tab-content" v-if="tabOpened == '4'">
                        <h3 class="t t-h3 u-mb-20">Ensino</h3>
                        @foreach($id->atuacao['ATUACAO-PROFISSIONAL'] as $atuacao_profissional)
                        @if(isset($atuacao_profissional['ATIVIDADES-DE-ENSINO']))
                        <h4 class="t t-subtitle">{{ $atuacao_profissional['@attributes']['NOME-INSTITUICAO'] }}</h4>
                        @foreach($atuacao_profissional['ATIVIDADES-DE-ENSINO']['ENSINO'] as $ensino )

                        @if(is_array($ensino))
                        <li class='s-nobullet'>
                            <div class='s-list'>
                                <div class='s-list-bullet'>
                                    <i class='i i-academic s-list-ico'></i>
                                </div>

                                <div class='s-list-content'>
                                    @if(isset($ensino['DISCIPLINA']))
                                    @if(is_array($ensino['DISCIPLINA']))
                                    @else
                                    <p class='t t-b'><a class='t-a'>{{ $ensino['DISCIPLINA']  }}
                                        </a>
                                    </p>
                                    @endif
                                    @endif
                                    @if(isset($ensino['@attributes']))
                                    <p class='t t-gray'>Nome do curso: {{ $ensino['@attributes']['NOME-CURSO']  }}</p>
                                    <p class='t t-gray'>Grau: {{ $ensino['@attributes']['TIPO-ENSINO']  }}</p>
                                    <p class='t t-gray'>{{ $ensino['@attributes']['ANO-INICIO']  }} -
                                        {{ $ensino['@attributes']['ANO-FIM']  }}
                                    </p>
                                    @else
                                    <p class='t t-gray'>Nome do curso: {{ $ensino['NOME-CURSO']  }}</p>
                                    <p class='t t-gray'>Grau: {{ $ensino['TIPO-ENSINO']  }}</p>
                                    <p class='t t-gray'>{{ $ensino['ANO-INICIO']  }} -
                                        {{ $ensino['ANO-FIM']  }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach

                        @if(isset($id->orientacoesEmAndamento))
                        <h3 class="t t-h3 u-mb-20">Orientações e supervisões</h3>
                        <h3 class="t t-h3 u-mb-20">Orientações e supervisões em andamento</h3>
                        @foreach($id->orientacoesEmAndamento as $orientacaoEmAndamento)
                        @foreach($orientacaoEmAndamento as $orientacao)

                        @if(isset($orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']))

                        <h4 class="t t-subtitle u-mb-20">
                            {{ $orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['NATUREZA'] }}
                            em andamento
                        </h4>
                        <ul>
                            <li class='s-nobullet'>
                                <div class='s-list'>
                                    <div class='s-list-bullet'>
                                        <i class='i i-orientation s-list-ico'></i>
                                    </div>

                                    <div class='s-list-content'>

                                        <p class='t t-b'>
                                            @if(!empty($orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['NUMERO-ID-ORIENTADO']))
                                            <a class='t-a'
                                                href="https://lattes.cnpq.br/{{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['NUMERO-ID-ORIENTADO'] }}">
                                                {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['NOME-DO-ORIENTANDO'] }}
                                            </a>
                                            @else
                                            <a class='t-a'>
                                                {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['NOME-DO-ORIENTANDO'] }}
                                            </a>
                                            @endif
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['TITULO-DO-TRABALHO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['NOME-CURSO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['NOME-INSTITUICAO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Tipo de orientação:
                                            {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['TIPO-DE-ORIENTACAO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Desde
                                            {{ $orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-DOUTORADO']['@attributes']['ANO'] }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        @endif


                        @if(isset($orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']))

                        <h4 class="t t-subtitle u-mb-20">
                            {{ $orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['NATUREZA'] }}
                            em andamento
                        </h4>
                        <ul>
                            <li class='s-nobullet'>
                                <div class='s-list'>
                                    <div class='s-list-bullet'>
                                        <i class='i i-orientation s-list-ico'></i>
                                    </div>

                                    <div class='s-list-content'>

                                        <p class='t t-b'>
                                            @if(!empty($orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['NUMERO-ID-ORIENTADO']))
                                            <a class='t-a'
                                                href="https://lattes.cnpq.br/{{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['NUMERO-ID-ORIENTADO'] }}">
                                                {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['NOME-DO-ORIENTANDO'] }}
                                            </a>
                                            @else
                                            <a class='t-a'>
                                                {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['NOME-DO-ORIENTANDO'] }}
                                            </a>
                                            @endif
                                        </p>
                                        @if($orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['TIPO']
                                        != 'NAO_INFORMADO')
                                        <p class='t t-gray'>Tipo de orientação:
                                            {{ $orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['TIPO'] }}
                                        </p>
                                        @endif
                                        <p class='t t-gray'>
                                            {{ $orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['TITULO-DO-TRABALHO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['NOME-CURSO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['NOME-INSTITUICAO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Tipo de orientação:
                                            {{ $orientacao['DETALHAMENTO-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['TIPO-DE-ORIENTACAO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Desde
                                            {{ $orientacao['DADOS-BASICOS-DA-ORIENTACAO-EM-ANDAMENTO-DE-MESTRADO']['@attributes']['ANO'] }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endif




                        @endforeach
                        @endforeach
                        @endif

                        @if(isset($id->orientacoesConcluidas))
                        <h3 class="t t-h3 u-mb-20">Orientações e supervisões em concluídas</h3>
                        <?php //echo "<pre>" . print_r($id->orientacoesConcluidas, true) . "</pre>"; 
                        ?>

                        @foreach($id->orientacoesConcluidas as $outraOrientacaoConcluida)
                        @foreach($outraOrientacaoConcluida as $outraOrientacao)

                        @if(isset($outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']))

                        <h4 class="t t-subtitle u-mb-20">
                            Orientação de
                            {{ $outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['NATUREZA'] }}
                            concluída
                        </h4>
                        <ul>
                            <li class='s-nobullet'>
                                <div class='s-list'>
                                    <div class='s-list-bullet'>
                                        <i class='i i-orientation s-list-ico'></i>
                                    </div>

                                    <div class='s-list-content'>

                                        <p class='t t-b'>
                                            @if(!empty($outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['NUMERO-ID-ORIENTADO']))
                                            <a class='t-a'
                                                href="https://lattes.cnpq.br/{{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['NUMERO-ID-ORIENTADO'] }}">
                                                {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['NOME-DO-ORIENTADO'] }}
                                            </a>
                                            @else
                                            <a class='t-a'>
                                                {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['NOME-DO-ORIENTADO'] }}
                                            </a>
                                            @endif
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['TITULO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Nome do curso:
                                            {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['NOME-DO-CURSO'] }}
                                        </p>
                                        <p class='t t-gray'>

                                        </p>
                                        <p class='t t-gray'>
                                            Tipo de orientação:
                                            {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['TIPO-DE-ORIENTACAO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Ano:
                                            {{ $outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-DOUTORADO']['@attributes']['ANO'] }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        @endif

                        @if(isset($outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']))

                        <h4 class="t t-subtitle u-mb-20">
                            Orientação de
                            {{ $outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['NATUREZA'] }}
                            concluída
                        </h4>
                        <ul>
                            <li class='s-nobullet'>
                                <div class='s-list'>
                                    <div class='s-list-bullet'>
                                        <i class='i i-orientation s-list-ico'></i>
                                    </div>

                                    <div class='s-list-content'>

                                        <p class='t t-b'>
                                            @if(!empty($outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['NUMERO-ID-ORIENTADO']))
                                            <a class='t-a'
                                                href="https://lattes.cnpq.br/{{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['NUMERO-ID-ORIENTADO'] }}">
                                                {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['NOME-DO-ORIENTADO'] }}
                                            </a>
                                            @else
                                            <a class='t-a'>
                                                {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['NOME-DO-ORIENTADO'] }}
                                            </a>
                                            @endif
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['TITULO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Nome do curso:
                                            {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['NOME-DO-CURSO'] }}
                                        </p>
                                        <p class='t t-gray'>

                                        </p>
                                        <p class='t t-gray'>
                                            Tipo de orientação:
                                            {{ $outraOrientacao['DETALHAMENTO-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['TIPO-DE-ORIENTACAO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Ano:
                                            {{ $outraOrientacao['DADOS-BASICOS-DE-ORIENTACOES-CONCLUIDAS-PARA-MESTRADO']['@attributes']['ANO'] }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        @endif

                        @if(isset($outraOrientacao['DADOS-BASICOS-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']))
                        <h4 class="t t-subtitle u-mb-20">
                            Orientação de
                            {{ $outraOrientacao['DADOS-BASICOS-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['NATUREZA'] }}
                            concluída
                        </h4>
                        <ul>
                            <li class='s-nobullet'>
                                <div class='s-list'>
                                    <div class='s-list-bullet'>
                                        <i class='i i-orientation s-list-ico'></i>
                                    </div>

                                    <div class='s-list-content'>

                                        <p class='t t-b'>
                                            @if(!empty($outraOrientacao['DETALHAMENTO-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['NUMERO-ID-ORIENTADO']))
                                            <a class='t-a'
                                                href="https://lattes.cnpq.br/{{ $outraOrientacao['DETALHAMENTO-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['NUMERO-ID-ORIENTADO'] }}">
                                                {{ $outraOrientacao['DETALHAMENTO-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['NOME-DO-ORIENTADO'] }}
                                            </a>
                                            @else
                                            <a class='t-a'>
                                                {{ $outraOrientacao['DETALHAMENTO-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['NOME-DO-ORIENTADO'] }}
                                            </a>
                                            @endif
                                        </p>
                                        <p class='t t-gray'>
                                            {{ $outraOrientacao['DADOS-BASICOS-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['TITULO'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Nome do curso:
                                            {{ $outraOrientacao['DETALHAMENTO-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['NOME-DO-CURSO'] }}
                                        </p>
                                        <p class='t t-gray'>

                                        </p>
                                        <p class='t t-gray'>
                                            Tipo de orientação:
                                            {{ $outraOrientacao['DETALHAMENTO-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['TIPO-DE-ORIENTACAO-CONCLUIDA'] }}
                                        </p>
                                        <p class='t t-gray'>
                                            Ano:
                                            {{ $outraOrientacao['DADOS-BASICOS-DE-OUTRAS-ORIENTACOES-CONCLUIDAS']['@attributes']['ANO'] }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        @endif



                        <?php //echo "<pre>" . print_r($outraOrientacao, true) . "</pre>";
                        ?>

                        @endforeach
                        @endforeach




                        @endif



                    </div> <!-- end tab-four -->
                </transition>
                <transition name="tabeffect">
                    <div id="tab-five" class="c-tab-content" v-if="tabOpened == '5'">
                        <h3 class="t t-h3 u-mb-20">Gestão</h3>


                    </div>
                </transition>
                <transition name="tabeffect">
                    <div id="tab-six" class="c-tab-content" v-if="tabOpened == '6'">
                        <h3 class="t t-h3 u-mb-20">Pesquisa</h3>



                        <h3 class="t t-h3 u-mb-20">Outras atividades técnico científicas</h3>

                    </div>
                </transition>

            </div>

            <p class="t t-lastUpdate t-right">Atualização Lattes em {{ $id->lattesDataAtualizacao }}</p>
            <p class="t t-lastUpdate t-right">Processado em {{ $id->updated_at }}</p>

        </div>

</main>


<script>
var app = new Vue({
    el: '#profile',
    data: {
        tabOpened: '2',
        isActive: false

    },
    methods: {
        changeTab(tab) {
            this.tabOpened = tab
            var tabs = document.getElementsByClassName("c-profmenu-btn")

            for (i = 0; i < tabs.length; i++)
                tabs[i].className = tabs[i].className.replace("c-profmenu-active", "")

            tabs[Number(tab) - 1].className += " c-profmenu-active"
        }
    },
    mounted: function() {
        this.changeTab(1)
    },
})
</script>

@stop