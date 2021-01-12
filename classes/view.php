<?php

class View {

    public static function show($namePage = '404', $nameView = '404', $title = '404') {
        include './view/template_view.php';
    }

}