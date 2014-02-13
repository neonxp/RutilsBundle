# Rutils Symfony 2 Bundle

Простой бандл для Symfony 2 содержащий в себе расширение для Twig, позволяющее использовать функции из библиотеки [RUtils](RUtils: https://github.com/Andre-487/php_rutils/) в шаблонах.

Допускается как вызов в стиле функций:

    {{ getPlural(10, ['гвоздь', 'гвоздя', 'гвоздей']) }}

так и в стиле фильтров:

    {{ 10 | getPlural(['гвоздь', 'гвоздя', 'гвоздей']) }}

поддерживаются все методы библиотеки:

Числительные:

    getInWords\2 - вывод числа прописью
    getInWordsInt\2 - вывод числа прописью
    getInWordsFloat\2 - вывод числа прописью
    getPlural\3 - выбор формы множественного числа и вывод вместе с числом
    choosePlural\2 - выбор только формы множественного числа
    sumString\3 - выбор формы и вывод прописью
    getRubles\2 - вывод суммы денег в рублях

Даты:

    ruStrFTime\6 - вывод даты строкой
    distanceOfTimeInWords\3 - временной период
    getAge\1 - возраст

Транслитерация:

    translify\1 - транслитерация
    detranslify\1 - обратное преобразование
    slugify\1 - подготовка для использования в URL'ях или путях

Типографика:

    typography\2
    
## Установка

1) установить бандл с помощью composer:

    composer.phar require "nxp/rutils-bundle" "dev-master"

2) добавить строку

    new nxp\RutilsBundle\nxpRutilsBundle(),

в файл app/AppKernel.php в массив $bundles:

    $bundles = array(
    ...
    new nxp\RutilsBundle\nxpRutilsBundle(),
    ...
    );

3) всё, можно использовать функции и/или фильтры в своих Twig шаблонах!

TODO:

* написать нормальную документацию
