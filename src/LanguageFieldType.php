<?php namespace Anomaly\LanguageFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class LanguageFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Language
 */
class LanguageFieldType extends FieldType
{

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.language::input';

    /**
     * The default config.
     *
     * @var array
     */
    protected $config = [
        'default_value' => 'en'
    ];

    /**
     * Get the options.
     *
     * @return array
     */
    public function getOptions()
    {
        $locales = array_keys(config('streams::locales.supported'));

        $names = array_map(
            function ($locale) {
                return 'streams::locale.' . $locale . '.name';
            },
            $locales
        );

        $options = array_combine($locales, $names);

        asort($options);

        foreach (array_filter(
                     array_reverse(explode("\r\n", array_get($this->getConfig(), 'top_options')))
                 ) as $locale) {
            $options = [$locale => $options[$locale]] + $options;
        }

        return [null => $this->getPlaceholder()] + array_unique($options);
    }

    /**
     * Get the placeholder.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        return $this->placeholder ?: 'anomaly.field_type.language::input.placeholder';
    }
}
