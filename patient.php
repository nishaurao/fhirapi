<?php
// Define FHIR server URL
$fhirServerUrl = 'https://hapi.fhir.org/baseR4/'; // Replace 'port' with your actual port number

// Function to fetch FHIR data
function fetchFhirData($resourceType, $id = '593160') {
    global $fhirServerUrl;

    $url = $fhirServerUrl . '/' . $resourceType;
    if ($id) {
        $url .= '/' . $id;
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        die(curl_error($ch));
    }

    curl_close($ch);

    return $response;
}

// Fetch Patient resource example
$patientData = fetchFhirData('Patient');
$patient = json_decode($patientData, true);

// Display Patient data
echo "<h1>Patient Data</h1>";
echo "<pre>";
print_r($patient);
echo "</pre>";

// You can repeat the process for other resources like Observation, Medication, etc.
?>
