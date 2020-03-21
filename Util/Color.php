<?php
namespace Commander\Util; 

class Color {
    const BLACK = 'black'; 
    const DARK_GRAY = 'dark_gray'; 
    const BLUE = 'blue'; 
    const LIGUT_BLUE = 'light_blue'; 
    const GREEN = 'green'; 
    const LIGHT_GREEN = 'light_green'; 
    const CYAN = 'cyan'; 
    const LIGHT_CYAN = 'light_cyan'; 
    const RED = 'red'; 
    const LIGHT_RED = 'light_red'; 
    const PURPLE = 'purple'; 
    const LIGHT_PURPLE = 'light_purple'; 
    const BROWN = 'brown'; 
    const YELLOW = 'yellow'; 
    const LIGHT_GRAY = 'light_gray'; 
    const WHITE = 'white'; 	
    
    const BLACK_BACK = 'black';
    const READ_BACK = 'red';
    const GREEN_BACK = 'green';
    const YELLOW_BACK = 'yellow';
    const BLUE_BACK = 'blue';
    const MAGENTA_BACK = 'magenta';
    const CYAN_BACK = 'cyan';
    const LIGHT_GRAY_BACK = 'light_gray';        
    
    // Returns colored string
    public static function str($string, $foreground_color = null, $background_color = null) {
        $foreground_colors = [
            'black' => '0;30',
            'dark_gray' => '1;30',
            'blue' => '0;34',
            'light_blue' => '1;34',
            'green' => '0;32',
            'light_green' => '1;32',
            'cyan' => '0;36',
            'light_cyan' => '1;36',
            'red' => '0;31',
            'light_red' => '1;31',
            'purple' => '0;35',
            'light_purple' => '1;35',
            'brown' => '0;33',
            'yellow' => '1;33',
            'light_gray' => '0;37',
            'white' => '1;37'
        ];
        $background_colors = [
            'black' => '40',
            'red' => '41',
            'green' => '42',
            'yellow' => '43',
            'blue' => '44',
            'magenta' => '45',
            'cyan' => '46',
            'light_gray' => '47'
        ];

        $colored_string = "";

        // Check if given foreground color found
        if (isset($foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $foreground_colors[$foreground_color] . "m";
        }
        // Check if given background color found
        if (isset($background_colors[$background_color])) {
            $colored_string .= "\033[" . $background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .=  $string . "\033[0m";

        return $colored_string;
    }

}