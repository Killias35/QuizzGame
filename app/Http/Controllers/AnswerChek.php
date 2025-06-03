<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerChek extends Controller
{
    protected $briefing;

    protected $questions;

    protected $questionAnswer;

    public function __construct()
    {
        $this->briefing = [
            0 => [
                'Bonjour',
                '...',
                'Bonjour ?',
            ],
            1 => [
                'Je vois que tu te réveilles enfin',
            ],
            2 => [
                'Génial !',
                "J'en connais plein des troue du q comme toi !",
                'Quoi ?',
                "C'est pas comme ça que ça se prononce ?",
                "D'accord je l'avoue.",
                'En fait je sais pas lire...',
                'Bon, testons un truc simple.',
                'Je vais te dire un mot, et tu vas me le redire.',
            ],
            3 => [
                'Parfait.',
                "Mais ne t'emballe pas.",
                "On passe à quelque chose d'un poil plus personnel.",
                'Tu vas devoir me donner le prénom de cette personne.',
                'QUE DIT-JE',
                'DE CE DIEUX !',
            ],
            4 => [
                'Tu sais...',
                'Ce monde est rempli de fausses vérités.',
                'Mais certaines choses sont inaltérables.',
                'Comme le nom du messi.',
                'Et tu a de la chance, car JE suis le messi',
                "Et oui c'est moi, le fameux dieux Killias",
                "Mais bref passons, j'ai pas envie de rester la 3 ans, tu vas commencer par me prouver ta fidélité envers ton dieux favori",
                "(c'est moi)",
            ],
            5 => [
                'Bon ok pas mal',
                'Mais pas suffisant',
                "Tu te rend bien compte que c'est écris sur n'importe lequel de mes comptes ?",
                'On vas faire plus dure cette fois',
            ],
            6 => [
                'OK',
                "La tu m'épates, félicitations",
                'Je vois que tu es bien renseigné sur moi mais ca ne me suffit pas',
                "Quoi ? t'es pas content ?",
                "tres bien alors adieux",
                "",
                ".",
                "..",
                "...",
                "bon ok puisque tu insister, je vais te donner une derniere chance",
                "Prouve ta foi envers moi et ensuite nous continuerons",
            ],
            7 => [
                'Je vois que tu a été très rapide !',
                "meme un peu trop si tu veux savoir...",
            ],
            8 => [
                "hmmmmmmm je vois...",
                "Je dois dire que je m'en doutais...",
                "dans ce cas je vais te punir !",
                "Tu vas devoir attraper ce ballon et le jeter dans la poubelle !"
            ],
            9 => [
                'Te revoila ?',
                "j'en ai pas fini avec toi !",
                "Tu cherche a t'amuser avec moi ? alors je vais te retirer tout le fun de ce monde !",
            ],
        ];

        $this->questions = [
            0 => "J'ai dis BONJOUR !!!",
            1 => "Comment tu t'appelles ?",
            2 => 'Dis exactement : Fromage',
            3 => 'Qui est le GRAND messi de LA PROGRAMMATION en 2025 ?',
            4 => "Quel âge est-ce que j'ai ?",
            5 => 'Je fais quel taille ? (?m??)',
            6 => 'pas besoin',
            7 => "tu es bien un humain n'est-ce pas ??",
            8 => 'pas besoin',
            9 => '',
        ];

        $this->questionAnswer = [
            0 => 'bonjour',
            1 => 'any',
            2 => 'fromage',
            3 => 'killias',
            4 => '21',
            5 => '1m64',
            6 => 'faith_proven',
            7 => 'non',
            8 => 'gg',
            9 => 'bravo',
        ];

        $this->specials = [
          6 => 'partial.special6',  
          8 => 'partial.special8',
          9 => 'partial.special9',
        ];
    }

    private function isCorrect($questionid, $answer)
    {
        $reelAnswer = $this->questionAnswer[$questionid];

        if ($reelAnswer == 'any' || $reelAnswer == 'special:') {
            return true;
        }

        return $reelAnswer == strtolower($answer);
    }

    public function Check(Request $request)
    {

        $questionid = $request->input('questionid');
        $answer = $request->input('answer');

        $correct = $this->isCorrect($questionid, $answer);

        return view('status', compact('questionid', 'correct'));
    }

    public function Next(Request $request, int $debug = null)
    {
        $questionid = (int) $request->input('questionid');
        $correct = $request->input('correct');

        if ($debug) {
            $questionid = $debug;
        }

        if ($correct == true && $questionid !== null && $questionid >= 0) {
            $questionid += 1;
        } elseif ($questionid === null || $questionid < 0) {
            $questionid = 0;
        }

        if ($questionid >= count($this->questions)) {
            $questionid = 0;
        }
        $question = $this->questions[$questionid];
        $briefing = $this->briefing[$questionid];
        $reelAnswer = $this->questionAnswer[$questionid];
        $viewdata = "partial.quiz";

        if (array_key_exists($questionid, $this->specials)) {
            $viewdata = $this->specials[$questionid];
        }
        
        return view('game', compact('questionid', 'question', 'briefing', 'viewdata'));
    }

    public function End()
    {
        return view('finish');
    }

    public function debug(Request $request, int $questionid)
    {
        return $this->Next($request, $questionid);
    }
}
