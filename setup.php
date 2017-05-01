<?php
// Need to figure out how to get this command to run with defaults

$ssh_key = file_get_contents('/var/lib/jenkins/.ssh/id_rsa.pub');

require __DIR__ . '/vendor/autoload.php';

// Load .env
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Check if .env is set correctly
if (!$_SERVER['JENKINS_TAG_NAME']) {
  throw new Exception('JENKINS_TAG_NAME does not exist in .env');
}

if (!$_SERVER['DIGITAL_OCEAN_API_KEY']) {
  throw new Exception('DIGITAL_OCEAN_API_KEY does not exist in .env');
}

use DigitalOceanV2\Adapter\BuzzAdapter;
use DigitalOceanV2\DigitalOceanV2;

// create an adapter with your access token which can be
// generated at https://cloud.digitalocean.com/settings/applications
$adapter = new BuzzAdapter($_SERVER['DIGITAL_OCEAN_API_KEY']);

// create a digital ocean object with the previous adapter
$digitalocean = new DigitalOceanV2($adapter);

// return the key api
$key = $digitalocean->key();

// return a collection of Key entity
$keys = $key->getAll();

// Var to indicate whether the digital ocean key name already exists
$exists = false;

// See if the specified key name tag exists, and set bool to $exists
foreach ($keys as $single_key) {
  if ($single_key->name == $_SERVER['JENKINS_TAG_NAME']) {
    $exists = true;
  }
}

// If the key tag name already exists then error, otherwise add a new key
if ($exists) {
  throw new Exception('Key name already exists: ' . $_SERVER['JENKINS_TAG_NAME']);
} else {
  // return the created Key entity
  $createdKey = $key->create($_SERVER['JENKINS_TAG_NAME'], $ssh_key);
}
