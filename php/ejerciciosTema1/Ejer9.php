<?php

    for($i=0; $i<5; $i++) {
        echo '
        
        <svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">
            <circle r="45" cx="50" cy="50" fill="rgb('.rand(0,255).','.rand(0,255).','.rand(0,255).')" />
        </svg>
        
        ';

    }


?>