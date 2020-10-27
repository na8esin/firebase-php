<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Firebase\Auth\Token\Exception\InvalidToken;

$jsonFileName = 'practice-da34f-firebase-adminsdk-ueykj-15aeda6703.json';
//$factory = (new Factory)->withServiceAccount(realpath('../Downloads' . '/' . $jsonFileName));
$factory = new Factory;

$auth = $factory->createAuth();

$idTokenString = "eyJhbGciOiJSUzI1NiIsImtpZCI6ImQxMGM4ZjhiMGRjN2Y1NWUyYjM1NDFmMjllNWFjMzc0M2Y3N2NjZWUiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vcHJhY3RpY2UtZGEzNGYiLCJhdWQiOiJwcmFjdGljZS1kYTM0ZiIsImF1dGhfdGltZSI6MTYwMzY5NjY4MCwidXNlcl9pZCI6Im5GZHJ5ODJJb2hOWHp6TnhVc1p4UUdlSTdkVzIiLCJzdWIiOiJuRmRyeTgySW9oTlh6ek54VXNaeFFHZUk3ZFcyIiwiaWF0IjoxNjAzNzgyODk1LCJleHAiOjE2MDM3ODY0OTUsImVtYWlsIjoiZm9vQGV4YW1wbGUuY28uanAiLCJlbWFpbF92ZXJpZmllZCI6ZmFsc2UsImZpcmViYXNlIjp7ImlkZW50aXRpZXMiOnsiZW1haWwiOlsiZm9vQGV4YW1wbGUuY28uanAiXX0sInNpZ25faW5fcHJvdmlkZXIiOiJjdXN0b20ifX0.UtwBqfwmUSQRTN0dLMggzaFaE3mTfNCMWWjeNzdax-tIRitY7rVjR9UJu9YO2igJy4Z77aH0QIZhHd8A--bZyuFayjvP0WKEz1_ge0D-_oIWvsocXT3xkK-koY0Ul1ptQ6cdjdAWIb5MXuedXuK1zfhqUBlcFmE7I2_Jy0K-pIRNFoFgPvRZMFAxKq5A6fOQKmIXk_XoSitGuAIMR8L3BE1ZWA4Oij2GEc6RxgXJhrQTzfeu8xS6E0sx9XgLNV3hUzqHYUF6Xm3fptT8pXQpJ_HI55FMxJz1RKR_Wbxal6fCwWPBqE91mwbfX74gUeBljmUnRW7MQ4pclOX3W2Sa-g";

try {
  $verifiedIdToken = $auth->verifyIdToken($idTokenString);
} catch (\InvalidArgumentException $e) {
  echo 'The token could not be parsed: ' . $e->getMessage();
} catch (InvalidToken $e) {
  echo 'The token is invalid: ' . $e->getMessage();
}

$uid = $verifiedIdToken->getClaim('sub');
echo $uid;
$user = $auth->getUser($uid);
var_dump($user->email);
