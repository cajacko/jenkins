<?php
// Need to figure out how to get this command to run with defaults

$ssh_key = file_get_contents('/root/.ssh/id_rsa.pub');

var_dump($ssh_key);

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();
use DigitalOceanV2\Adapter\BuzzAdapter;
use DigitalOceanV2\DigitalOceanV2;

print_r($_SERVER);

// create an adapter with your access token which can be
// generated at https://cloud.digitalocean.com/settings/applications
$adapter = new BuzzAdapter($_SERVER['DIGITAL_OCEAN_API_KEY']);

// create a digital ocean object with the previous adapter
$digitalocean = new DigitalOceanV2($adapter);

// return the key api
$key = $digitalocean->key();

// return a collection of Key entity
$keys = $key->getAll();
$id = 1;
$continue_while = true;

while ($continue_while) {
  $name = 'jenkins-' . $id;
  $exists = false;

  foreach ($keys as $single_key) {
    if ($single_key->name == $name) {
      $exists = true;
    }
  }

  if (!$exists) {
    $continue_while = false;
  }

  $id++;
}

var_dump($name);

// return the created Key entity
$createdKey = $key->create($name, $ssh_key);

var_dump($createdKey);
