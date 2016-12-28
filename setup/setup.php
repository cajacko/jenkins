<?php
// Need to figure out how to get this command to run with defaults

exec('ssh-keygen -f ~/.ssh/id_rsa.pub -t rsa -N \'\'');

exec('cat ~/.ssh/id_rsa.pub', $output, $status);
$output = array_slice($output, 1, -1);
$ssh_key = 'ssh-rsa ';

foreach ($output as $string) {
  $ssh_key = $ssh_key . $string;
}

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
  $name = 'jenkins-' + $id;
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
var_dump($ssh_key);

// return the created Key entity
$createdKey = $key->create($name, $ssh_key);

var_dump($createdKey);
