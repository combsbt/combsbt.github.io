


<?php

require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\FirestoreClient;

$factory = (new Factory)->withServiceAccount('../firebase_credentials.json');

$firestore = $factory->createFirestore();

$db = $firestore->database();

$restaurantsRef = $db->collection('restaurants');
$documents = $restaurantsRef->documents();
foreach ($documents as $document) {
  if ($document->exists()) {
    // print_r($document->data()["name"]."<br>");
    if($document->data()["name"] == "La Vera Pizza"){
      print_r($document->data()["name"]);
    $restaurant = $document->data();
    echo  '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Restaurant",
      "image": [
        "https://example.com/photos/1x1/photo.jpg",
        "https://example.com/photos/4x3/photo.jpg",
        "https://example.com/photos/16x9/photo.jpg"
       ],
      "name": "'.$restaurant["name"].'",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "148 W 51st St",
        "addressLocality": "New York",
        "addressRegion": "NY",
        "postalCode": "10019",
        "addressCountry": "US"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "Lillian Ruiz"
        }
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 40.761293,
        "longitude": -73.982294
      },
      "url": "https://www.example.com/restaurant-locations/manhattan",
      "telephone": "+12122459600",
      "servesCuisine": "American",
      "priceRange": "$$$",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday"
          ],
          "opens": "11:30",
          "closes": "22:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Wednesday",
            "Thursday",
            "Friday"
          ],
          "opens": "11:30",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "16:00",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Sunday",
          "opens": "16:00",
          "closes": "22:00"
        }
      ],
      "menu": "https://www.example.com/menu",
      "acceptsReservations": "True"
    }
    </script>';
    }
  } else {
    printf('Document %s does not exist!' . PHP_EOL, $document->id());
  }
}


?>

<!-- namespace Google\Cloud\Samples\Firestore;

use Google\Cloud\Firestore\FirestoreClient;

/**
 * Get all documents in a collection.
 *
 * @param string $projectId The Google Cloud Project ID
 */

function data_get_all_documents(string $projectId): void
{
    // Create the Cloud Firestore client
    $db = new FirestoreClient([
        'projectId' => $projectId,
    ]);
    # [START firestore_data_get_all_documents]
    $citiesRef = $db->collection('samples/php/cities');
    $documents = $citiesRef->documents();
    foreach ($documents as $document) {
        if ($document->exists()) {
            printf('Document data for document %s:' . PHP_EOL, $document->id());
            print_r($document->data());
            printf(PHP_EOL);
        } else {
            printf('Document %s does not exist!' . PHP_EOL, $document->id());
        }
    }
    # [END firestore_data_get_all_documents]
}
 -->

<!-- 
<html>
  <head>
    <title>Dave's Steak House</title>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Restaurant",
      "image": [
        "https://example.com/photos/1x1/photo.jpg",
        "https://example.com/photos/4x3/photo.jpg",
        "https://example.com/photos/16x9/photo.jpg"
       ],
      "name": "Dave's Steak House",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "148 W 51st St",
        "addressLocality": "New York",
        "addressRegion": "NY",
        "postalCode": "10019",
        "addressCountry": "US"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "Lillian Ruiz"
        }
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 40.761293,
        "longitude": -73.982294
      },
      "url": "https://www.example.com/restaurant-locations/manhattan",
      "telephone": "+12122459600",
      "servesCuisine": "American",
      "priceRange": "$$$",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Tuesday"
          ],
          "opens": "11:30",
          "closes": "22:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Wednesday",
            "Thursday",
            "Friday"
          ],
          "opens": "11:30",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "16:00",
          "closes": "23:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Sunday",
          "opens": "16:00",
          "closes": "22:00"
        }
      ],
      "menu": "https://www.example.com/menu",
      "acceptsReservations": "True"
    }
    </script>
  </head>
  <body>
  </body>
</html>

 -->