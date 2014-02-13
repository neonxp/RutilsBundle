<?php
/**
 * @author Alexander NeonXP Kiryukhin <frei@neonxp.info>
 */

namespace nxp\RutilsBundle\Twig;

use php_rutils\RUtils;
use php_rutils\struct\TimeParams;

class RutilsExtension extends \Twig_Extension
{
    public function getFilters()
    {
        $numeral    = RUtils::numeral();
        $date       = RUtils::dt();
        $translit   = RUtils::translit();
        $typography = RUtils::typo();
        return [
            new \Twig_SimpleFilter('getInWords', function ($amount, $gender = RUtils::MALE) use ($numeral) {
                return $numeral->getInWords($amount, $gender);
            }),
            new \Twig_SimpleFilter('getInWordsInt', function ($amount, $gender = RUtils::MALE) use ($numeral) {
                return $numeral->getInWordsInt($amount, $gender);
            }),
            new \Twig_SimpleFilter('getInWordsFloat', function ($amount, $gender = RUtils::MALE) use ($numeral) {
                return $numeral->getInWordsFloat($amount, $gender);
            }),
            new \Twig_SimpleFilter('getPlural', function ($amount, array $variants, $absence = null) use ($numeral) {
                return $numeral->getPlural($amount, $variants, $absence);
            }),
            new \Twig_SimpleFilter('choosePlural', function ($amount, array $variants) use ($numeral) {
                return $numeral->choosePlural($amount, $variants);
            }),
            new \Twig_SimpleFilter('sumString', function ($amount, $gender, array $variants = null) use ($numeral) {
                return $numeral->sumString($amount, $gender, $variants);
            }),
            new \Twig_SimpleFilter('getRubles', function ($amount, $zeroForKopeck = false) use ($numeral) {
                return $numeral->getRubles($amount, $zeroForKopeck);
            }),
            new \Twig_SimpleFilter('ruStrFTime', function (
                \DateTime $dateTime,
                $format = 'd F Y',
                $monthInflected = false,
                $dayInflected = false,
                $preposition = false,
                $timezone = null
            ) use ($date) {
                $params = TimeParams::create(
                    [
                        'date'           => $dateTime,
                        'format'         => $format,
                        'monthInflected' => $monthInflected,
                        'dayInflected'   => $dayInflected,
                        'preposition'    => $preposition,
                        'timezone'       => $timezone
                    ]
                );
                return $date->ruStrFTime($params);
            }),
            new \Twig_SimpleFilter('distanceOfTimeInWords', function (
                $toTime,
                $fromTime = null,
                $accuracy = RUtils::ACCURACY_YEAR
            ) use ($date) {
                return $date->distanceOfTimeInWords($toTime, $fromTime, $accuracy);
            }),
            new \Twig_SimpleFilter('getAge', function ($birthDate) use ($date) {
                return $date->getAge($birthDate);
            }),
            new \Twig_SimpleFilter('translify', function ($inString) use ($translit) {
                return $translit->translify($inString);
            }),
            new \Twig_SimpleFilter('detranslify', function ($inString) use ($translit) {
                return $translit->detranslify($inString);
            }),
            new \Twig_SimpleFilter('slugify', function ($inString) use ($translit) {
                return $translit->slugify($inString);
            }),
            new \Twig_SimpleFilter('typography', function ($text, array $rules = null) use ($typography) {
                return $typography->typography($text, $rules);
            })
        ];
    }


    public function getFunctions()
    {
        $numeral    = RUtils::numeral();
        $date       = RUtils::dt();
        $translit   = RUtils::translit();
        $typography = RUtils::typo();
        return [
            new \Twig_SimpleFunction('getInWords', function ($amount, $gender = RUtils::MALE) use ($numeral) {
                return $numeral->getInWords($amount, $gender);
            }),
            new \Twig_SimpleFunction('getInWordsInt', function ($amount, $gender = RUtils::MALE) use ($numeral) {
                return $numeral->getInWordsInt($amount, $gender);
            }),
            new \Twig_SimpleFunction('getInWordsFloat', function ($amount, $gender = RUtils::MALE) use ($numeral) {
                return $numeral->getInWordsFloat($amount, $gender);
            }),
            new \Twig_SimpleFunction('getPlural', function ($amount, array $variants, $absence = null) use ($numeral) {
                return $numeral->getPlural($amount, $variants, $absence);
            }),
            new \Twig_SimpleFunction('choosePlural', function ($amount, array $variants) use ($numeral) {
                return $numeral->choosePlural($amount, $variants);
            }),
            new \Twig_SimpleFunction('sumString', function ($amount, $gender, array $variants = null) use ($numeral) {
                return $numeral->sumString($amount, $gender, $variants);
            }),
            new \Twig_SimpleFunction('getRubles', function ($amount, $zeroForKopeck = false) use ($numeral) {
                return $numeral->getRubles($amount, $zeroForKopeck);
            }),
            new \Twig_SimpleFunction('ruStrFTime', function (
                \DateTime $dateTime,
                $format = 'd F Y',
                $monthInflected = false,
                $dayInflected = false,
                $preposition = false,
                $timezone = null
            ) use ($date) {
                $params = TimeParams::create(
                    [
                        'date'           => $dateTime,
                        'format'         => $format,
                        'monthInflected' => $monthInflected,
                        'dayInflected'   => $dayInflected,
                        'preposition'    => $preposition,
                        'timezone'       => $timezone
                    ]
                );
                return $date->ruStrFTime($params);
            }),
            new \Twig_SimpleFunction('distanceOfTimeInWords', function (
                $toTime,
                $fromTime = null,
                $accuracy = RUtils::ACCURACY_YEAR
            ) use ($date) {
                return $date->distanceOfTimeInWords($toTime, $fromTime, $accuracy);
            }),
            new \Twig_SimpleFunction('getAge', function ($birthDate) use ($date) {
                return $date->getAge($birthDate);
            }),
            new \Twig_SimpleFunction('translify', function ($inString) use ($translit) {
                return $translit->translify($inString);
            }),
            new \Twig_SimpleFunction('detranslify', function ($inString) use ($translit) {
                return $translit->detranslify($inString);
            }),
            new \Twig_SimpleFunction('slugify', function ($inString) use ($translit) {
                return $translit->slugify($inString);
            }),
            new \Twig_SimpleFunction('typography', function ($text, array $rules = null) use ($typography) {
                return $typography->typography($text, $rules);
            })
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'rutils_extension';
    }

}