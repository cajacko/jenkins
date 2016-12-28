<?php
// Need to figure out how to get this command to run with defaults

exec('ssh-keygen -f ~/.ssh/id_rsa -t rsa -N \'\'');
exec('cat ~/.ssh/id_rsa.pub', $output, $status);
$ssh_key = $output[0];

require __DIR__ . '/vendor/autoload.php';

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
$id = 1;
$continue_while = true;

var_dump($keys);

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
