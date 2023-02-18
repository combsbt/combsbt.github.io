


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
        printf('Document data for document %s:' . PHP_EOL, $document->id());
        print_r($document->data());
        printf(PHP_EOL);
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


