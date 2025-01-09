<?php

// URL de l'API
$apiUrl = "https://helldiverstrainingmanual.com/api/v1/war/major-orders";

// Fonction pour récupérer les données de l'API
function fetchMajorOrders($url) {
    // Initialisation de cURL
    $curl = curl_init();

    // Configuration des options cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPGET, true);

    // Exécute la requête et stocke la réponse
    $response = curl_exec($curl);

    // Vérification des erreurs
    if (curl_errno($curl)) {
        echo "Erreur cURL : " . curl_error($curl);
        curl_close($curl);
        return null;
    }

    // Fermeture de la session cURL
    curl_close($curl);

    // Retourne les données décodées en JSON
    return json_decode($response, true);
}

// Récupération des "major orders"
$majorOrders = fetchMajorOrders($apiUrl);

if ($majorOrders) {
    // Affichage des données récupérées
    echo "<h1>Major Orders</h1>";
    echo "<ul>";
    foreach ($majorOrders as $order) {
        echo "<li>" . htmlspecialchars($order['name']) . " - " . htmlspecialchars($order['description']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Pas d'ordre prioritaire pour le moment.";
}

?>
