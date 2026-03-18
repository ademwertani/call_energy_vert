<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Afficher la page des secteurs d'activité
     */
    public function index()
    {
        $secteurs = [
            [
                "title" => "Énergie",
                "description" => "Accompagnement des acteurs de l’énergie et de l’efficacité énergétique."
            ],
            [
                "title" => "Relation client",
                "description" => "Gestion de la relation client et qualification de leads pour les entreprises."
            ],
            [
                "title" => "BPO",
                "description" => "Externalisation de processus métier pour améliorer la performance et réduire les coûts."
            ],
            [
                "title" => "Services aux entreprises",
                "description" => "Solutions personnalisées adaptées aux besoins spécifiques des entreprises."
            ],
        ];

        return view('pages.secteurs', compact('secteurs'));
    }
}