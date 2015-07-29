# Output

This field type returns the selected language code by default.

### Name

Get the language name.

```
// Twig Usage
{{ entry.example.name }}

// API usage
$entry->example->name();
```

### Translated

Get the translated language name in a specified locale.

```
// Twig Usage
{{ entry.example.translated('es') }}

// API usage
$entry->example->translated('es');
```
