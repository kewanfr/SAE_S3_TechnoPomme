<?php

namespace App\Controllers;

/**
 * Contrôleur pour gérer la vérification d'âge
 */
class AgeVerification extends BaseController
{
    /**
     * Enregistre le statut de vérification d'âge via cookie et session
     */
    public function setAge()
    {
        $isAdult = $this->request->getPost('is_adult');
        
        // Validation
        if ($isAdult === null) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Paramètre manquant'
            ]);
        }
        
        $ageStatus = $isAdult === 'true' || $isAdult === '1' ? 'adult' : 'under18';
        
        // Stocke dans la session
        session()->set('age_verified', $ageStatus);
        
        // Stocke dans un cookie (30 jours)
        $this->response->setCookie(
            'age_verified',
            $ageStatus,
            60 * 60 * 24 * 30, // 30 jours
            '/',
            '',
            false, // secure (mettre true en production HTTPS)
            true,  // httponly
            'Lax'  // samesite
        );
        
        return $this->response->setJSON([
            'success' => true,
            'age_status' => $ageStatus
        ]);
    }
    
    /**
     * Récupère le statut de vérification d'âge
     */
    public static function getAgeStatus()
    {
        // Vérifie d'abord la session
        $sessionAge = session()->get('age_verified');
        if ($sessionAge) {
            return $sessionAge;
        }
        
        // Sinon vérifie le cookie
        $cookieAge = $_COOKIE['age_verified'] ?? null;
        if ($cookieAge) {
            // Synchronise avec la session
            session()->set('age_verified', $cookieAge);
            return $cookieAge;
        }
        
        return null;
    }
    
    /**
     * Vérifie si l'utilisateur est adulte
     */
    public static function isAdult()
    {
        return self::getAgeStatus() === 'adult';
    }
    
    /**
     * Vérifie si l'utilisateur est mineur
     */
    public static function isUnder18()
    {
        return self::getAgeStatus() === 'under18';
    }
    
    /**
     * Réinitialise la vérification d'âge (pour les tests)
     */
    public function reset()
    {
        // Supprime de la session
        session()->remove('age_verified');
        
        // Supprime le cookie
        $this->response->setCookie(
            'age_verified',
            '',
            -1, // Expire dans le passé
            '/',
            '',
            false,
            true,
            'Lax'
        );
        
        return redirect()->to('/')->with('message', 'Vérification d\'âge réinitialisée');
    }
}
