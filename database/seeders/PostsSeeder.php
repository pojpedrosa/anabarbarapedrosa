<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            // ── Sábado ───────────────────────────────────────────────────────
            [
                'title'        => 'Continua a distopia',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/continua-a-distopia',
                'excerpt'      => 'Ana Bárbara Pedrosa escreve sobre o regresso de Trump à presidência dos EUA e sobre como o populismo opera num espaço de pós-verdade, onde a performance substitui os factos e o narcisismo corrói a liberdade de imprensa.',
                'published_at' => '2025-01-21',
            ],
            [
                'title'        => 'Coitado do menino chorãozinho',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/coitado-do-menino-choraozinho',
                'excerpt'      => 'Uma crónica sobre Mário Machado e a tendência para o vitimismo entre quem mais intimida: a contradição entre a imagem pública de dureza e a queixa permanente de quem se sente perseguido.',
                'published_at' => '2025-01-14',
            ],
            [
                'title'        => 'O meu amigo novo',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/o-meu-amigo-novo',
                'excerpt'      => 'Reflexão sobre a relação com a inteligência artificial e o ChatGPT como ferramenta para explorar processos mentais. A autora interroga o que significa a interação digital ter substituído, em parte, a conversa humana.',
                'published_at' => '2025-01-07',
            ],
            [
                'title'        => 'Escritores nas horas vagas',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/escritores-nas-horas-vagas',
                'excerpt'      => 'Ana Bárbara Pedrosa reflecte sobre o paradoxo de escrever romances a tempo parcial: "um romance exige tempo e dinheiro", e a escassez de horas resulta em menos atenção ao detalhe e à complexidade narrativa.',
                'published_at' => '2024-12-31',
            ],
            [
                'title'        => 'A que distância fica Moçambique?',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/a-que-distancia-fica-mocambique',
                'excerpt'      => 'Crónica escrita durante a residência literária em Maputo, onde a língua partilhada se revelou estranha no seu uso local. De Lisboa a Maputo são 8407 quilómetros — uma distância que não é só geográfica.',
                'published_at' => '2024-12-17',
            ],
            [
                'title'        => 'E se fosse o teu filho?',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/e-se-fosse-o-teu-filho',
                'excerpt'      => 'A partir do caso de Gisèle Pelicot em França, a autora questiona a desigualdade na educação sobre violência sexual: ensinamos as mulheres a evitar, mas não responsabilizamos os homens pelos seus actos.',
                'published_at' => '2024-09-06',
            ],
            [
                'title'        => 'Eu não interesso a ninguém',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/eu-nao-interesso-a-ninguem',
                'excerpt'      => 'Reflexão sobre a curiosidade dos leitores pela vida pessoal dos autores e sobre a distância entre o escritor e a obra. A autora defende que a ficção deve oferecer ao leitor algo para além da biografia do criador.',
                'published_at' => '2024-07-30',
            ],
            [
                'title'        => 'Literatura gay',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/literatura-gay',
                'excerpt'      => 'Uma crítica à categorização da literatura por identidade: ao reduzir livros a símbolos, transforma-se tanto a obra como o autor em representações estreitas que limitam o diálogo cultural mais amplo.',
                'published_at' => '2024-06-04',
            ],
            [
                'title'        => 'Amar mais e sofrer mais',
                'source_name'  => 'Sábado',
                'external_url' => 'https://www.sabado.pt/opiniao/convidados/ana-barbara-pedrosa/detalhe/amar-mais-e-sofrer-mais',
                'excerpt'      => 'A partir do romance "The Only Story" de Julian Barnes, a autora explora a escolha filosófica entre amar intensamente e sofrer muito, ou proteger-se e perder a profundidade da experiência. A vulnerabilidade emocional como condição de uma vida plena.',
                'published_at' => '2024-05-28',
            ],

            // ── Mensagem de Lisboa ───────────────────────────────────────────
            [
                'title'        => 'Quando o Nonô vivia aqui',
                'source_name'  => 'Mensagem de Lisboa',
                'external_url' => 'https://amensagem.pt/2022/11/15/lisboa-cidade-quando-o-nono-vivia-aqui-cronica-ana-barbara-pedrosa/',
                'excerpt'      => 'Um amigo veio para Lisboa trabalhar numa editora e não aguentou: o custo de vida, as condições de trabalho, a exaustão. Voltou ao Minho e ficou mais feliz. Uma crónica sobre o que Lisboa promete e o que não cumpre.',
                'published_at' => '2022-11-15',
            ],
            [
                'title'        => 'Lisboa, chão sagrado o caraças',
                'source_name'  => 'Mensagem de Lisboa',
                'external_url' => 'https://amensagem.pt/2022/05/30/lisboa-chao-sagrado-o-caracas-cronica-ana-barbara-pedrosa/',
                'excerpt'      => 'Um acidente de mota perto do Estádio de Alvalade e um joelho partido servem de mote para questionar a romantização de Lisboa na literatura. "O chão profano de Lisboa fere a sério."',
                'published_at' => '2022-05-30',
            ],
            [
                'title'        => 'A maior lorpa era eu',
                'source_name'  => 'Mensagem de Lisboa',
                'external_url' => 'https://amensagem.pt/2022/03/07/a-maior-lorpa-era-eu-lisboa-compras-cronica-ana-barbara-pedrosa/',
                'excerpt'      => 'Estudante sem dinheiro num supermercado de Lisboa, uma senhora pede ajuda com as compras — e acaba por ir embora com artigos caros pagos por outra. Uma crónica sobre ingenuidade e sobre o que a cidade ensina depressa.',
                'published_at' => '2022-03-07',
            ],
            [
                'title'        => 'Comprar um T2 em Lisboa',
                'source_name'  => 'Mensagem de Lisboa',
                'external_url' => 'https://amensagem.pt/2021/12/17/comprar-um-t2-em-lisboa-cronica-ana-barbara-pedrosa/',
                'excerpt'      => 'A odisseia de um casal — Fábio e Marcela — à procura de um T2 em Lisboa: agências incompetentes, avaliações bancárias que não batem certo, penhoras, burocracia. Uma comédia de erros sobre o mercado imobiliário português.',
                'published_at' => '2021-12-17',
            ],
            [
                'title'        => 'Faltou-nos Lisboa',
                'source_name'  => 'Mensagem de Lisboa',
                'external_url' => 'https://amensagem.pt/2021/08/13/faltou-nos-lisboa-cronica-ana-barbara-pedrosa/',
                'excerpt'      => 'Uma crónica sobre a avó que sonhou a vida inteira ir a Lisboa e nunca foi. O amor que sobrevive aos planos por cumprir e às viagens que ficaram por fazer.',
                'published_at' => '2021-08-13',
            ],

            // ── Observador ──────────────────────────────────────────────────
            [
                'title'        => 'Afonso Cruz entre facas afiadas',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2026/04/25/afonso-cruz-entre-facas-afiadas/',
                'excerpt'      => 'Crítica ao novo romance de Afonso Cruz, onde o autor pega na história de uma mulher maltratada e a desenvolve longe dos clichés. Uma análise da versatilidade e da estranheza da escrita de Cruz.',
                'published_at' => '2026-04-25',
            ],
            [
                'title'        => 'Não é uma história, é a arte de Ana Margarida de Carvalho',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2026/01/11/nao-e-uma-historia-e-a-arte-de-ana-margarida-de-carvalho/',
                'excerpt'      => 'Crítica literária ao novo livro de Ana Margarida de Carvalho, onde a autora se aproxima mais da arte pura do que da narrativa convencional. Uma leitura sobre os limites entre o romance e outras formas de expressão.',
                'published_at' => '2026-01-11',
            ],
            [
                'title'        => 'Agualusa e o Deus das pequenas coisas (e de todas as outras)',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2025/11/09/agualusa-e-o-deus-das-pequenas-coisas-e-de-todas-as-outras/',
                'excerpt'      => 'Crítica ao mais recente romance de José Eduardo Agualusa, onde o escritor angolano continua a construir o seu universo de fronteiras entre o real e o fabuloso.',
                'published_at' => '2025-11-09',
            ],
            [
                'title'        => 'Coetzee e Dimópulos perdidos na tradução',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2025/11/01/coetzee-e-dimopulos-perdidos-na-traducao/',
                'excerpt'      => 'Dois grandes romances, dois problemas de tradução. Ana Bárbara Pedrosa analisa como a língua de chegada pode distorcer ou empobrecer obras que existem, antes de tudo, na precisão da sua língua original.',
                'published_at' => '2025-11-01',
            ],
            [
                'title'        => 'Quem nos manda usar o português que se fala em Lisboa?',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2025/07/05/quem-nos-manda-usar-o-portugues-que-se-fala-em-lisboa/',
                'excerpt'      => 'Ensaio sobre o prestígio linguístico e a imposição do português lisboeta como norma. Uma reflexão sobre poder, identidade e os falantes que ficam de fora quando a língua se torna território de uns e não de todos.',
                'published_at' => '2025-07-05',
            ],
            [
                'title'        => 'O drama de Haruki Murakami',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2025/05/03/o-drama-de-haruki-murakami/',
                'excerpt'      => 'Análise crítica da obra e do fenómeno Murakami: o que explica a sua recorrente presença nas listas dos leitores e o que a crítica literária tem dificuldade em reconhecer na sua escrita.',
                'published_at' => '2025-05-03',
            ],
            [
                'title'        => '"Tananarive": beleza desenhada',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2024/12/15/tananarive-beleza-desenhada/',
                'excerpt'      => 'Crítica à banda desenhada "Tananarive", onde a beleza do traço e a construção visual da narrativa se impõem com uma força própria. Uma análise do lugar da banda desenhada na literatura contemporânea.',
                'published_at' => '2024-12-15',
            ],
            [
                'title'        => '"As Filhas da Criada": um grande prémio de pequenos méritos',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2024/11/09/as-filhas-da-criada-um-grande-premio-de-pequenos-meritos/',
                'excerpt'      => 'Uma crítica discordante sobre o Booker Prize: o livro premiado não convence pela escrita, e o ensaio questiona os critérios que guiam os grandes prémios literários e o que ficou de fora.',
                'published_at' => '2024-11-09',
            ],
            [
                'title'        => 'O talento de Aramburu',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2024/08/11/o-talento-de-aramburu/',
                'excerpt'      => 'Crítica ao novo romance do autor de "Pátria", Fernando Aramburu. Uma leitura sobre o talento de um escritor que soube transformar a violência política basca em literatura universal.',
                'published_at' => '2024-08-11',
            ],
            [
                'title'        => 'Alix Garin: acima de tudo, a emoção em cada tira',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2024/07/28/alix-garin-acima-de-tudo-a-emocao-em-cada-tira/',
                'excerpt'      => 'Crítica à obra da autora belga de banda desenhada Alix Garin, onde a emoção conduz cada traço e cada pausa. Uma análise de como o desenho pode ser o meio mais directo de chegar ao leitor.',
                'published_at' => '2024-07-28',
            ],
            [
                'title'        => '"A Promessa de Hanna"',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2024/01/28/a-promessa-de-hanna/',
                'excerpt'      => 'Crítica a "A Promessa de Hanna", romance que traz ao centro uma personagem feminina marcada pela memória e pela lealdade. Uma leitura sobre o peso das promessas que atravessam gerações.',
                'published_at' => '2024-01-28',
            ],
            [
                'title'        => '"A Espera": depois dos tiros e dos mortos, o que fica da guerra?',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/2024/01/14/a-espera-depois-dos-tiros-e-dos-mortos-o-que-fica-da-guerra/',
                'excerpt'      => 'Crítica ao romance "A Espera", onde o conflito armado dá lugar a uma narrativa sobre o que fica quando as armas silenciam: o trauma, a espera, a reconstrução impossível de uma vida interrompida.',
                'published_at' => '2024-01-14',
            ],
            [
                'title'        => 'Em Maputo, o medo vem de todo o lado',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/especiais/em-maputo-o-medo-vem-de-todo-o-lado-cronica-de-uma-cidade-com-a-vida-suspensa/',
                'excerpt'      => 'Crónica escrita durante a residência literária em Moçambique. Uma cidade com a vida suspensa, onde o medo atravessa as ruas e os silêncios têm um peso diferente do que em Lisboa.',
                'published_at' => '2024-11-01',
            ],
            [
                'title'        => 'Qual literatura feminina?',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/especiais/qual-literatura-feminina/',
                'excerpt'      => 'Ensaio sobre os equívocos e armadilhas do conceito de "literatura feminina": o que se perde quando se categoriza uma obra pelo género do seu autor em vez de a ler pelo que ela é.',
                'published_at' => '2025-05-10',
            ],
            [
                'title'        => '"Girl on Girl": de mulher para mulher',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/especiais/girl-on-girl-de-mulher-para-mulher/',
                'excerpt'      => 'Análise crítica do ensaio "Girl on Girl" de Sophie Gilbert sobre misoginia e cultura popular. Uma leitura sobre como as mulheres aprendem a voltar a violência contra si próprias.',
                'published_at' => '2025-03-01',
            ],
            [
                'title'        => 'António Lobo Antunes: um mapa literário em cinco livros',
                'source_name'  => 'Observador',
                'external_url' => 'https://observador.pt/especiais/antonio-lobo-antunes-um-mapa-literario-em-cinco-livros/',
                'excerpt'      => 'Um percurso pela obra de António Lobo Antunes através de cinco romances essenciais. Uma proposta de leitura para quem quer entrar num dos universos mais exigentes e recompensadores da literatura portuguesa.',
                'published_at' => '2023-06-01',
            ],
        ];

        foreach ($posts as $data) {
            Post::firstOrCreate(
                ['title' => $data['title'], 'source_name' => $data['source_name']],
                array_merge($data, ['type' => 'article', 'is_active' => true])
            );
        }
    }
}
