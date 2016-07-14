<?php

return [
    'adminEmail' => '',
    'supportEmail' => '',
    'user.passwordResetTokenExpire' => 3600,
    
    //messages:
    'error_save' => 'Ошибка при сохранении. Попробуйте повторить позже, или обратитесь к разработчику.',
    'success_save' => 'Данные успешно сохранены',
    
    //options for fileinput widget
    'optionsFileInput' => [
        'options' => [
            'accept' => 'image/*',
            'multiply' => true,
        ],
        'pluginOptions' => [
            'allowedFileExtension' => [
                'jpg', 'jpeg', 'png', 'gif',
            ]
        ]
    ],
    
    //link trash in GRID VIEW
    'trashLink' => [
        'data-confirm'  => 'Вы уверены, что хотите удалить этот элемент', 
        'data-method'   => 'post',
    ],
];
