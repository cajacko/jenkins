<?php
// Need to figure out how to get this command to run with defaults

exec('ssh-keygen -f ~/.ssh/id_rsa.pub -t rsa -N \'\'');

exec('cat ~/.ssh/id_rsa.pub', $output, $status);
$output = array_slice($output, 1, -1);
$key = '';

foreach ($output as $string) {
  $key = $key . $string;
}

var_dump($key);

//
// require __DIR__ . './vendor/autoload.php';
//
// use DigitalOceanV2\Adapter\BuzzAdapter;
// use DigitalOceanV2\DigitalOceanV2;
//
// // create an adapter with your access token which can be
// // generated at https://cloud.digitalocean.com/settings/applications
// $adapter = new BuzzAdapter($_SERVER['DIGITAL_OCEAN_API_KEY']);
//
// // create a digital ocean object with the previous adapter
// $digitalocean = new DigitalOceanV2($adapter);
//
// $key = $digitalocean->key();
// $keys = $key->getAll();
// $ssh_ids = array();
//
// foreach ($keys as $key) {
//   if (strpos($key->name, 'jenkins') !== false) {
//     $ssh_ids[] = $key->id;
//   }
// }
//
// if (!count($ssh_ids)) {
//   throw new Exception('Could not get ssh key id');
// }
//
// // return the account api
// $droplet = $digitalocean->droplet();
//
// $created = $droplet->create('charliejackson-dev', 'lon1', '512mb', 'docker', false, false, false, $ssh_ids);
//
// $id = $created->id;
//
// function doesIpExist($droplet, $id) {
//     $new_droplet = $droplet->getById($id);
//
//     if (!$new_droplet->networks) {
//         return false;
//     }
//
//     if (!($new_droplet->networks[0])) {
//         return false;
//     }
//
//     if (!($new_droplet->networks[0]->ipAddress)) {
//         return false;
//     }
//
//     return $new_droplet->networks[0]->ipAddress;
// }
//
// for ($i = 0; $i < 10; $i++) {
//     if ($i != 0) {
//         sleep(1);
//     }
//
//     $ip = doesIpExist($droplet, $id);
//
//     if ($ip) {
//         break;
//     }
// }
//
// if (!$ip) {
//     throw new Exception('Could not get IP');
// }
//
// echo $ip;
