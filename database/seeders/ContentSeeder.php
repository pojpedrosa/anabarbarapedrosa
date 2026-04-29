<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Event;
use App\Models\Page;
use App\Models\Review;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedBooks();
        $this->seedReviews();
        $this->seedEvents();
        $this->seedPages();
        $this->seedSiteSettings();
    }

    private function seedBooks(): void
    {
        $books = [
            [
                'title'     => 'Lisboa, Chão Sagrado',
                'isbn'      => '9789722538688',
                'publisher' => 'Bertrand Editora',
                'year'      => 2019,
                'pages'     => 224,
                'synopsis'  => 'O romance acompanha cinco personagens — Eduarda, Mariana, Noé, Matias e Dulcineia — cujas histórias se entrecruzam entre Lisboa, o Rio de Janeiro, o interior da Bahia e a Palestina. A narrativa explora relações íntimas e conflitos emocionais através de um olhar em que o corpo serve de espaço para resolver diversas lutas humanas: o amor, o luto, o tédio e o desejo, enquanto examina as expectativas frustradas e a improvisação da vida.',
                'buy_links' => [['label' => 'Bertrand', 'url' => 'https://www.bertrand.pt/livro/lisboa-chao-sagrado-ana-barbara-pedrosa']],
                'is_featured' => false,
                'sort_order' => 40,
            ],
            [
                'title'     => 'Palavra do Senhor',
                'isbn'      => '9789722541091',
                'publisher' => 'Bertrand Editora',
                'year'      => 2021,
                'pages'     => 144,
                'synopsis'  => 'Neste romance experimental, Deus toma a palavra para esclarecer os mal-entendidos históricos em torno dos acontecimentos bíblicos. Os humanos interpretaram mal as acções divinas, dando origem a relatos distorcidos. Com prosa irreverente, espirituosa e herética, o livro apresenta a versão corrigida de Deus sobre os eventos que divergiram das escrituras.',
                'buy_links' => [['label' => 'Bertrand', 'url' => 'https://www.bertrand.pt/livro/palavra-do-senhor-ana-barbara-pedrosa/24480638']],
                'is_featured' => false,
                'sort_order' => 30,
            ],
            [
                'title'     => 'Amor Estragado',
                'isbn'      => '9789722545310',
                'publisher' => 'Bertrand Editora',
                'year'      => 2023,
                'pages'     => 208,
                'synopsis'  => 'O romance acompanha dois irmãos enquanto assistem ao desmoronamento da família. O casamento de Manel com Ema termina em tragédia quando ele a mata. Às voltas com o alcoolismo e incapaz de lidar com as desilusões da vida, Manel espera apoio incondicional da família. O irmão Zé recusa-se a desculpar a violência. Através de uma narrativa brutal, o livro explora os laços familiares, as certezas da infância traídas pela vida adulta, o ciúme, a degradação causada pela dependência e a culpa partilhada entre o agressor e os que falharam na intervenção.',
                'buy_links' => [['label' => 'Bertrand', 'url' => 'https://www.bertrand.pt/livro/amor-estragado-ana-barbara-pedrosa/28263904']],
                'is_featured' => true,
                'sort_order' => 20,
            ],
            [
                'title'     => 'Viagens com o Mehdi',
                'isbn'      => '9789722548045',
                'publisher' => 'Bertrand Editora',
                'year'      => 2024,
                'pages'     => 192,
                'synopsis'  => 'Um livro de viagens que documenta a amizade entre Ana Bárbara e Mehdi por várias paisagens. Apesar dos desafios físicos e emocionais, o vínculo entre os dois aprofunda-se através de experiências partilhadas e silêncios significativos. A narrativa entrelaça múltiplos destinos com a história íntima de uma relação fraterna que transcende fronteiras culturais.',
                'buy_links' => [['label' => 'Bertrand', 'url' => 'https://www.bertrand.pt/livro/viagens-com-o-mehdi-ana-barbara-pedrosa/30129790']],
                'is_featured' => true,
                'sort_order' => 10,
            ],
        ];

        foreach ($books as $data) {
            Book::updateOrCreate(
                ['isbn' => $data['isbn']],
                $data,
            );
        }
    }

    private function seedReviews(): void
    {
        $bookIds = Book::pluck('id', 'title');

        $reviews = [
            // Lisboa, Chão Sagrado
            [
                'critic'       => 'Itamar Vieira Junior',
                'source'       => null,
                'quote'        => 'Este livro é uma lufada de juventude, no meio da mesmice da nossa literatura contemporânea.',
                'book_title'   => 'Lisboa, Chão Sagrado',
                'sort_order'   => 10,
            ],
            [
                'critic'       => 'José Riço Direitinho',
                'source'       => 'Público',
                'quote'        => 'Uma escrita singular que impressiona pelo arrojo e versatilidade, pelo tom coloquial que nunca se perde.',
                'book_title'   => 'Lisboa, Chão Sagrado',
                'sort_order'   => 20,
            ],
            // Palavra do Senhor
            [
                'critic'       => 'João Céu e Silva',
                'source'       => 'Diário de Notícias',
                'quote'        => 'Uma escrita empolgante que se lê com pressa, resultando num dos grandes romances publicados neste princípio de década.',
                'book_title'   => 'Palavra do Senhor',
                'sort_order'   => 30,
            ],
            [
                'critic'       => 'Sérgio Almeida',
                'source'       => 'Jornal de Notícias',
                'quote'        => 'Com apreciável desembaraço linguístico e uma ainda mais notável cultura canónica, Ana Bárbara Pedrosa abalança-se numa missão de indesmentível arrojo.',
                'book_title'   => 'Palavra do Senhor',
                'sort_order'   => 40,
            ],
            // Amor Estragado
            [
                'critic'       => 'Sérgio Almeida',
                'source'       => 'Jornal de Notícias',
                'quote'        => 'Somos engolidos para o vórtice de emoções desde o impactante primeiro parágrafo.',
                'book_title'   => 'Amor Estragado',
                'sort_order'   => 50,
            ],
            [
                'critic'       => 'Manuel Alberto Valente',
                'source'       => 'Expresso',
                'quote'        => 'Uma das vozes mais desenvoltas da novíssima literatura portuguesa. Amor Estragado é um grande livro.',
                'book_title'   => 'Amor Estragado',
                'sort_order'   => 60,
            ],
            [
                'critic'       => 'Sara Figueiredo Costa',
                'source'       => 'Blimunda',
                'quote'        => 'A autora regressa ao romance com uma narrativa onde a linguagem coloquial encenada com perícia abre portas.',
                'book_title'   => 'Amor Estragado',
                'sort_order'   => 70,
            ],
            [
                'critic'       => 'Francisco José Viegas',
                'source'       => 'Correio da Manhã',
                'quote'        => 'É um trabalho sério, sensual, bem escrito.',
                'book_title'   => 'Amor Estragado',
                'sort_order'   => 80,
            ],
            // Viagens com o Mehdi
            [
                'critic'       => 'Ângela Marques',
                'source'       => 'Sábado',
                'quote'        => 'Se chamar-lhes almas gémeas soa a eufemismo, apelidar de livro de viagens este será pecar por defeito.',
                'book_title'   => 'Viagens com o Mehdi',
                'sort_order'   => 90,
            ],
            // General
            [
                'critic'       => 'Maria Moreira Rato',
                'source'       => 'Sol',
                'quote'        => 'Aos 31 anos é encarada pela crítica como uma das maiores vozes da nova geração literária portuguesa.',
                'book_title'   => null,
                'sort_order'   => 100,
            ],
        ];

        foreach ($reviews as $data) {
            $exists = Review::where('critic', $data['critic'])
                ->where('quote', $data['quote'])
                ->exists();

            if (!$exists) {
                Review::create([
                    'critic'      => $data['critic'],
                    'source'      => $data['source'],
                    'quote'       => $data['quote'],
                    'book_id'     => $data['book_title'] ? ($bookIds[$data['book_title']] ?? null) : null,
                    'sort_order'  => $data['sort_order'],
                    'is_active'   => true,
                ]);
            }
        }
    }

    private function seedEvents(): void
    {
        $events = [
            [
                'title'       => 'Conversa com Lucílio Manjate',
                'description' => 'Conversa com o escritor Lucílio Manjate na Fundação Fernando Leite Couto.',
                'location'    => 'Fundação Fernando Leite Couto, Maputo, Moçambique',
                'starts_at'   => '2026-08-20 18:00:00',
                'is_active'   => true,
            ],
            [
                'title'       => 'Conferência na Universidade Pedagógica',
                'description' => 'Conferência na Universidade Pedagógica de Maputo.',
                'location'    => 'Universidade Pedagógica, Maputo, Moçambique',
                'starts_at'   => '2026-08-25 15:00:00',
                'is_active'   => true,
            ],
            [
                'title'       => 'Entre quem lê — Feira do Livro de Vila Real',
                'description' => 'Conversa com Sérgio Godinho na Feira do Livro de Vila Real.',
                'location'    => 'Feira do Livro de Vila Real',
                'starts_at'   => '2026-09-19 21:00:00',
                'is_active'   => true,
            ],
        ];

        foreach ($events as $data) {
            Event::firstOrCreate(['title' => $data['title']], $data);
        }
    }

    private function seedPages(): void
    {
        Page::updateOrCreate(['key' => 'sobre'], [
            'title' => 'Sobre',
            'body'  => '<p>Ana Bárbara Pedrosa (nascida em 1990) é escritora portuguesa. Publicou quatro romances pela Bertrand Editora: <em>Lisboa, chão sagrado</em> (2019), <em>Palavra do Senhor</em> (2021), <em>Amor estragado</em> (2023) e <em>Viagens com o Mehdi</em> (2024). Dois dos seus livros foram finalistas do Prémio Eça de Queiroz. No Brasil, é editada pela Diadorim.</p><p>Assina crítica literária no Observador desde 2019 e colaborou com publicações como o Público, a Sábado, a Granta, a LER, entre outras.</p><p>A sua formação académica abrange várias áreas: doutoramento em Ciências Humanas pela UFSC (Brasil), mestrado em Estudos Portugueses, pós-graduações em Linguística e em Economia das Políticas Públicas, e licenciatura em Línguas Aplicadas pela Universidade do Minho. Estudou em Portugal, no Brasil e nos Estados Unidos.</p><p>Em 2024, foi bolseira de intercâmbio literário pela Câmara Municipal de Lisboa. Em 2025, recebeu uma bolsa Criar Lusofonia para desenvolver o argumento de uma novela gráfica.</p><p>Trabalhou como linguista computacional no desenvolvimento de tecnologias da língua e dedica-se actualmente à escrita, à tradução e à edição.</p>',
        ]);

        Page::updateOrCreate(['key' => 'contacto'], [
            'title' => 'Contacto',
            'body'  => '<p>Para questões relacionadas com a obra, entrevistas, convites para eventos ou outros assuntos, pode entrar em contacto através das redes sociais.</p>',
        ]);

        Page::updateOrCreate(['key' => 'privacidade'], [
            'title' => 'Política de Privacidade',
            'body'  => '<p>Este website não recolhe dados pessoais dos seus visitantes nem utiliza cookies de rastreamento.</p>',
        ]);
    }

    private function seedSiteSettings(): void
    {
        $settings = [
            'bio'            => 'Escritora. Quatro romances publicados pela Bertrand Editora.',
            'instagram_url'  => 'https://www.instagram.com/anabarbarapedrosa',
            'facebook_url'   => 'https://www.facebook.com/anabarbarapedrosa',
            'linkedin_url'   => 'https://www.linkedin.com/in/anabarbarapedrosa',
            'meta_description' => 'Ana Bárbara Pedrosa — escritora portuguesa. Autora de Lisboa, chão sagrado, Palavra do Senhor, Amor estragado e Viagens com o Mehdi.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }
    }
}
