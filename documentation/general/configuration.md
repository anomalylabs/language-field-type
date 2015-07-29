# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.language',
        'config' => [
            'default_value' => 'en',
            'top_options'   => [
                'en',
                'es',
                'fr'
            ],
            'handler'       => 'Anomaly\LanguageFieldType\LanguageFieldTypeOptions@handle'
        ]
    ]
];
```

### `default_value`

The default language selected. Any valid language code can be used. The default value is `'en'`. 

### `top_options`

An array of languages to put at the top of the language dropdown. Any array of valid language codes can be used. There are no top options by default.

### `handler`

The options handler callable string. Any valid callable class string can be used. The default value is `'Anomaly\LanguageFieldType\LanguageFieldTypeOptions@handle'`.

The handler is responsible for setting the available options on the field type instance.

**NOTE:** This option can not be through the GUI configuration. 
