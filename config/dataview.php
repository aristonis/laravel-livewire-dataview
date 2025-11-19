<?php

return [

    /**
     * pagination configation 
     * default configation for all component  
     * 
     */
    'pagination' => [
        /**
         * item count on each page
         */
        'per_page' => 15,
        // enable / disable pagination feture  can have bool values
        'enable' => true,
        'page_name' => 'page',
    ],

    /**
     * item configrations
     */
    "item" => [
        "keyName" => "id",
    ],
];
