<?php

use Illuminate\Database\Seeder;
use App\House;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houses = [
            [
                "user_id" => 1,
                "name" => "Music Villa",
                "number_rooms" => 10,
                "number_beds" => 8,
                "number_bathrooms" => 6,
                "square_meters" => 280,
                "address" => "Via Domenico Millelire, 23, 20147 Milano MI",
                "image" => "default",
                "description" => "Villa di ampia metratura ottima per vacanze rilassanti con i servizi ideali anche per giovani che cercano il divertimento mattina h24. Posizionato vicino alle bellezze naturali del luogo e possibilità di fare gite in bici a cavallo o a piedi. Bagni di lusso con vasca e doccia. Colazione dolce o salata tramite servizio a domicilio. Possibilità di noleggio auto",
                "price" => 2800,
                "is_visible" => true,
                "latitude" => 45.466,
                "longitude" => 9.1284,
            ],
            [
                "user_id" => 2,
                "name" => "Smart House",
                "number_rooms" => 4,
                "number_beds" => 3,
                "number_bathrooms" => 2,
                "square_meters" => 100,
                "address" => "Piazzale Giovanni delle Bande Nere, 9, 20146 Milano MI",
                "image" => "default",
                "description" => "Appartamento ideale per vacanze brevi o per smartworking in relax con i servizi più moderni per chi non vuole rinunciare a nulla. Posizione in periferia, quartiere silenzioso con locali tradizionali per assaporare la città. Bagni accoglienti con tutti i servizi. Colazione tramite nota pasticceria tradizionale",
                "price" => 100,
                "is_visible" => true,
                "latitude" => 45.46148,
                "longitude" => 9.13581,
            ],
            [
                "user_id" => 1,
                "name" => "Tiny paradise",
                "number_rooms" => 1,
                "number_beds" => 1,
                "number_bathrooms" => 1,
                "square_meters" => 48,
                "address" => "Via Novara, 371, 20153 Milano MI",
                "image" => "default",
                "description" => "Monolocale per brevi vacanze, ottimo punto d’appoggio ad un ottimo prezzo, perfetto per single o coppie, posizione centrale vicino alle attività della tradizione, mezzi pubblici presenti in abbondanza. Bagno moderno completo. Ottimo per spostamenti a piedi o in bici. Presenza di tutti i servizi base dalla lavanderia all’internet caffè",
                "price" => 48,
                "is_visible" => true,
                "latitude" => 45.4826,
                "longitude" => 9.09091,
            ],
            [
                "user_id" => 1,
                "name" => "Little Castle",
                "number_rooms" => 8,
                "number_beds" => 6,
                "number_bathrooms" => 6,
                "square_meters" => 250,
                "address" => "Piazza Scipione Publio Cornelio, 2, 21019 Somma Lombardo VA",
                "image" => "default",
                "description" => "Villa antica ricca di storia ideale per chi vuol conoscere a fondo una terra. Ampio parco classico con spazio anche per i nostri amici a 4 zampe. Bagni grandi e spaziosi con pietra naturale e spa. Cucina con servizio catering compreso dalle 7 alle 23 tutti i giorni. Posizione in periferia con collegamenti con auto navetta e autista personale.",
                "price" => 2300,
                "is_visible" => true,
                "latitude" => 45.68421,
                "longitude" => 8.70664,
            ],
            [
                "user_id" => 2,
                "name" => "Single’s mason",
                "number_rooms" => 5,
                "number_beds" => 5,
                "number_bathrooms" => 3,
                "square_meters" => 120,
                "address" => "Via I Maggio, 75, 28078 Romagnano Sesia NO",
                "image" => "default",
                "description" => "Appartamento moderno per single che vogliono vivere al massimo la città. Mobile bar attrezzato. Piano accordato. Cucina moderna per piatti complessi o veloci. Bagno con jacuzzi. Camere con letto King size. Posizione centrale con ampia visuale. Taxi presenti in città a tutte le ore.",
                "price" => 120,
                "is_visible" => true,
                "latitude" => 45.63522,
                "longitude" => 8.38235,
            ],
            [
                "user_id" => 1,
                "name" => "Little house",
                "number_rooms" => 1,
                "number_beds" => 1,
                "number_bathrooms" => 1,
                "square_meters" => 49,
                "address" => "Orbello, 59, 13868 Villa del Bosco BI",
                "image" => "default",
                "description" => "Monolocale economico per studenti in Erasmus o vacanza studio. Divanoletto singolo con cucina minimal e piano induzione. Bagno con doccia. Lavanderia a gettoni presente nel palazzo. Ottima posizione centrale per gli amanti delle passeggiate rilassanti in centro.",
                "price" => 50,
                "is_visible" => true,
                "latitude" => 45.61782,
                "longitude" => 8.30674,
            ],
            [
                "user_id" => 2,
                "name" => "Imperial house",
                "number_rooms" => 9,
                "number_beds" => 9,
                "number_bathrooms" => 7,
                "square_meters" => 250,
                "address" => "Via Guido Boggiani, 54, 28100 Novara NO",
                "image" => "default",
                "description" => "Villa moderna con postazione dj e telescopio. Ampio prato curato. Salone da ballo per cene ed eventi. Bagni accoglienti e completi di ogni confort. Cucina con doppie postazioni. Lavanderia con lava e asciuga. Possibilità di avere personale di servizio sia proprio che a richiesta. Posizione riservata lontana dal caos ideale per feste senza vicini, o per vedere le stelle in silenzio.",
                "price" => 2500,
                "is_visible" => true,
                "latitude" => 45.4362,
                "longitude" => 8.61568,
            ],
            [
                "user_id" => 3,
                "name" => "Student’s house",
                "number_rooms" => 6,
                "number_beds" => 6,
                "number_bathrooms" => 3,
                "square_meters" => 120,
                "address" => "Piazza Vittoria, 20077 Melegnano MI",
                "image" => "default",
                "description" => "Appartamento con stanze singole opzionali trasformabili. Cucina comoda e flessibile. Camere con letti da una piazza e mezzo. Connessione alta velocità. Bagni facili da gestire. Vicino alle università.",
                "price" => 120,
                "is_visible" => true,
                "latitude" => 45.35627,
                "longitude" => 9.32447,
            ],
            [
                "user_id" => 3,
                "name" => "Sweet home",
                "number_rooms" => 1,
                "number_beds" => 1,
                "number_bathrooms" => 1,
                "square_meters" => 49,
                "address" => "Via Umbria, 4, 24035 Curno BG",
                "image" => "default",
                "description" => "Monolocale lussuoso per chi ama la semplicità. Soluzioni di spazio facili da gestire. Bagno con doccia. Lavanderia a gettoni nel palazzo. Ottima posizione centrale e possibilità di avere animali.",
                "price" => 49,
                "is_visible" => true,
                "latitude" => 45.69396,
                "longitude" => 9.59966,
            ],
        ];

        foreach($houses as $house){
            House::create($house);
        }  
    }
}
