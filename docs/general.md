# Language Field Type

- [Introduction](#introduction)
- [Configuration](#configuration)
- [Output](#output)


<a name="introduction"></a>
## Introduction

`anomaly.field_type.language`

The language field type provides a dropdown input of languages.


<a name="configuration"></a>
## Configuration

**Example Definition:**

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

### `default_value`

The default language selected. Any valid i18n language code can be used. The default value is `'en'`. 

### `top_options`

An array of languages to put at the top of the language dropdown. Any array of valid i18n language codes can be used. There are no top options by default.

### `handler`

The options handler callable string. Any valid callable class string can be used. The default value is `'Anomaly\LanguageFieldType\LanguageFieldTypeOptions@handle'`.

The handler is responsible for setting the available options on the field type instance.

**NOTE:** This option can not be through the GUI configuration.


<a name="output"></a>
## Output

This field type returns the selected language i18n code by default.

### `name()`

Returns the language name.

    // Twig Usage
    {{ entry.example.name }}
    
    // API usage
    $entry->example->name();

### `translated($locale = null)`

`$locale` - Any valid i18n language code. If none is provided the `config('app.locale')` value will be used.

Returns the translated language name in a specified locale.

    // Twig Usage
    {{ entry.example.translated('es') }} or {{ entry.example.translated }}
    
    // API usage
    $entry->example->translated('es'); or $entry->example->translated; 
