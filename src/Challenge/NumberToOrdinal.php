<?php

namespace Challenge;

class NumberToOrdinal {

    public static function apply($input): string {

        if (!is_numeric($input)) {
            throw new \InvalidArgumentException('Input must be numeric');
        }

        $input = (string)$input;

        $suffixes = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

        $suffix = $suffixes[$input % 10];

        return $input . $suffix;
        
    }
}