<?php namespace Anomaly\LanguageFieldType;

use Anomaly\LanguageFieldType\Command\BuildOptions;
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
        'default_value' => 'en',
        'handler'       => 'Anomaly\LanguageFieldType\LanguageFieldTypeOptions@handle'
    ];

    /**
     * The dropdown options.
     *
     * @var null|array
     */
    protected $options = null;

    /**
     * Get the options.
     *
     * @return array
     */
    public function getOptions()
    {
        if ($this->options === null) {
            $this->dispatch(new BuildOptions($this));
        }

        /**
         * Now move the top options values
         * to the top of the options array.
         */
        $topOptions = array_get($this->getConfig(), 'top_options');

        if (!is_array($topOptions)) {
            $topOptions = array_filter(array_reverse(explode("\r\n", $topOptions)));
        }

        foreach ($topOptions as $locale) {
            $this->options = [$locale => $this->options[$locale]] + $this->options;
        }

        /**
         * Lastly, if the ONLY available locales
         * are desired remove everything else.
         */
        if (array_get($this->getConfig(), 'available_locales')) {
            $this->options = array_intersect_key($this->options, array_flip(config('streams::locales.enabled')));
        }

        /**
         * OR, if the ONLY supported locales
         * are desired remove everything else.
         */
        if (array_get($this->getConfig(), 'supported_locales')) {
            $this->options = array_intersect_key(
                $this->options,
                array_flip(array_keys(config('streams::locales.supported')))
            );
        }

        return array_filter([null => $this->getPlaceholder()] + array_unique($this->options));
    }

    /**
     * Set the options.
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the placeholder.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        return ($this->placeholder !== null) ? $this->placeholder : 'anomaly.field_type.language::input.placeholder';
    }
}
