<?php

return [
    'CakePdf' => [
        //'binary' => '/usr/local/bin/wkhtmltopdf',
        //'engine' => 'CakePdf.WkHtmlToPdf',
        //'className' => 'CakePdf.Dompdf',
        'engine' => 'CakePdf.Dompdf',
        'options' => [
            'print-media-type' => false,
            'outline' => true,
            'dpi' => 96
        ],
        'orientation' => 'landscape',
        'download' => true
    ]
];

