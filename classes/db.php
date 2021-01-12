<?php

class DB {

    private static function __constructor() {
        if (!file_exists('../users.xml')) return self::createDB();

        $db = new domDocument();
        $db->load('../users.xml');

        return $db;
    }

    private static function createDB() {
        $db = new domDocument("1.0", "utf-8");
        $users = $db->createElement('Users');

        $db->appendChild($users);
        return $db;
    }

    public static function write($login, $password, $email) {
        $db = self::__constructor();

        $users = $db->getElementsByTagName('Users')[0];
        $user = $db->createElement('User');

        $user->setAttribute('login', $login);
        $user->setAttribute('password', $password);
        $user->setAttribute('email', $email);

        $users->appendChild($user);
        $db->appendChild($users);

        $db->save("../users.xml");
    }

    public static function get($xpath_request) {
        $db = self::__constructor();

        $xpath = new DOMXPath($db);
        return $xpath->query($xpath_request);
    }
}