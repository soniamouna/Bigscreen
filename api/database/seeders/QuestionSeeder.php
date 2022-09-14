<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'title' => 'Votre adresse mail',
                'type' => 'B',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Votre âge',
                'type' => 'B',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Votre sexe',
                'type' => 'A',
                'choices' => json_encode(["Homme","Femme","Préfère ne pas répondre"]),
                'created_at' => now()
            ],
            [
                'title' => 'Nombre de personne dans votre foyer (adulte & enfants)',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Votre profession',
                'type' => 'B',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Quel marque de casque VR utilisez vous ?',
                'type' => 'A',
                'choices' => json_encode(['Oculus Quest','Occulus Rift/s','HTC Vive','Windows Mixed Reality','PSVR']),
                'created_at' => now()
            ],
            [
                'title' => 'Sur quel magasin d’application achetez vous des contenus VR ?',
                'type' => 'A',
                'choices' => json_encode(['SteamVR','Occulus store','Viveport','Windows store']),
                'created_at' => now()
            ],
            [
                'title' => 'Quel casque envisagez vous d’acheter dans un futur proche ?',
                'type' => 'A',
                'choices' => json_encode(['Occulus Quest','Occulus Go','HTC Vive Pro','PSVR','Autre','Aucun']),
                'created_at' => now()
            ],
            [
                'title' => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Vous utilisez principalement Bigscreen pour :',
                'type' => 'A',
                'choices' => json_encode(['regarder la TV en direct','regarder des films','travailler','jouer en solo','jouer en équipe']),
                'created_at' => now()
            ],
            [
                'title' => 'Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Combien donnez-vous de point pour la connexion réseau de Bigscreen ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Combien donnez-vous de point pour la qualité audio dans Bigscreen ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Aimeriez-vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?',
                'type' => 'A',
                'choices' => json_encode(['Oui', 'Non']),
                'created_at' => now()
            ],
            [
                'title' => 'Aimeriez-vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?',
                'type' => 'A',
                'choices' => json_encode(['Oui', 'Non']),
                'created_at' => now()
            ],
            [
                'title' => 'Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?',
                'type' => 'C',
                'choices' => null,
                'created_at' => now()
            ],
            [
                'title' => 'Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?',
                'type' => 'B',
                'choices' => null,
                'created_at' => now()
            ]
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}