<?php

namespace Prototype\Common;

class ErrorDisplay {

    public static function DisplayAll($errors){
        return \View::make('layouts.elements.displays.all_errors', compact("errors"));
    }

    public static function DisplayIndividual($errors, $field){
        return \View::make('layouts.elements.displays.field_errors', compact("errors", "field"));
    }
} 