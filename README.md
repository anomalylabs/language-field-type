# Language Field Type

*anomaly.field_type.language*

#### A language dropdown field type.

The language field type provides a list of languages in an HTML select input.

## Configuration

- `top_options` - an array of options to move to the top of the list 

Languages that are anticipated can be moved to the top in order to lessen the time needed to select common languages.  

#### Example

	config => [
	    'top_options' => [
	        'en',
	        'fr'
	    ]
	]
